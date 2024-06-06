<template>
    <section id="succes">
        <div class="container success__wrapper wrapper-padding">
            <div class="success__info">
                <base-title-content :title="props?.data?.steps.title" :sub_title="props?.data?.steps.subtitle" :text="props?.data?.steps.description" color="--text" class="success"/>
            </div>
            <div class="success__swiper"> 
                <UICarouseleIncoming :slide_prev="2" :data="props?.data?.steps?.card" />
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


.app-wrapper.dark #succes .swiper__custom-arrow--left.lock,
.app-wrapper.dark #succes .swiper__custom-arrow--right.lock{
    cursor: auto;
}
.app-wrapper.dark #succes .swiper__custom-arrow--right svg path,
.app-wrapper.dark #succes .swiper__custom-arrow--left svg path{
    fill: var(--bg);
}
.app-wrapper.dark #succes .swiper__custom-arrow--left.lock svg path,
.app-wrapper.dark #succes .swiper__custom-arrow--right.lock svg path{
    fill: var(--lock-text);
}

.app-wrapper.dark #succes .slide.this .slide-incoming__swiper-element{
    background-color: var(--accent);
}
.app-wrapper.dark #succes .slide .slide-incoming__swiper-element{
 background-color: var(--text);
}
.app-wrapper.dark #succes .slide-incoming__swiper-element-info.active .slide-incoming__swiper-element-title,
.app-wrapper.dark #succes .slide-incoming__swiper-element-info.active .slide-incoming__swiper-element-text{
    color: var(--bg);
}
.app-wrapper.dark #succes .slide-incoming__swiper-element-info .slide-incoming__swiper-element-title,
.app-wrapper.dark #succes .slide-incoming__swiper-element-info .slide-incoming__swiper-element-text{
    color: var(--bg);
}

.app-wrapper.dark #succes .title__bold,
.app-wrapper.dark #succes .title__slim,
.app-wrapper.dark #succes .title__text{
    color: var(--accent);
}

#succes .image-wrapper img{
    border-radius: 20px 0 0 20px !important;
}

.app-wrapper.blue #succes{
    background-color: var(--text);
}
.app-wrapper.blue #succes .title__bold,
.app-wrapper.blue #succes .title__slim,
.app-wrapper.blue #succes .title__text{
    color: var(--bg);
}
.app-wrapper.blue #succes .slide.this .slide-incoming__swiper-element{
    background-color: var(--bg);
}
.app-wrapper.blue #succes .slide .slide-incoming__swiper-element{
    background-color: var(--lock-text);
}
.app-wrapper.blue #succes .slide-incoming__swiper-element-info.active .slide-incoming__swiper-element-title,
.app-wrapper.blue #succes .slide-incoming__swiper-element-info.active .slide-incoming__swiper-element-text{
    color: var(--text);
}
.app-wrapper.blue #succes .slide-incoming__swiper-element-info .slide-incoming__swiper-element-title,
.app-wrapper.blue #succes .slide-incoming__swiper-element-info .slide-incoming__swiper-element-text{
    color: var(--text);
}

.app-wrapper.blue #succes .image-wrapper{
    border-radius: 25px 0 0 25px;
}
.app-wrapper.blue #succes .slide-incoming__swiper-element-info{
    border-radius:0 15px 15px 0;
}
.app-wrapper.blue #succes .swiper__custom-arrow--left.lock,
.app-wrapper.blue #succes .swiper__custom-arrow--right.lock{
    cursor: auto;
}
.app-wrapper.blue #succes .swiper__custom-arrow--right svg path,
.app-wrapper.blue #succes .swiper__custom-arrow--left svg path{
    fill: var(--text);
}
.app-wrapper.blue #succes .swiper__custom-arrow--left.lock svg path,
.app-wrapper.blue #succes .swiper__custom-arrow--right.lock svg path{
    fill: var(--lock-text);
}
.app-wrapper.blue #succes .slide-incoming__swiper-pag{
    color: var(--accent);
}
.app-wrapper.blue #succes .slide-incoming__swiper-pag span{
    color: var(--lock-text);
}

#succes{
    position: relative;
    z-index: 2;
    background-color: var(--bg);
} 

#succes .title__bold{
    color: var(--text);
}

#succes .title__slim{
    color: var(--text);
}

#succes .title__text{
    color: var(--text);
}


.success__swiper{
    position: relative;
}

.success__info{
    display: flex;
    justify-content: space-between;
}

@media screen and (max-width: 1200px) {
    #succes .image-wrapper img{
        border-radius: 20px 20px 0 0 !important;
    }
    
}
</style>
