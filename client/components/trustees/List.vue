<template>
    <section id="trus-block">
        <div class="container wrapper-padding">
            <div class="trus-cards-block">
                <trustees-Cards  v-for="item in data" id="trus-card" :img="item?.img" :title="item?.title" :subtitle="item?.subtitle"/>
            </div>
        </div>
    </section>
</template>

<script setup>

const props = defineProps({
    data: null
})


</script>

<style scoped>
.app-wrapper.blue #trus-block{
    background-color: var(--text);
}


#trus-block {
    position: relative;
    background-color: var(--bg);
    z-index: 1;
}

.trus-cards-block {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 20px;
}


@media screen and (max-width: 1200px) {
    .trus-cards-block {
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: auto;
        gap: 10px;
    }
}
</style>