<template>
    <div class="advantages-prog__cards-element">
        <h4 class="advantages-prog__cards-element-title">{{ item.title }}</h4>
        <p class="advantages-prog__cards-element-text">{{ item.content }}</p>
    </div>
</template>

<script setup>
const props = defineProps({
    data: null,
    item: null,
})
</script>

<style scoped>

.advantages-prog__cards-element{
    background-color: var(--bg);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-radius: 20px;
    padding: 40px;
    gap: 20px;
    transition: all .8s ease;
    color: var(--text);
}

.normal .advantages-prog__cards-element:hover {
    opacity: 0.9;
}

.advantages-prog__cards-element:nth-child(1){
    background-color: var(--text);
    color: var(--bg);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    grid-row: span 2;
}

.normal .advantages-prog__cards-element:nth-child(1):hover {
    opacity: 0.9;
}

.advantages-prog__cards-element-title{
    font-size: var(--h4);
    line-height: var(--h4_lh);
    font-weight: 700;
    margin: 0;
}

.advantages-prog__cards-element-text{
    line-height: var(--text_size_lh);
    font-size: var(--text_size);
    font-weight: 400;
    margin: 0;
    font-family: 'Montserrat-Light';
}

#advantages-prog .title__bold{
    color: var(--text);
}

#advantages-prog .title__slim{
    color: var(--text);
}

@media screen and (max-width: 1200px){
    .advantages-prog__cards{
        display: flex;
        flex-direction: column;
        gap: 0px;
    }
    .advantages-prog__cards-element {
        padding: 0px 0 0 0;
        border-radius: 0px;
        background-color: var(--lock) !important;
        color: var(--text) !important;
        gap: 10px;
    }
    .advantages-prog__cards-element-text{
        font-family: 'Montserrat';
    }
}
</style>