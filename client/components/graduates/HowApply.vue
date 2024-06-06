<template>
    <section id="how-apply">
        <div class="container wrapper-padding">
            <base-title-content :title="data?.cards.title" :sub_title="'<br>' + data?.cards.subtitle" :text="props?.data?.cards.content" color="--text"/>   
            <div class="how-apply">
                <UICard type="dark" v-for="item in data?.cards?.card" :title=item?.text :text=item?.content />
            </div>
            <div class="how-apply-carousel">
                <u-i-carousele :loop="false" :show-dots="false" :space-between="10":slide_prev="2">
                        <UICard  v-for="item in data?.cards?.card" type="dark" :title=item?.text :text=item?.content />
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
.app-wrapper.blue #how-apply{
    background-color: var(--bg);
}
.app-wrapper.blue #how-apply .title__bold,
.app-wrapper.blue #how-apply .title__slim,
.app-wrapper.blue #how-apply .title__text{
    color: var(--text);
}
.app-wrapper.blue #how-apply .card,
.app-wrapper.blue #how-apply .card svg{
    background-color: var(--lock);
    color: var(--text);
    fill: var(--text);
}

#how-apply{
    position: relative;
    z-index: 2;
    background-color: var(--bg);
}

#how-apply .title__bold{
    color: var(--text);
}

#how-apply .title__slim{
    color: var(--text);
}

#how-apply .title__text{
    color: var(--text);
    padding: 0 0 40px 15px;
}

.how-apply{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.how-apply-carousel {
    display: none;
    position: relative;
}

@media screen and (max-width: 1600px) and (min-width: 1200px){
    .how-apply{
    grid-template-columns: repeat(auto-fill, minmax(580px, 1fr));
}
}

@media screen and (max-width: 1200px) {
    #how-apply .title__text{
    color: var(--text);
    padding: 0;
    }

    .how-apply-carousel {
        display: block;
    }

    .how-apply{
        display: none;
    } 

    .partners__subtitle {
        margin: 20px 0 0 0 !important;
    }
}

</style>