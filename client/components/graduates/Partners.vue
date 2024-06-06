<template>
    <section id="partners">
        <div class="container wrapper-padding">
            <base-title-content :title="props?.data?.help.title" :sub_title="'<br>' + props?.data?.help.subtitle" />
            <p class="partners__subtitle" v-html="props?.data?.help.content"></p>
            <div class="partners__cards" v-show="props?.data?.help?.card_img?.length < 6">
                <u-i-card-partners v-for="item in props?.data?.help?.card_img" :link="item?.link" :img="item?.img"/>
            </div>
            <div class="partners__swiper" v-show="props?.data?.help?.card_img?.length >= 6">
                <u-i-carousele :data="props?.data?.help?.card_img" :slide_prev="5" color_pag="var(--text)"
                    color_button="var(--bg)">
                    <u-i-card-partners v-for="item in props?.data?.help?.card_img" :link="item?.link" :img="item?.img"/>
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

.app-wrapper.dark #partners .title__bold, 
.app-wrapper.dark #partners .title__slim, 
.app-wrapper.dark #partners .partners__subtitle{
    color: var(--bg);
}

.app-wrapper.blue #partners .image-wrapper{
    background-color: var(--text);
}

.app-wrapper.blue #partners{
    background-color: var(--text);
}
.app-wrapper.blue #partners .title__bold,
.app-wrapper.blue #partners .title__slim,
.app-wrapper.blue #partners .partners__subtitle{
    color: var(--bg);
}
.app-wrapper.blue #partners .partners__cards .index-partners__cards-card-img,
.app-wrapper.dark #partners .partners__cards .index-partners__cards-card-img,
.app-wrapper.monochrome #partners .partners__cards .index-partners__cards-card-img{
    background-color: var(--bg);
    border-radius: 32px !important;
}
/* #partners .index-partners__cards-card-img{
    border-radius: 20px;
} */

#partners .title__bold {
    color: var(--text);
    margin: 0px;
}

#partners .title__slim {
    color: var(--text);
}

.lock {
    color: var(--lock-text) !important;
}

.partners-img {
    border-radius: 20px;
    object-fit: cover;
}

.partners__swiper {
    margin-top: 40px;
    position: relative;
}

.n-carousel .n-carousel__slides .n-carousel__slide {
    height: auto !important;
}

.partners__carousel {
    position: relative;
    padding: 0 0 80px 0;
}

.partners__custom-arrow {
    position: absolute;
    display: flex;
    bottom: 0;
    right: 20px;
    z-index: 99;
}

.partners__custom-arrow button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    margin-right: 12px;
    color: #3947F4;
    background-color: var(--bg);
    border-width: 0;
    border-radius: 50%;
    transition: background-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}

.normal .partners__custom-arrow button:hover {
    background-color: #A1A5DA;
}

.partners__custom-arrow button:active {
    transform: scale(0.95);
    transform-origin: center;
    background-color: var(--bg);
    box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

#partners {
    background-color: var(--lock);
    position: relative;
    z-index: 3;
}

.partners__subtitle {
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    margin: 20px 0 0 0;
    color: var(--text);
}

.partners__cards-wrapper a {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--bg);
    border-radius: 20px;
}

.partners__cards .index-partners__cards-card{
    height: 100% !important;
    padding: 0;
    border-radius: 20px;
    
}
.partners__cards .index-partners__cards-card-img img{
    height: 100%;
    border-radius: 20px !important;
    padding: 0;
}
.partners__cards .index-partners__cards-card-img{
    height: 100%;
    margin: 0;
    width: 100%;
    border-radius: 20px !important;
}

.partners__cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 20px;
    margin-top: 40px;
    grid-template-rows: 110px;
}

.partners__swiper .index-partners__cards-card{
    height: 110px;
    padding: 0;
}

.partners__swiper .index-partners__cards-card-img,
.partners__swiper .index-partners__cards-card-img img{
    height: 100%;
    width: 100%;
    border-radius: 0 !important;
}


@media screen and (max-width: 1200px) {
    .partners__swiper .index-partners__cards-card-img img{
        border-radius: 0 !important;
    }
    .partners__swiper .index-partners__cards-card-img{
        border-radius: 0 !important;
    }
    .partners__cards{
        gap: 10px;
    }

    .partners__cards {
        margin-top: 20px;
        display: grid !important;
    }
    .partners__swiper {
        display: none !important;
    }
    .app-wrapper.blue #partners .partners__cards .index-partners__cards-card-img,
    .app-wrapper.dark #partners .partners__cards .index-partners__cards-card-img,
    .app-wrapper.monochrome #partners .partners__cards .index-partners__cards-card-img{
        border-radius: 45px !important;
    }
}
</style>