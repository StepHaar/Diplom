<template>
    <section id="education">
        <div class="container wrapper-padding">
            <div class="education__title">
                <BaseTitleContent :title="data?.education.title" :sub_title="data?.education.subtitle" color="--text"/>
                <h4 v-html="data?.education.content" class="education__title-subtitle"></h4>
            </div>
            <div class="education__main">
                <div class="education__main-steps">
                    <h5 class="education__main-steps-title">{{ data?.education?.column_1.title }}</h5>
                    <p class="education__main-steps-text" v-html="data?.education?.column_1.content"></p>
                </div>
                <div class="education__main-advantages">
                    <h5 class="education__main-advantages-title">{{ data?.education?.column_2.title }}</h5>
                    <div class="education__main-advantages-wrapper">
                        <div class="education__main-advantages-element" v-for="item in data?.education?.column_2?.ul">
                            <ph-arrow-circle-right class="education__main-advantages-element-circle" :size="20" weight="fill" />
                            <p class="education__main-advantages-element-text">{{ item.li }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

import { PhArrowCircleRight } from "@phosphor-icons/vue"


const props = defineProps({
    data:null,
})
</script>

<style>
.app-wrapper.dark #education .education__main-steps-title,
.app-wrapper.dark #education .education__main-steps-text, 
.app-wrapper.dark #education .education__main-advantages-element,
.app-wrapper.dark #education .education__main-advantages-title{
    color: var(--bg);
}

.app-wrapper.blue #education{
    background-color: var(--text);
}
.app-wrapper.blue #education .title__bold,
.app-wrapper.blue #education .title__slim,
.app-wrapper.blue #education .education__title-subtitle{
    color: var(--bg);
}

#education{
    position: relative;
    background-color: var(--bg);
    z-index: 2;
}

#education .title__bold{
    color: var(--text);
}

#education .title__slim{
    color: var(--text);
}

.education__title{
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
    align-items: flex-end;
}

.education__title .title h2{
    margin: 0;
}

.education__title-subtitle{
    font-size: 24px;
    font-weight: 700;
    margin: 0;
    line-height: 32px;
    color: var(--text)
}

.education__main{
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 20px;
}

.education__main-steps,
.education__main-advantages{
    background-color: var(--lock);
    display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: space-between;
    border-radius: 20px;
    padding: 40px;
}

.education__main-steps-title{
    margin: 0;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 600;
    color: var(--text)
}

.education__main-advantages-wrapper{
    margin: 0;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 700;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.education__main-steps-text{
    margin: 0;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 400;
    color: var(--text);
}

.education__main-advantages-title {
    font-weight: 600;
    color: var(--text);
    font-size: var(--text_size);
}

.education__main-advantages-element{
    display: grid;
    grid-template-columns: 20px auto;
    gap: 20px;
    color: var(--text)
}

@media screen and (max-width: 1200px) {
    .education__main {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        gap: 20px;
    }
    .education__title {
        flex-direction: column;
        align-items:flex-start !important;
        margin-bottom: 20px;
    } 
    .education__title-subtitle {
        margin-top: 20px;
        font-size: 16px;
        font-weight: 700;
        line-height: 24px;
    }
    .education__main-steps,
    .education__main-advantages{
        gap: 10px;
        padding: 20px !important;
    }
    .education__main-advantages-wrapper{
        font-weight: 400;
    }
    .education__main-advantages-element{
        gap: 10px;
    }
    .education__main-advantages-wrapper {
        gap: 10px;
    }

}
</style>