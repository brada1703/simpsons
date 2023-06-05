<template>
    <div class="flex flex-col items-center">
        <img :src="`/images/characters/${character.id}.webp`" :alt="character.full_name" :title="character.full_name"
            class="h-96">
        <p class="text-3xl pt-4">{{ character.full_name }}</p>
        <p class="italic w-3/4 text-center" v-if="quotes.data">{{ quotes.data[0].quote }}</p>
        <select v-model="selectedCharacter" v-if="character.id"
            class="mt-12 block mt-1 w-full sm:w-1/4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="" selected disabled>Select a character</option>
            <option v-for="character in characters" :value="character.id" :key="character.id">
                {{ character.full_name }}
            </option>
        </select>
    </div>
</template>

<script setup>
import { onMounted, ref, watch } from "vue";
import useQuotes from "@/composables/quotes";
import useCharacters from "@/composables/characters";
import { useRoute, useRouter } from "vue-router";

const selectedCharacter = ref('')
const { quotes, getQuotes } = useQuotes()
const { character, characters, characterLoaded, getCharacters, getCharacter } = useCharacters()
const route = useRoute()
const router = useRouter()

onMounted(() => {
    getCharacter(route.params.id)
})
watch(selectedCharacter, (current) => {
    getCharacter(current)
    getQuotes(1, current, '')
    router.push({ name: 'characters.show', params: { id: current } })
})
watch(characterLoaded, () => {
    if (characterLoaded.value) getCharacters(), getQuotes(1, route.params.id, '');
    if (!characterLoaded.value) router.push({ name: 'characters.index' });
})
</script>