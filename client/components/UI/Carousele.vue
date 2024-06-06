<template>
  <n-carousel
    :loop="false"
    :slides-per-view="slide_prev"
    :space-between="20"
    :show-dots="false"
    show-arrow
    class="swiper"
    @update:current-index="updateIndex"
  >
  <slot></slot>
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
  <div class="swiper__pag" :class="props.pags == 'none' ? 'hidden' : ''" :style="'color:' + props?.color_pag + ';'">
    <span class="swiper__pag-color">{{ current_index + props?.slide_prev }}</span>
    / {{ props?.data?.length }}
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
  data: Array,
});

const current_index = ref(0);
const cnt_index = ref(null);
const is_index = ref(null);

watch(props,(new_value) => {
    if (new_value?.data){
        cnt_index.value = props?.data?.length - props?.slide_prev
    }
});

function updateIndex(index) {
  current_index.value = index;
  is_index.value = current_index.value;
  //console.log(current_index.value);
}
</script>

<style>
.lock {
  color: var(--lock-text) !important;
}

.normal .swiper__custom-arrow button.lock:hover {
    color: var(--lock-text) !important;
    background-color: var(--bg) !important;
    cursor: default;
}

.swiper__custom-arrow button.lock:active {
    transform: scale(1);
    transform-origin: center;
    background-color: var(--lock);
    box-shadow: none;
}

.swiper__custom-arrow {
  position: absolute;
  display: flex;
  bottom: 0;
  right: 20px;
  z-index: 99;
}

.swiper__custom-arrow button {
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

.normal .swiper__custom-arrow button:hover {
  color: var(--bg) !important;
  background-color: var(--accent) !important;
  color: var(--bg) !important;
}

.swiper__custom-arrow button:active {
  transform: scale(0.95);
  transform-origin: center;
  background-color: var(--lock) !important;
  box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

.swiper__pag {
  font-size: var(--h3);
  color: var(--lock-text);
  line-height: var(--h3_lh);
  position: absolute;
  bottom: 0;
}

.swiper__pag.hidden{
  display: none;
}

.swiper__pag-color {
  color: var(--accent);
}

.swiper {
  position: relative;
  padding: 0 0 70px 0;
}

.n-carousel .n-carousel__slides .n-carousel__slide {
  height: auto !important;
}
.swiper.mobile {
  display: none;
}

@media screen and (max-width: 1200px) {
    .swiper.mobile {
        display: block;
    }
    .swiper {
        display: none;
    }
    .swiper__pag {
        display: none;
    }
    .swiper {
        position: relative;
        padding: 0 40px 0 0;
    }
}
</style>
