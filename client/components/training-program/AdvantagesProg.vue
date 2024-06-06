<template>
    <section id="advantages-prog">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.advantage.title" :sub_title="data?.advantage.subtitle" color="--text"/>
            <div class="advantages-prog__cards">
                <UIAdvantagesCard :item="item" v-for="item in data?.advantage?.card"/>
            </div>
        </div>
    </section>
</template>

<script setup>

const props = defineProps({
    data: null,
})
</script>

<style>
.app-wrapper.blue #advantages-prog{
    background-color: var(--text);
}

#advantages-prog{
    background-color: var(--lock);
    position: relative;
    z-index: 1;
}

.app-wrapper.blue #advantages-prog .advantages-prog__cards .advantages-prog__cards-element:nth-child(1){
    background-color: var(--bg);
}
.app-wrapper.blue #advantages-prog .advantages-prog__cards .advantages-prog__cards-element{
    background-color: var(--lock-text);
}

.app-wrapper.blue #advantages-prog .advantages-prog__cards .advantages-prog__cards-element .advantages-prog__cards-element-title,
.app-wrapper.blue #advantages-prog .advantages-prog__cards .advantages-prog__cards-element .advantages-prog__cards-element-text{
    color: var(--text);
}

.app-wrapper.blue #advantages-prog .title{
    color: var(--bg);
}
.app-wrapper.blue #advantages-prog .advantages-prog__cards .advantages-prog__cards-element:nth-child(1) .advantages-prog__cards-element-title,
.app-wrapper.blue #advantages-prog .advantages-prog__cards .advantages-prog__cards-element:nth-child(1) .advantages-prog__cards-element-text{
    color: var(--text);
}

#advantages-prog .wrapper-padding{
    padding-bottom: 20px !important;
}

.advantages-prog__cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: auto;
    gap: 20px;
}

@media screen and (max-width: 1200px) {
    .advantages-prog__cards{
        grid-template-columns: 1fr;
    }
    
}
</style>