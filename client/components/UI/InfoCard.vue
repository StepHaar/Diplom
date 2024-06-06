<template>
    <div class="basic-information__cards-element">
        <h4 class="basic-information__cards-element-title">{{ item?.title }}</h4>
        <div class="basic-information__cards-element-info">
            <p class="basic-information__cards-element-info-text" v-for="info in item?.ul">
                <a v-if="info.url_li != ''" :href="info.url_li">{{ info.li }}</a>
                <a v-else class="no-hover">{{ info.li }}</a>
            </p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    data: null,
    item: null,
})
</script>

<style scoped>
.normal .no-hover:hover{
    color: var(--text) !important;
}

.basic-information__cards-element{
    background-color: var(--bg);
    border-radius: 20px;
    padding: 40px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: space-between;
    transition: all .8s ease;
}

.normal .basic-information__cards-element:hover {
    opacity: 0.9;
}

.basic-information__cards-element:nth-child(1){
    grid-row: span 2;
}

.basic-information__cards-element-title{
    font-size: var(--h4);
    line-height: var(--h4_lh);
    font-weight: 700;
    margin: 0;
}

.basic-information__cards-element-info{
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.basic-information__cards-element-info-text{
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 400;
    margin: 0;
}

@media screen and (max-width: 1200px) {
    .basic-information__cards{
        grid-template-columns: repeat(1, 1fr);
        gap: 10px;
    }
    .basic-information__cards-element{
        padding: 20px;
        gap: 10px;
    }
    /* #basic-information .title__bold{
        padding: 0;
    } */
}
</style>