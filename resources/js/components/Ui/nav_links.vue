<template>
    <div class="justify-center sm:justify-start space-x-8 sm:-my-px sm:ml-10 flex">
        <router-link :to="{ name: 'quotes.index' }" active-class="border-b-2 border-indigo-400"
            class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
            Quotes
        </router-link>
        <router-link :to="{ name: 'characters.index' }" active-class="border-b-2 border-indigo-400"
            class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
            Characters
        </router-link>
    </div>
</template>