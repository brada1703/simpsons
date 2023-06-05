<template>
    <div class="flex flex-col items-center">
        <img src="images/cast.webp" alt="The Simpsons" title="The Simpsons" class="h-96" />
        <select v-model="selectedCharacter" id="select-character"
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
import useCharacters from "@/composables/characters";
import { useRouter } from "vue-router";

const selectedCharacter = ref('')
const { characters, getCharacters } = useCharacters()
const router = useRouter()

onMounted(() => {
    getCharacters()
})
watch(selectedCharacter, (current, previous) => {
    router.push({ name: 'characters.show', params: { id: current } })
})
</script>