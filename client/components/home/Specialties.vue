<template>
    <section id="specialties">
        <div class="container wrapper-padding">
            <div class="specialties__title">
                <BaseTitleContent :sub_title="data?.subtitle" type="light"/> 
                <BaseTitleContent :title="data?.title" type="light"/>
            </div>
            <div class="specialties__cards">
                <div class="specialties__cards-card-wrapper" v-for="item in data?.card">
                    
                    <div class="specialties__cards-card" :class="item?.is_open ? 'enabled' : 'disabled'">
                        <div class="specialties__cards-card-top">
                            <div class="specialties__cards-card-title">
                                <h3>{{ item?.title }}</h3>
                            </div>
                            <p v-if="item?.is_open"><ph-clock-afternoon color="var(--accent)"  weight="fill"/>{{ item?.duration }}</p>
                            <p v-else><ph-clock-afternoon color="var(--lock-text)"  weight="fill"/>{{ data?.duration_closed }}</p>
                        </div>

                        <a v-if="item?.is_open">
                            <UIButton  scrollTo="#application-form" InnerText="Оставить заявку" :class="item?.is_open ? 'glow' : 'disabled'" @click="setApplicationType(item)"/>
                        </a>
                        <a v-else>
                            <UIButton InnerText="Оставить заявку" :class="item?.is_open ? 'glow' : 'disabled'" @click="setApplicationType(item)"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

import {PhClockAfternoon} from "@phosphor-icons/vue";

const props = defineProps({
    data: null,
})

const state_type = useState('state_type', () => '');

function setApplicationType(item) {
    state_type.value = item.title;
}

</script>

<style>

#specialties{
    background-color: var(--text);
    position: relative;
    z-index: 2;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

#specialties .wrapper-padding{
    padding-bottom: 20px !important;
}

.app-wrapper.blue #specialties .specialties__cards-card-top p svg,
.app-wrapper.dark #specialties .specialties__cards-card-top p svg,
.app-wrapper.monochrome #specialties .specialties__cards-card-top p svg,
#specialties .specialties__cards-card-top p svg{
    height: var(--icon_size);
    width: var(--icon_size);
}

.app-wrapper.blue #specialties .specialties__cards-card.disabled{
    background-color: var(--lock);
}
.app-wrapper.blue #specialties .specialties__cards-card.disabled .specialties__cards-card-top h3{
    color: var(--lock-text);
}
.app-wrapper.blue #specialties .specialties__cards-card.disabled .specialties__cards-card-top p {
    color: var(--lock);
    background-color: var(--lock-text);
}
.app-wrapper.blue #specialties .specialties__cards-card-top p {
    color: var(--accent);
    background-color: var(--text);
}
.app-wrapper.blue #specialties .title__bold{
    color: var(--text);
}
.app-wrapper.blue #specialties{
    background-color: var(--bg);
}
.app-wrapper.blue #specialties .specialties__cards-card-top svg{
    fill: var(--lock);
}

.normal .app-wrapper.blue #specialties .specialties__cards .specialties__cards-card-wrapper .specialties__cards-card.enabled:hover{
    position: relative !important;
    transition: none;
    transform: none;
    opacity: 1;
}

.normal .app-wrapper.blue #specialties .specialties__cards .specialties__cards-card-wrapper .specialties__cards-card:hover{
    position: relative !important;
    transition: none;
    transform: none;
    opacity: 1;
}

.app-wrapper.blue #specialties .specialties__cards-card-top h3{
    color: var(--text);
}

.specialties__title{
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.specialties__title .title .title__bold{
    margin: 0;
}

.specialties__cards{
    margin-top: 40px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-auto-rows: 1fr;
    gap: 20px;
}

.specialties__cards-card{
    border-radius: 20px;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 230px;
    height: 100%;
    width: 100%;
    transition: all .8s ease;
}

.specialties__cards-card.enabled{
    background-color: var(--accent);
    color:var(--text);
    transition: all .5s ease;
}

.normal .specialties__cards-card.enabled:hover{
    /* background-color: rgb(0, 24, 158); */
    opacity: 0.9;
}

.specialties__cards-card.disabled{
    background-color: var(--bg);
}

.specialties__cards-card-top{
    display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: space-between;
}
.specialties__cards-card-top svg{
    width: 24px;
    height: 24px;
}

.specialties__cards-card-top h3{
    color: var(--bg);
    font-size: var(--h3);
    margin: 0;
    font-family: 'Montserrat-Regular';
}

.specialties__cards-card.disabled .specialties__cards-card-top h3{
    color: var(--lock-text);
}

.specialties__cards-card-top p{
    width: fit-content; 
    color: var(--text);
    background-color: var(--bg);
    padding: 8px 20px;
    border-radius: 50px;
    font-size: var(--text_size);
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.specialties__cards-card.disabled .specialties__cards-card-top p{
    color: var(--lock-text);
    background-color: var(--lock);
}

.specialties__cards-card-title{
    height: max-content;
}

.app-wrapper.medium_size .specialties__cards-card-title{
    min-height: 128px;
}

.app-wrapper.large_size .specialties__cards-card-title{
    min-height: 153px;
}

@media screen and (max-width: 700px) {
    .specialties__cards{
        grid-template-columns: 1fr !important;
    }
} 

@media screen and (min-width: 700px) and (max-width: 1600px) {
    .specialties__cards{
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media screen and (max-width: 1580px) {

    .specialties__cards-card-title{
        min-height: 103px;
    }
}
@media screen and (max-width: 1200px) {
    .specialties__title{
        gap: 5px;
    }

    .specialties__cards-card-title{
        min-height: 0;
    }
    .specialties__cards{
        grid-template-columns: 1fr;
        max-height: none;
        height: auto;
        grid-template-rows: auto;
        margin-top: 20px;
        gap: 10px;
    }

    .specialties__cards-card{
        padding: 20px;
    }
    .app-wrapper.large_size .specialties__cards-card-title{
        min-height: 0;
    }

    .app-wrapper.blue #specialties .specialties__cards-card-top p svg,
    .app-wrapper.dark #specialties .specialties__cards-card-top p svg,
    .app-wrapper.monochrome #specialties .specialties__cards-card-top p svg,
    #specialties .specialties__cards-card-top p svg{
        height: 24px;
        width: 24px;
    }
}
</style>