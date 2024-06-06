<template>
  <section id="leadership">
    <div class="container wrapper-padding">
      <base-title-content :title="data?.leadership.title" :sub_title="data?.leadership.subtitle" color="--text" />
      <div class="leadership-cards" v-if="data?.leadership.card?.length < 4" :class="image ? '':'hide'">
        <div class="leadership__cards-wrapper" v-for="item in data?.leadership?.card">
          <div class="cards-wrapper_img">
            <base-image-wrapper :src="item?.img" alt="" class="leadership__cards-wrapper_img"/>
            <!-- <img :src="item?.img" alt="" class="leadership__cards-wrapper_img"/> -->
          </div>
          <h4 class="leadership__cards-name">{{ item.name }}</h4>
          <p class="leadership__cards-post">{{ item.post }}</p>
        </div>
      </div>
      <div class="leadership-carousell" v-else>
        <u-i-carousele
          :data="data?.leadership?.card"
          :slide_prev="3"
          color_pag="var(--text)"
          color_button="var(--bg)"
        >
          <div class="leadership__cards-wrapper" v-for="item in data?.leadership?.card">
            <div class="cards-wrapper_img">
            <base-image-wrapper :src="item?.img" alt="" class="leadership__cards-wrapper_img"/>
              <!-- <img :src="item?.img" alt="" class="leadership__cards-wrapper_img"/> -->
            </div>
            <h4 class="leadership__cards-name">{{ item.name }}</h4>
            <p class="leadership__cards-post">{{ item.post }}</p>
          </div>
        </u-i-carousele>
      </div>
      <div class="leadership-carousell mobile">
        <u-i-carousele
          :data="data?.leadership?.card"
          color_pag="var(--text)"
          color_button="var(--bg)"
        >
          <div class="leadership__cards-wrapper" v-for="item in data?.leadership?.card">
            <div class="cards-wrapper_img">
            <base-image-wrapper :src="item?.img" alt="" class="leadership__cards-wrapper_img"/>
            </div>
            <h4 class="leadership__cards-name">{{ item.name }}</h4>
            <p class="leadership__cards-post">{{ item.post }}</p>
          </div>
        </u-i-carousele>
      </div>
    </div>
  </section>
</template>

<script setup>
const image = useCookie("image");
const props = defineProps({
  data: null,
});
</script>

<style>
#leadership {
  background-color: var(--lock);
  position: relative;
  z-index: 2;
}

.app-wrapper.monochrome #leadership .leadership__cards-post {
  color: var(--accent);
}

#leadership .image-wrapper img{
  display: block;
  height: 575px;
}

.app-wrapper.dark #leadership .title .title__bold,
.app-wrapper.dark #leadership .title .title__slim,
.app-wrapper.dark #leadership .leadership__cards-wrapper{
  color: var(--bg);
}

.app-wrapper.blue #leadership{
    background-color: var(--text);
}
.app-wrapper.blue #leadership .title .title__bold,
.app-wrapper.blue #leadership .title .title__slim,
.app-wrapper.blue #leadership .leadership__cards-wrapper{
  color: var(--bg);
}
.app-wrapper.blue #leadership .swiper__pag{
  color: var(--accent) !important;
}
.app-wrapper.blue #leadership .swiper__pag-color{
  color: var(--light-accent);
}
.app-wrapper.blue #leadership .swiper__custom-arrow svg{
  fill: var(--text);
}
.app-wrapper.blue #leadership .swiper__custom-arrow--left.lock svg,
.app-wrapper.blue #leadership .swiper__custom-arrow--right.lock svg{
  fill: var(--accent);
  cursor: auto;
}

#leadership .title__bold{
    color: var(--text);
}

#leadership .title__slim{
    color: var(--text);
}

.leadership-carousell {
  position: relative;
}

.leadership-cards {
  position: relative;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.leadership-swiper {
  margin-top: 40px;
  position: relative;
}

.n-carousel .n-carousel__slides .n-carousel__slide {
  height: auto !important;
}

.leadership__carousel {
  position: relative;
  /* padding: 0 0 80px 0; */
}

.leadership__custom-arrow {
  position: absolute;
  display: flex;
  bottom: 0;
  right: 20px;
  z-index: 99;
}

.leadership__custom-arrow button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  margin-right: 12px;
  color: #3947f4;
  background-color: var(--bg);
  border-width: 0;
  border-radius: 50%;
  transition: background-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  cursor: pointer;
}

.leadership__custom-arrow button:active {
  transform: scale(0.95);
  transform-origin: center;
  background-color: var(--bg);
  box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

.leadership__subtitle {
  font-size: var(--text_size_lh);
  line-height: var(--text_size_lh);
  /* margin: -20px 0 0 0; */
}

.leadership__cards {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-auto-rows: 1fr;
  gap: 20px;
  margin-top: 40px;
}

.leadership__cards-wrapper {
  height: 100%;
  width: 100%;
  flex-direction: column;
  color: var(--text);
  display: inline-block;
  overflow: hidden;
  /* border-radius: 20px; */
  /* transition: 1.5s, opactity 1.5s, background-color 1.5s; */
}

.cards-wrapper_img{
  display: inline-block;
  overflow: hidden;
  width: 100%;
  border-radius: 20px; 
  transition: all 1.5s;
}

.cards-wrapper_img .leadership__cards-wrapper_img{
  background-color: rgb(0, 0, 0);
  border-radius: 25px;
}

.cards-wrapper_img .leadership__cards-wrapper_img.hidden{
  background-color: var(--bg);
}



.normal .leadership-carousell:hover .normal .leadership__cards-wrapper:hover img{
  transform: scale(1.1);
  object-fit: cover;
  border-radius: 20px;
  opacity: 1;
}

.normal .leadership-carousell .n-carousel__slides:hover img{
  opacity: 0.7;
}

.normal .leadership-carousell .n-carousel__slide:hover img,
.leadership__cards-wrapper:hover img{
  opacity: 1 !important;
}

.normal .leadership-cards.hide:hover .normal .leadership__cards-wrapper:hover img{
  opacity: 0;
}

.normal .leadership-cards:hover .normal .leadership__cards-wrapper:hover img{
  transform: scale(1.1);
  object-fit: cover;
  border-radius: 20px;
  opacity: 1;
}

.normal .leadership-carousell.hide:hover .normal .leadership__cards-wrapper:hover img,
.normal .leadership-cards.hide:hover .normal .leadership__cards-wrapper:hover img,
.normal .leadership-cards.hide:hover img,
.normal .leadership-carousell.hide:hover img,
.normal .leadership-cards.hide:hover img:hover,
.normal .leadership-carousell.hide:hover img:hover{
  opacity: 0;
}


.normal .leadership-cards:hover img{
  opacity: 0.7;
}

.normal .leadership-cards:hover img:hover{
  opacity: 1;
}

.normal .leadership__cards-wrapper img {
  object-fit: cover;
  width: 100%;
  height: 575px;
  border-radius: 20px;
  display: block;

  transition: 0.9s, background-color 0.9s, opacity 0.9s;
}

.normal .leadership__cards-wrapper:hover .leadership__cards-name{
  color: var(--accent);
  transition: 1.2s;
}
.normal .leadership__cards-wrapper:not(:hover) .leadership__cards-name{
  transition: 1.2s;
}

.leadership__cards-name {
  margin: 10px 0 10px;
  font-size: var(--h4);
  line-height: var(--h4_lh);
  font-weight: 700;
}

.leadership__cards-post {
  color: var(--lock-text);
  margin: 0;
  font-size: var(--text_size);
  line-height: var(--text_size_lh);
  font-weight: 600;
}

.leadership-carousell .swiper__pag {
  left: 20px;
}

.leadership-carousell.mobile {
  display: none;
}

@media screen and (max-width: 1200px) {
  /* .leadership__cards-wrapper {
    padding: 30px;
  } */
  .normal .leadership-carousell:hover .normal .leadership__cards-wrapper:hover img{
    transform: none
  }
  .normal .leadership-carousell .n-carousel__slides:hover img{
    opacity: 1;
  }
  .normal .leadership-cards.hide:hover .normal .leadership__cards-wrapper:hover img{
    opacity: 1;
  }
  .normal .leadership-cards:hover .normal .leadership__cards-wrapper:hover img{
    transform: none;
  }
  .normal .leadership__cards-wrapper img {
    transition: none, background-color none, opacity none;
  }

  .normal .leadership__cards-wrapper:hover .leadership__cards-name{
    color: var(--text);
    transition: none;
  }
  .normal .leadership__cards-wrapper:not(:hover) .leadership__cards-name{
    transition: none;
  }
  .leadership__cards-wrapper img {
    height: 330px;
  }
    .leadership-carousell.mobile {
    display: block;
  }
  .leadership-cards {
    display: none;
  }
  .leadership__cards-name{
    margin: 10px 0 5px 0;
  }
  .cards-wrapper_img{
    display: block !important;
  }
}

</style>
