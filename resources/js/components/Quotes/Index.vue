<template>
    <div>
        <div class="mb-4">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" v-if="!searchQuery">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 cursor-pointer" v-else
                    @click="getQuotes(1, selectedCharacter, ''), searchQuery = ''">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" clip-rule="evenodd" fill-rule="evenodd"
                        stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m12 10.93 5.719-5.72c.146-.146.339-.219.531-.219.404 0 .75.324.75.749 0 .193-.073.385-.219.532l-5.72 5.719 5.719 5.719c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-5.719-5.719-5.719 5.719c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l5.719-5.719-5.72-5.719c-.146-.147-.219-.339-.219-.532 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" />
                    </svg>
                </div>
                <input type="search" id="search-input" v-model="searchQuery"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for your favourite Simpsons quotes...">
                <button type="button" id="search-button" @click="getQuotes(1, selectedCharacter, searchQuery)"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    Search
                </button>
            </div>
            <select v-model="selectedCharacter" id="select-character"
                class="block mt-1 w-full sm:w-1/4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" selected>All Characters</option>
                <option v-for="character in characters" :value="character.id" :key="character.id">
                    {{ character.full_name }}
                </option>
            </select>
        </div>
        <div v-if="quotes.data?.length">
            <div class="p-6 mb-6 rounded overflow-hidden shadow-lg" v-for="quote in quotes.data" :key="quote.id">
                <blockquote class="relative">
                    <svg class="absolute top-0 left-0 transform -translate-x-6 -translate-y-8 h-16 w-16 text-gray-100"
                        width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path
                            d="M7.39762 10.3C7.39762 11.0733 7.14888 11.7 6.6514 12.18C6.15392 12.6333 5.52552 12.86 4.76621 12.86C3.84979 12.86 3.09047 12.5533 2.48825 11.94C1.91222 11.3266 1.62421 10.4467 1.62421 9.29999C1.62421 8.07332 1.96459 6.87332 2.64535 5.69999C3.35231 4.49999 4.33418 3.55332 5.59098 2.85999L6.4943 4.25999C5.81354 4.73999 5.26369 5.27332 4.84476 5.85999C4.45201 6.44666 4.19017 7.12666 4.05926 7.89999C4.29491 7.79332 4.56983 7.73999 4.88403 7.73999C5.61716 7.73999 6.21938 7.97999 6.69067 8.45999C7.16197 8.93999 7.39762 9.55333 7.39762 10.3ZM14.6242 10.3C14.6242 11.0733 14.3755 11.7 13.878 12.18C13.3805 12.6333 12.7521 12.86 11.9928 12.86C11.0764 12.86 10.3171 12.5533 9.71484 11.94C9.13881 11.3266 8.85079 10.4467 8.85079 9.29999C8.85079 8.07332 9.19117 6.87332 9.87194 5.69999C10.5789 4.49999 11.5608 3.55332 12.8176 2.85999L13.7209 4.25999C13.0401 4.73999 12.4903 5.27332 12.0713 5.85999C11.6786 6.44666 11.4168 7.12666 11.2858 7.89999C11.5215 7.79332 11.7964 7.73999 12.1106 7.73999C12.8437 7.73999 13.446 7.97999 13.9173 8.45999C14.3886 8.93999 14.6242 9.55333 14.6242 10.3Z"
                            fill="currentColor" />
                    </svg>

                    <div class="relative z-10">
                        <p class="text-gray-800 sm:text-xl pl-10">
                            <em>{{ quote.quote }}</em>
                        </p>
                    </div>

                    <footer class="mt-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10" :src="`/images/characters/${quote.character.id}.webp`"
                                    :alt="quote.character.full_name" :title="quote.character.full_name">
                            </div>
                            <div class="ml-4">
                                <router-link :to="{ name: 'characters.show', params: { id: quote.character.id } }">
                                    <div class="text-base font-semibold text-gray-800 cursor-pointer"
                                        @click="getQuotes(1, quote.character.id, searchQuery), selectedCharacter = quote.character.id">
                                        {{ quote.character.full_name }}
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </div>
        <div v-else>
            <span>No quotes found. </span>
            <span class="cursor-pointer underline" @click="getQuotes(1, '', ''), searchQuery = '', selectedCharacter = ''">
                Show all quotes.
            </span>
        </div>
        <TailwindPagination :data="quotes" @pagination-change-page="page => getQuotes(page, selectedCharacter, searchQuery)"
            class="mt-4" />
    </div>
</template>

<script setup>
import { onMounted, ref, watch } from "vue";
import { TailwindPagination } from 'laravel-vue-pagination';
import useQuotes from "@/composables/quotes";
import useCharacters from "@/composables/characters";

const selectedCharacter = ref('')
const searchQuery = ref('')
const { quotes, getQuotes } = useQuotes()
const { characters, getCharacters } = useCharacters()
onMounted(() => {
    getQuotes()
    getCharacters()
})
watch(selectedCharacter, (current, previous) => {
    getQuotes(1, current, searchQuery.value)
})
</script>