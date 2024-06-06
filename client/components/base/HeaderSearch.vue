<template>
    <div class="header-search" :class="!show ? 'hidden' : ''">
        <input type="text" placeholder="Введите запрос" v-model="search_text" @keypress="keypress" @input="searchInput">
        <button class="search-send" :disabled="!is_ready_search" @click="search">
            <ph-magnifying-glass :size="24" :color="is_ready_search ? 'var(--text)' : 'var(--lock)'" />
        </button>
        <ul class="header-finded" v-show="search_text.length >= 3">
            <li v-if="!data_load">
                поиск...
            </li>
            <li v-for="item in filtered_data" v-else-if="filtered_data.length > 0 && data_load">
                <router-link :to="item.link" ref="finded_link" @click="search_text = ''">
                    {{ item.title }}
                </router-link>
            </li>
            <li v-else-if="filtered_data.length === 0 && data_load">
                ничего не найдено
            </li>
        </ul>
    </div>
</template>

<script setup>
import { PhMagnifyingGlass } from "@phosphor-icons/vue";

const show = defineModel('show');
const router = useRouter()
const route = useRoute()
const search_text = ref('');
const finded_link = ref(null);
const data_load = ref(true)

const filtered_data = ref([])

const props = defineProps({
    is_open: Boolean
})

watch(props, (new_value) => {
    if(!new_value.is_open){
        search_text.value = '';
    }
})

const is_ready_search = computed(() => {
    return search_text.value && search_text.value.length >= 3;
});

watch(search_text, (new_value) => {
    search_text.value = new_value.trimStart();
    search_text.value = new_value.replaceAll('  ', ' ');
})

async function searchData() {
    try {
        data_load.value = false
        const response = await fetch("http://stud.shubizle11.beget.tech/v1/methods/search?search=" + search_text.value, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });
        const data = await response.json();
        filtered_data.value = data
        data_load.value = true
    }
    catch (error) {
        console.error("Ошибка получения данных:", error);
    }
}

function searchInput(){
    if(search_text.value.length >= 3){
        searchData();
    }
}

function keypress(e){
    if (is_ready_search && e.keyCode == 13) {
        search();
    }
}

function search() {
    router.push(finded_link.value[0].to)
    search_text.value = '';
}

</script>

<style>

.header-search {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    transition: 0.5s;
}

.header-search.hidden {
    opacity: 0;
    pointer-events: none;
}

.header-search input {
    padding: 20px 16px;
    border-radius: 5px;
    border: 1px solid var(--lock);
    font-family: Montserrat;
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
    letter-spacing: 0.045em;
    text-align: left;
    outline: none;
    width: 100%;
    background-color: var(--bg);
    color: var(--text);
    margin-left: 40px;
}

.header-search input::placeholder {
    color: var(--lock);
}

.app-wrapper.blue .header-search input{
    border: 1px solid var(--text);
}
.app-wrapper.blue .header-search input::placeholder {
    color: var(--text);
}

.search-send {
    background-color: transparent;
    border: none;
    outline: none;
    position: absolute;
    right: 16px;
    height: 24px;
    width: 24px;
    cursor: pointer;
}

.search-send:disabled {
    cursor: not-allowed;
}

.header-finded{
    position: absolute;
    top: 100%;
    background-color: var(--bg);
    width: 100%;
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    list-style: none;
    border-radius: 10px;
}

.header-finded li{
    font-size: var(--text_size);
    line-height: var(--text_size_lh)
}

@media screen and (max-width: 1200px){
    .header-finded{
        left: -20px;
        width: 100vw;
        height: calc(100vh - 86px);
        padding: 20px;
        border-radius: 0;
    }
    .header-finded li{
        padding: 10px 0;
    }
    .header-search input{
        display: none;
    }
    .header-search.input-open input{
        display: block;
    }
}
</style>