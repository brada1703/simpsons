import { ref } from 'vue'

export default function useCharacters() {
    const characters = ref({})
    const character = ref({})
    const characterLoaded = ref('')

    const getCharacters = async () => {
        axios.get('/api/characters')
            .then(response => { characters.value = response.data; })
    }

    const getCharacter = async (id) => {
        axios.get('/api/characters/' + id)
            .then(response => { character.value = response.data; characterLoaded.value = true; })
            .catch(() => { characterLoaded.value = false })
    }

    return { character, characters, characterLoaded, getCharacters, getCharacter }
}