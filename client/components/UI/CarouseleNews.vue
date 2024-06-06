<template>
<div class="carousel-wrapper" id="news-carousel">
    <n-carousel
    :loop="false"
    :slides-per-view="slide_prev"
    :space-between="20"
    :show-dots="false" 
    :show-arrow="data?.length <= slide_prev ? false : true"
    class="swiper"
    @update:current-index="updateIndex"
    >
    <template #arrow="{ prev, next }">
    <div class="swiper__custom-arrow">
      <button
        type="button"
        :style="'background-color:' + props?.color_button + ';'"
        class="swiper__custom-arrow--left"
        @click="prev"
        :class="current_index == 0 ? 'lock' : ''"
      >
        <ph-arrow-left :size="24" weight="light" class="arrow" />
      </button>
      <button
        type="button"
        :style="'background-color:' + props?.color_button + ';'"
        class="swiper__custom-arrow--right"
        @click="next"
        :class="current_index == cnt_index ? 'lock' : ''"
      >
        <ph-arrow-right :size="24" weight="light" class="arrow" />
      </button>
    </div>
  </template>
  <slot></slot>
</n-carousel>


<n-carousel
:loop="false"
:space-between="20"
:show-dots="false"
draggable
class="swiper mobile"
@update:current-index="updateIndex"
>
<slot></slot>
</n-carousel>
</div>
</template>

<script setup>
import { NCarousel } from "naive-ui";
import { PhArrowRight, PhArrowLeft } from "@phosphor-icons/vue";

const props = defineProps({
  pags: String,
  slide_prev: Number,
  color_button: String,
  color_pag: String,
  data: null,
});

const current_index = ref(0);
const cnt_index = ref(null);
const is_index = ref(null);

watch(props,(new_value) => {
    if (new_value?.data){
        cnt_index.value = props?.data?.length - props?.slide_prev
    }
    console.log(cnt_index);
    console.log(current_index);
    console.log(is_index);
});

function updateIndex(index) {
  current_index.value = index;
  console.log(props?.slide_prev);
}
</script>

<style>
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow button:hover,
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow button:hover,
.app-wrapper.monochrome #news__photos-block #news-carousel .swiper__custom-arrow button:hover{
  background-color: var(--lock) !important;
  color: var(--text) !important;
  box-shadow: none;
  transform: none;
}
.app-wrapper.monochrome #news__photos-block #news-carousel .swiper__custom-arrow--left.lock:hover svg{
  fill: var(--lock-text) !important;
}

#news__photos-block .carousel-wrapper{
    display: flex;
}

#news__photos-block .lock {
color: var(--lock-text) !important;
}

.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow--left.lock,
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow--right.lock{
    cursor: auto;
}
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow--right svg path,
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow--left svg path{
    fill: var(--bg);
}
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow--left.lock svg path,
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow--right.lock svg path{
    fill: var(--lock-text);
}

.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow--left.lock,
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow--right.lock{
    cursor: auto;
}
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow--right svg path,
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow--left svg path{
    fill: var(--text);
}
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow--left.lock svg path,
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow--right.lock svg path{
    fill: var(--lock-text);
}

#news__photos-block #news-carousel .swiper__custom-arrow--right.lock svg{
  fill: var(--lock-text) !important;
}
.app-wrapper.dark #news__photos-block #news-carousel .swiper__custom-arrow button:hover,
.app-wrapper.blue #news__photos-block #news-carousel .swiper__custom-arrow button:hover,
.app-wrapper.monochrome #news__photos-block #news-carousel .swiper__custom-arrow button:hover{
  background-color: var(--lock) !important;
  color: var(--text) !important;
  box-shadow: none;
  transform: none;
}
.app-wrapper.monochrome #news__photos-block #news-carousel .swiper__custom-arrow--left.lock:hover svg{
  fill: var(--lock-text) !important;
}

#news__photos-block #news-carousel .swiper__custom-arrow button.lock:hover {
    color: var(--lock-text) !important;
    background-color: var(--lock) !important;
    cursor: default;
}

#news__photos-block #news-carousel .swiper__custom-arrow button.lock:active {
    transform: scale(1);
    transform-origin: center;
    background-color: var(--lock);
    box-shadow: none;
}

#news__photos-block #news-carousel .swiper__custom-arrow {
  position: absolute;
  display: flex;
  bottom: 530px;
  z-index: 99;
  right: -5px;

}

#news__photos-block #news-carousel .swiper__custom-arrow button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  margin-right: 12px;
  background-color: var(--lock);
  border-width: 0;
  border-radius: 50%;
  transition: background-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
}

#news__photos-block #news-carousel .swiper__custom-arrow button:hover {
  background-color: var(--accent) !important;
  color: var(--bg) !important;
}

#news__photos-block #news-carousel .swiper__custom-arrow button:active {
  transform: scale(0.95);
  transform-origin: center;
  background-color: var(--lock-text) !important;
  box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

#news__photos-block #news-carousel .swiper {
  position: relative;
  padding: 105px 0 0 0;
}

#news__photos-block #news-carousel .n-carousel .n-carousel__slides .n-carousel__slide {
  height: auto !important;
}

#news__photos-block #news-carousel .swiper.mobile {
  display: none;
}

@media screen and (max-width: 1200px) {
    #news__photos-block #news-carousel .swiper.mobile {
        display: block;
    }
    #news__photos-block #news-carousel .swiper {
        display: none;
    }
    #news__photos-block #news-carousel .swiper {
        position: relative;
        padding: 0 40px 0 0;
    }
}
</style>
