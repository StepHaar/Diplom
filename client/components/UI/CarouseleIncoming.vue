<template>
  <n-carousel
    ref="carousel_desktop"
    :loop="false"
    :slides-per-view="props?.slide_prev"
    :space-between="20"
    :show-dots="false"
    show-arrow
    class="carousel"
    @update:current-index="updateIndex"
  >
  <div
      class="slide"
      :class="index == is_index ? 'this' : ''"
      v-for="(item, index) in props?.data"
    >
      <div class="slide-incoming__swiper-element">
      <base-image-wrapper img_class="img" :src="item?.img" alt="" />
        <div
          class="slide-incoming__swiper-element-info"
          :class="index == is_index ? 'active' : ''"
        >
          <h4 class="slide-incoming__swiper-element-title">{{ item.title }}</h4>
          <p class="slide-incoming__swiper-element-text">{{ item.description }}</p>
        </div>
      </div>
    </div>
  <template #arrow="{prev,next}">
    <div class="swiper__custom-arrow">
      <button
      type="button"
      class="swiper__custom-arrow--left"
      @click="prevDesc"
      :class="current_index == 0 ? 'lock' : ''"
    >
    <ph-arrow-left :size="24" weight="light" class="arrow" />
    </button>
    <button
      type="button"
      class="swiper__custom-arrow--right"
      @click="nextDesc"
      :class="current_index == cnt_index + 1 ? 'lock' : ''"
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
    :slides-per-view="1"
    show-arrow
    class="carousel mobile"
    @update:current-index="updateIndex"
  >
    <div
      class="slide"
      :class="index == is_index ? 'this' : ''"
      v-for="(item, index) in props?.data"
    >
      <div class="slide-incoming__swiper-element">
      <base-image-wrapper :src="item?.img" alt=""/>
        <div class="slide-incoming__swiper-element-info">
          <h4 class="slide-incoming__swiper-element-title">{{ item.title }}</h4>
          <p class="slide-incoming__swiper-element-text">{{ item.description }}</p>
        </div>
      </div>
    </div>
    <template #arrow="{ prev, next }">
      <div class="swiper__custom-arrow">
        <button
          type="button"
          class="swiper__custom-arrow--left"
          @click="prev"
          :class="current_index == 0 ? 'lock' : ''"
        >
          <ph-arrow-left :size="24" weight="light" class="arrow" />
        </button>
        <button
          type="button"
          class="swiper__custom-arrow--right"
          @click="next"
          :class="current_index == cnt_index + slide_prev - 1 ? 'lock' : ''"
        >
          <ph-arrow-right :size="24" weight="light" class="arrow" />
        </button>
      </div>
    </template>
  </n-carousel>
  <div class="slide-incoming__swiper-pag">
    <div class="slide-incoming__swiper-pag-color-text">

      <span class="slide-incoming__swiper-pag-color">
        {{ current_index + props?.slide_prev - 1 }}
      </span>
      
    </div>

      <div class="slide-incoming__swiper-pag-text">
        / {{ props?.data?.length }}
      </div>

  </div>

    <!-- <div class="carousele-double__info-pag-color-text">
        <span class="carousele-double__info-pag-color">
            {{ info_index + 1 }}
        </span>
    </div>

    <div class="carousele-double__info-pag-text">
        / {{ props?.data?.length }}
    </div> -->
</template>

<script setup>
import { NCarousel } from "naive-ui";
import { PhArrowRight, PhArrowLeft } from "@phosphor-icons/vue";

const props = defineProps({
  slide_prev: Number,
  data: Array,
});

const current_index = ref(0);
const is_index = ref(null);
const color = ref(false);
const cnt_index = ref(null);

onMounted(() => {
  if ((is_index.value = current_index.value)) {
    color.value = true;
  }
  console.log("current_index.value: ", current_index.value);
  console.log("cnt_index.value: ", cnt_index.value);
  console.log("is_index.value: ", is_index.value);
});

watch(props,(new_value) => {
    if (new_value?.data){
        cnt_index.value = props?.data?.length - props?.slide_prev
    }
});

function test(){
  console.log("test func");
}



const carousel_desktop = ref(null);

let is_change = false;


function nextDesc(index){
  index = props?.data?.length - 1;
  current_index.value = index;
  if((is_index.value = current_index.value)){
    carousel_desktop.value.next()
  }
}
function prevDesc(index){
  // carousel_desktop.value.prev()
  //console.log(cnt_index.value);
  if (current_index.value === cnt_index.value + 1 ){
      is_index.value = cnt_index.value;
      current_index.value = cnt_index.value;
    } else {
      carousel_desktop.value.prev()
    }
}


// function next() {
//     is_change = true;
  
//     const index = carousel_desktop.value.getCurrentIndex();
//     console.log("getCurIndex of NEXT: ", carousel_desktop.value.getCurrentIndex());
//     if (index == props?.data?.length - 1) {
//       color.value = true;
//       is_change = false;
//       return;
//     }

//     const next_index = Math.min(index + 1, props?.data?.length - 1);
//     console.log("next_index: ", next_index);
    
//     carousel_desktop.value.to(next_index);

//     if (next_index == 6){
//       is_index.value = 6;
//       carousel_desktop.value.getCurrentIndex.value = 6;
//       console.log("getCurIndex of last: ", carousel_desktop.value.getCurrentIndex());
//       current_index.value = 6;
//       console.log("current_index.value: ", current_index.value);
//     }
// }

// function prev() {
//     is_change = true;
//     if (current_index.value === 6 ){
//       is_index.value = 5;
//       current_index.value = 5;
//     } else {
//       const index = carousel_desktop.value.getCurrentIndex();
//       console.log("getCurIndex of PREV: ", carousel_desktop.value.getCurrentIndex());
//       if (index == 0) {
//         is_change = false;
//         return;
//       }
      
//       const prev_index = Math.max(index - 1, 0);
//       carousel_desktop.value.to(prev_index);
//       console.log("prev_index: ", prev_index);
//     }

// }

function updateIndex(index) {


  // if (index === 6 ){
  //   index = 7;
  // }
  current_index.value = index;
  // is_index.value = current_index.value;
  is_index.value = current_index.value;
  if ((is_index.value = current_index.value)) {
    color.value = true;
  }
  // if (current_index.value === cnt_index.value) {
  //   current_index.value = 0;
  //   is_index.value = 0;
  // }

  // if (current_index.value === cnt_index.value && current_index.value > 0 ) {
  //   current_index.value += 1;
  //   // cnt_index.value += 1;
  //   is_index.value += 1;
  //   // console.log("is equal");
  // }

  // console.log("current_index.value: ", current_index.value);
  // console.log("cnt_index.value: ", cnt_index.value);
  // console.log("is_index.value: ", is_index.value);
  // console.log(" ");

  // console.log("current_index.value: ", current_index.value);
}
</script>

<style>
.app-wrapper.blue #succes .carousel .swiper__custom-arrow button:hover,
.app-wrapper.dark #succes .carousel .swiper__custom-arrow button:hover,
.app-wrapper.monochrome #succes .carousel .swiper__custom-arrow button:hover{
  background-color: var(--lock) !important;
  color: var(--text) !important;
  box-shadow: none;
  transform: none;
}
.app-wrapper.monochrome #succes .carousel .swiper__custom-arrow button{
  color: var(--text);
}
.app-wrapper.monochrome #succes .carousel .swiper__custom-arrow--left.lock:hover svg,
.app-wrapper.monochrome #succes .carousel .swiper__custom-arrow--right.lock:hover svg{
  fill: var(--lock-text) !important;
  cursor:auto;
}
.app-wrapper.monochrome #succes .carousel .swiper__custom-arrow--left.lock svg,
.app-wrapper.monochrome #succes .carousel .swiper__custom-arrow--left.right svg{
  fill: var(--lock-text) !important;
  cursor:auto;
}
#succes .slide .image-wrapper{
  background: none;
}
#succes .lock {
  color: var(--lock-text) !important;
}

#succes .slide-incoming__swiper-element-info.active {
  color: var(--bg) !important;
}

#succes .n-carousel .n-carousel__slide-incomings .n-carousel__slide-incoming {
  height: auto !important;
}

#succes .n-carousel__slide {
  height: auto;
}

#succes .carousel {
  position: relative;
  padding: 0 40px 80px 0px;
}

.normal #succes .swiper__custom-arrow button.lock:hover {
    color: var(--lock-text) !important;
    background-color: var(--lock) !important;
    cursor: default;
}

.normal #succes .swiper__custom-arrow--right.lock svg{
  fill: var(--lock-text);
}

#succes .swiper__custom-arrow {
  position: absolute;
  display: flex;
  bottom: 0;
  right: 20px;
  z-index: 99;
  margin-right: -40px;
}

#succes .swiper__custom-arrow button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  margin-right: 20px;
  color: #3947f4;
  background-color: var(--lock);
  border-width: 0;
  border-radius: 50%;
  transition: background-color .3s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
}

.normal #succes .swiper__custom-arrow button:hover {
  color: var(--bg) !important;
  background-color: var(--accent) !important;
}

#succes .swiper__custom-arrow button:active {
  transform: scale(0.95);
  transform-origin: center;
  background-color: var(--lock) !important;
  box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

#succes .swiper__custom-arrow button.lock:active {
  background-color: none !important;
  box-shadow: none;
  transform: scale(1);
}

#succes .swiper__carousel {
  padding-bottom: 70px;
}

#succes .slide {
  height: 100%;
}

#succes .slide-incoming__swiper-element {
  display: grid;
  grid-template-columns: repeat(2, 50%);
  height: 100%;
  background-color: var(--lock);
  transition: all 1s ease;
  border-radius: 20px;
}

#succes .slide.this .slide-incoming__swiper-element {
  background-color: var(--text);
}

#succes .slide-incoming__swiper-element img {
  object-fit: cover;
  width: 100%;
  height: 100%;
  background-color: var(--bg);
  /* border-radius: 20px 0 0 20px; */
}

#succes .slide-incoming__swiper-element-info {
  padding: 40px;
  transition: all 1s ease;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
  color: var(--text);
  word-break: break-word;
}

#succes .slide-incoming__swiper-element-title {
  font-size: var(--h4);
  line-height: var(--h44_lh);
  font-weight: 700;
  margin: 0;
}

#succes .slide-incoming__swiper-element-text {
  font-size: var(--text_size);
  line-height: var(--text_size_lh);
  font-weight: 400;
  line-height: 24px;
  margin: 20px 0 0 0;
}

#succes .slide-incoming__swiper-pag-color {
  color: var(--accent);
}

#succes .slide-incoming__swiper-pag {
  font-size: var(--h3);
  color: var(--lock-text);
  position: absolute;
  /* left: 10px; */
  bottom: 0px;
  font-weight: 700;
  font-family: 'Montserrat-Regular';
  width: 65px;
  display: flex;
  justify-content: space-between;
}

#succes .carousel.mobile {
  display: none;
}

@media screen and (max-width: 1200px) {
  #succes .slide-incoming__swiper-pag{
    width: 35px;
  }

  #succes .slide .image-wrapper{
    height: 300px;
  }

  #succes .slide-incoming__swiper-element {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-template-rows: max-content;
  }
  #succes .slide-incoming__swiper-element-info {
    padding: 20px;
  }
  #succes .slide-incoming__swiper-element img {
    border-radius: 20px 20px 0px 0px;
  }
  #succes .carousel {
    display: none;
  }
  #succes .carousel.mobile {
    display: block;
    padding: 0 0 60px 0;
  }
  #succes .slide-incoming__swiper-element-title,
  #succes .slide-incoming__swiper-element-text {
    color: var(--bg);
  }

  #succes .slide-incoming__swiper-element-text {
    margin: 10px 0 0 0;
  }

  #succes .slide-incoming__swiper-element {
    background-color: var(--text);
    height: 100%;
  }
  #succes .slide-incoming__swiper-element img{
    height: 300px;
  }

  #succes .swiper__custom-arrow{
    margin-right: -40px !important;
  }

  #succes .swiper__custom-arrow button {
      margin-right: 20px !important;
  }

  .normal #succes .swiper__custom-arrow button:hover{
      background-color: var(--lock) !important;
      color: var(--accent) !important;
  }
  #succes .swiper__custom-arrow button:active {
      box-shadow: none !important;
      transform: none !important;
  }
}
</style>
