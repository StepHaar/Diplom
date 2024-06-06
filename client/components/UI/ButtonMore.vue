<template>
    <button class="buttonMore" :style="'width:' + props?.Width + '; background-color:' + props?.BgColor + ';'">{{ InnerText }}</button>
</template>

<script setup>
const props = defineProps({
    InnerText: String,
    Width: String,
    BgColor: String,
});
</script>

<style scoped>
.app-wrapper.dark .buttonMore,
.app-wrapper.blue .buttonMore,
.app-wrapper.monochrome .buttonMore{
    width: calc(30% - 10px);
}

.buttonMore{
    width: calc(30% - 10px);
    font-size: var(--h4);
    font-weight: 700;
    border-radius: 50px;
    border: 1px solid var(--text);
    display: block;
    margin: 60px auto 0 auto;
    /* background-color: var(--lock); */
    color: var(--text);
    padding: 20px 0;
    cursor: pointer;
}

@media screen and (max-width: 1200px) {
    .buttonMore{
        margin: 40px auto 0 auto;
        width: 100% !important;
        font-size: 14px;
    }
}
</style>