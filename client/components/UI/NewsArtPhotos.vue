<template>
    <section class="news__photos-block" id="news__photos-block" :class="image == false || typeof data?.length == 'undefined' ? 'hidden' : ''">
        <div class="container wrapper-padding">
            <div class="news__cur__photos">
                <base-title-content title="Фотопленка:" color="--text" class="news__cur__photos-title"/>
                <UICarouseleNews color_button="var(--lock)" pags="none" :data="data" :slide_prev="3">
                    <div class="news__cur__photos-wrapper" v-for="item in data">
                        <base-image-wrapper :src="item?.img" alt="" class="news__cur__photos__img"/>
                    </div>
                </UICarouseleNews> 
            </div>
        </div>
    </section>
</template>

<script setup>
const image = useCookie("image");

const props = defineProps({
    data: null,
    img_class: '',
})

</script>

<style>
#news__photos-block .image-wrapper img {
    object-position: bottom;
}

.app-wrapper.dark #news__photos-block .news__cur__photos-title{
    color: var(--text);
}

.app-wrapper.dark #news__photos-block .swiper__custom-arrow--left.lock,
.app-wrapper.dark #news__photos-block .swiper__custom-arrow--right.lock{
    cursor: default;
}
.app-wrapper.dark #news__photos-block .swiper__custom-arrow--right svg,
.app-wrapper.dark #news__photos-block .swiper__custom-arrow--left svg{
    fill: var(--text);
}
.app-wrapper.dark #news__photos-block .swiper__custom-arrow--left.lock svg,
.app-wrapper.dark #news__photos-block .swiper__custom-arrow--right.lock svg{
    fill: var(--lock-text);
}

.news__photos-block.hidden{
    display: none !important;
}

#news__photos-block{
    position: relative;
    z-index: 3;
    background-color: var(--bg);
}

#news__photos-block .swiper__pag{
    display: none !important;
}

#news__photos-block .image-wrapper{
    height: 100%;
    width: 100%;
}

#news__photos-block .image-wrapper img{
    object-fit: cover;
    object-position: bottom;
}

.news__cur__photos-title{
    position: absolute;
    z-index:1;
}

.news__cur__photos-wrapper{
    display: inline-block;
    overflow: hidden;
    width: 100%;
    height: 470px;
    border-radius: 20px;
    transition: all 1.5s;
}

.news__cur__photos-wrapper img{
    -o-object-fit: cover;
    object-fit: cover;
    width: 100%;
    height: 575px;
    border-radius: 20px;
    display: block;
}

.news__cur__photos-img{
    background: var(--lock);
    border-radius: 20px;
    object-fit: cover;
}

@media screen and (max-width: 1200px){
    #news__photos-block .image-wrapper img{
        transform: translate(0, -20%);
    }

    .news__cur__photos-title{
        position: relative;
    }

    .news__cur__photos-img{
        height: 340px;
    }

    .news__cur__photos-wrapper{
        height: 260px;
    }
}

@media screen and (max-width: 800px){
    #news__photos-block .image-wrapper img{
        transform: translate(0, -20%);
    }
}

</style>