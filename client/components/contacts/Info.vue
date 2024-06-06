<template>
    <section id="cont-block">
        <div class="container wrapper-padding">
            <contacts-InfoCards :data="data" />
            <contacts-Map />
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    data: null,
});
</script>

<style scoped>
.app-wrapper.blue #cont-block{
    background-color: var(--bg);
}


#cont-block {
    background-color: var(--text);
    color: var(--bg);
    gap: 40px;
    position: relative;
    z-index: 2;
}
</style>