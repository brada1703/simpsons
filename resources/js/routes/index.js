import { createRouter, createWebHistory } from 'vue-router'
import QuotesIndex from '@/components/Quotes/Index.vue'
import CharactersIndex from '@/components/Characters/Index.vue'
import CharacterShow from '@/components/Characters/Show.vue'

const routes = [
    {
        path: '/',
        name: 'quotes.index',
        component: QuotesIndex,
        meta: { title: 'Quotes' }
    },
    {
        path: '/characters',
        name: 'characters.index',
        component: CharactersIndex,
        meta: { title: 'Characters' }
    },
    {
        path: '/character/:id',
        name: 'characters.show',
        component: CharacterShow,
        meta: { title: 'Show Character' }
    },
    {
        path: '/:catchAll(.*)',
        redirect: to => ({
            name: 'quotes.index',
        }),
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})