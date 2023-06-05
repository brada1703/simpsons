<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-center sm:justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <router-link :to="{ name: 'quotes.index' }">
                                <img src="/images/logo.svg" class="block h-9 w-auto fill-current text-gray-800"
                                    alt="The Simpsons" title="The Simpsons" height="36" width="64">
                            </router-link>
                        </div>

                        <!-- Navigation Links -->
                        <NavLinks class="hidden sm:flex" />
                    </div>
                </div>
                <NavLinks class="flex sm:hidden" />
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="items-start bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ currentPageTitle }}
                </h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="mt-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { computed, watch } from 'vue'
import { useRoute } from 'vue-router'
import NavLinks from '@/components/Ui/nav_links.vue'

const route = useRoute()

const currentPageTitle = computed(() => route.meta.title)
</script>