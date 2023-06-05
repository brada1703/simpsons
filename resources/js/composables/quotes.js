import { ref } from 'vue'

export default function useQuotes() {
    const quotes = ref({})

    const getQuotes = async (page = 1, character = '', search = '') => {
        const request = { params: { page, character, search } }
        axios.get('/api/quotes', request).then(response => { quotes.value = response.data })
    }

    return { quotes, getQuotes }
}