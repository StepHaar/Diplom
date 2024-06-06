<template>
    <section id="why-choose-us">
        <div class="container wrapper-padding">
            <div class="why-choose-us">
                <div class="why-choose-us__text">
                    <base-title-content :title="data?.title" class="why-choose-us__text" :sub_title="'<br>' + data?.subtitle"/>
                    <p class="why-choose-us__text-link">{{ data?.button }}<ph-arrow-circle-right :size="20" weight="fill" class="arrow"/></p>
                </div>
                <div class="why-choose-us__cards">
                    <div class="why-choose-us__cards-card" v-for="item in data?.card">
                        <UICard type="white" :title=item?.title :text=item?.content />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

import {PhArrowCircleRight} from "@phosphor-icons/vue";

const props = defineProps({
    data: null,
})

</script>

<style>

#why-choose-us{
    background-color: var(--lock);
    margin-top: -20px;
    z-index: 1;
    position: relative;
}

.app-wrapper.blue #why-choose-us .why-choose-us__text-link svg {
    fill: var(--bg) !important;
}

.app-wrapper.blue #why-choose-us{
    background-color: var(--text) !important;
}

.app-wrapper.blue #why-choose-us .why-choose-us__text .title__bold{
    color:var(--bg);
}

.app-wrapper.blue #why-choose-us .why-choose-us__text .title__slim{
    color:var(--bg);
}

.app-wrapper.blue #why-choose-us .why-choose-us__text-link{
    color:var(--bg);
}

.app-wrapper.blue #why-choose-us .card__title svg{
    fill: var(--text);
}

.app-wrapper.blue #why-choose-us .why-choose-us__cards-card .card.white{
    position: relative !important;
    transition: none;
    transform: none;
    opacity: 1;
}

.app-wrapper.dark .why-choose-us__text .title__bold{
    color: var(--bg);
}
.app-wrapper.dark .why-choose-us__text .title__slim{
    color: var(--bg);
}
.app-wrapper.dark .why-choose-us__text-link{
    color: var(--bg);
}

.why-choose-us__text .title__bold{
    color:var(--text);
}
.why-choose-us__text .title__slim{
    color:var(--text);
}

.why-choose-us{
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap:20px;
}

.why-choose-us__text{
    display: flex !important;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}

.why-choose-us__text-link{
    display: flex;
    gap: 20px;
    font-size: var(--text_size);
    font-weight: 600;
    align-items: center;
    cursor: default;
    color: var(--text);
}

.normal .why-choose-us__text-link:hover {
    color:var(--text)
}

.why-choose-us__cards{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-auto-rows: auto;
    gap: 20px;
}

.why-choose-us__cards-card:nth-child(3){
    grid-column: span 2;
}

@media screen and (max-width: 1200px) {
    #why-choose-us .card__title h4{
        font-size: var(--h3);
        line-height: var(--h3_lh);
    }

    #why-choose-us .arrow{
        transform:rotate(90deg);
    }

    .why-choose-us{
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .why-choose-us__cards{
        gap: 10px;
        grid-template-columns: 1fr;
        max-height: none;
        height: auto;
        grid-template-rows: auto;
    }

    .why-choose-us__cards-card:nth-child(3){
        grid-column: 1;
    }
}

</style>