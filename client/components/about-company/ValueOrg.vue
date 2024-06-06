<template>
    <section id="value-org">
        <div class="container wrapper-padding">
            <div class="value-org">
                <base-title-content :title="data?.value.title" :sub_title="data?.value.subtitle" type="light"/>
                <div class="value-org__cards" v-if="data?.value.card?.length < 4">
                    <UICard v-for="item in data?.value.card" :title="item?.title" :text="item?.content" type="white"/>
                </div>
                <u-i-carousele :data="data?.value.card" :slide_prev="3" color_button="var(--bg)" color_pag="var(--bg)" v-else>
                    <UICard v-for="item in data?.value.card" :title="item?.title" :text="item?.content" type="white"/>
                </u-i-carousele>
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

.app-wrapper.blue #value-org{
    background-color: var(--bg);
}
.app-wrapper.blue #value-org .title__bold{
    color: var(--text);
}
.app-wrapper.blue #value-org .card{
    background-color: var(--text);
}
.app-wrapper.blue #value-org .card__title,
.app-wrapper.blue #value-org .card__text{
    color: var(--accent);
}
.app-wrapper.blue #value-org .card__title svg{
    fill: var(--lock);
}

.value-org__cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

#value-org{
    position: relative;
    background-color: var(--text);
    border-radius: 20px;
    z-index: 2;
}

.value-org-swiper{
    margin-top: 40px;
    position: relative;
}

.value-org{
    position: relative;
}

.value-org__custom-arrow button{
    background-color: var(--bg)
}

@media screen and (max-width: 1200px){
    .value-org__cards{
        grid-template-columns: 1fr;
        grid-auto-columns: 1fr;
    }
}

</style>