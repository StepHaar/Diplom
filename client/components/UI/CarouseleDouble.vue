<template>
    <n-carousel effect='fade' :centered-slides="1" :slides-per-view="1" :show-dots="false"
        class="carousele-double__carousel-imgs" :current-index=img_index>
        <div class="carousele-double__carousel-imgs-img" v-for="item in data">
        <base-image-wrapper img_class="img" :src="item?.img" class="ac-img"/>
        </div>
    </n-carousel>
    <div class="carousele-double__info">
        <n-carousel effect='slide' :loop="false" :centered-slides="1" :slides-per-view="1" :show-dots="false"
            :show-arrow="true" @update:current-index="updateIndex" class="carousele-double">
            <div class="carousele-double__info-text" v-for="item in data">
                <p v-html="item?.content"></p>
            </div>
            <template #arrow="{ prev, next }">
                <div class="carousele-double__custom-arrow">
                    <button ref="btn_prev" type="button" class="carousele-double__custom-arrow--left" @click="prev" :class="info_index == 0 ? 'lock' : ''">
                        <ph-arrow-left :size="24" weight="light" class="arrow" />
                    </button>
                    <button type="button" ref="btn_next" class="carousele-double__custom-arrow--right" @click="next" :class="info_index == cnt_index ? 'lock' : ''">
                        <ph-arrow-right :size="24" weight="light" class="arrow" />
                    </button>
                </div>
            </template>
        </n-carousel>
        <div class="carousele-double__info-pag">
            <div class="carousele-double__info-pag-color-text">
                <span class="carousele-double__info-pag-color">
                    {{ info_index + 1 }}
                </span>
            </div>
        
            <div class="carousele-double__info-pag-text">
                / {{ props?.data?.length }}
            </div>
        </div>
    </div>
</template>

<script setup>
import { NCarousel } from "naive-ui";
import { PhArrowRight, PhArrowLeft } from "@phosphor-icons/vue";

const props = defineProps({
    slide_prev: Number,
    data: Array,
})

const img_index = ref(0)
const info_index = ref(0)
const btn_next = ref('');
const btn_prev = ref('');
const cnt_index = ref(null);

watch(props,(new_value) => {
    if (new_value?.data){
        cnt_index.value = props?.data?.length - props?.slide_prev
    }
    
});

function updateIndex(index) {
    info_index.value = index;
    img_index.value = info_index.value

}

</script>

<style>
.app-wrapper.blue #about-cards .carousele-double__custom-arrow button,
.app-wrapper.dark #about-cards .carousele-double__custom-arrow button,
.app-wrapper.monochrome #about-cards .carousele-double__custom-arrow button{
    box-shadow: none;
    transform: none;
}

#about-cards .carousele-double__carousel-imgs-img img{
    width: 100%;
    height: 100%;
    border-radius: 20px;
    overflow: hidden;
    object-fit: cover;
}
#about-cards .lock {
    color: var(--lock-text) !important;
}

.normal #about-cards .carousele-double__custom-arrow button.lock:hover {
    color: var(--lock-text) !important;
    background-color: var(--lock) !important;
    cursor: auto;
}
#about-cards .carousele-double__custom-arrow button.lock{
    cursor: auto;
}

#about-cards .carousele-double__custom-arrow button.lock:active {
    transform: scale(1);
    transform-origin: center;
    background-color: var(--lock);
    box-shadow: none;
}

.carousele-double__custom-arrow {
    position: absolute;
    display: flex;
    bottom: 0;
    right: 20px;
    z-index: 99;
}

#about-cards .ac-img {
    border-radius: 20px;
}

.app-wrapper.blue #about-cards .carousele-double__custom-arrow button,
.app-wrapper.dark #about-cards .carousele-double__custom-arrow button,
.app-wrapper.monochrome #about-cards .carousele-double__custom-arrow button{
  box-shadow: none;
  transform: none;
}

#about-cards .carousele-double__custom-arrow button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    margin-right: 20px;
    color: var(--accent);
    background-color: var(--lock);
    border-width: 0;
    border-radius: 50%;
    transition: background-color 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}

#about-cards .carousele-double__custom-arrow button:last-of-type {
    margin-right: 0px;
}

.normal #about-cards .carousele-double__custom-arrow button:hover {
    color: var(--bg);
    background-color: var(--accent);
}

#about-cards .carousele-double__custom-arrow button:active {
    transform: scale(0.95);
    transform-origin: center;
    background-color: var(--lock);
    box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

#about-cards .carousele-double__info {
    position: relative;
    background-color: var(--bg);
    border-radius: 20px;
    padding: 40px;
    max-height: 584px;
    height: 100vh;
}

#about-cards .carousele-double__info-text {
    font-size: var(--text_size);
    color: var(--text)
}

#about-cards .carousele-double__info-pag-color {
    color: var(--accent);
}

#about-cards .carousele-double__info-pag {
    font-size: var(--h3);
    color: var(--lock-text);
    line-height: var(--h3_lh);
    position: absolute;
    left: 40px;
    bottom: 40px;
    display: flex;
    justify-content: space-between;
}


.app-wrapper.blue #about-cards .carousele-double__info-pag {
    color: var(--text);
}

#about-cards .carousele-double__carousel-imgs-img {
    width: 100%;
    border-radius: 20px;
    max-height: 584px;
    height: 100vh;
    background-size: cover !important;
    background-position: center center !important;
}

#about-cards .carousele-double__carousel-imgs-img .image-wrapper{
    height: 100%;
}
#about-cards .carousele-double__info-pag {
    width: 70px;
}

@media screen and (max-width: 1200px) {
    
    #about-cards .carousele-double__carousel-imgs-img {
        height: 190px;
        width: 100%;
        border-radius: 10px;
    }
    
    #about-cards .carousele-double__carousel-imgs {
        width: calc(100vw - 40px);
    }
    
    #about-cards .carousele-double__info {
        width: calc(100vw - 40px);
        padding: 20px;
        border-radius: 10px;
        min-height: max-content;
        max-height: none;
        height: auto;
    }
    
    #about-cards .carousele-double__info-pag {
        bottom: 20px;
        width: 40px;
        left: 20px;
    }
    
    #about-cards .carousele-double__custom-arrow {
        right: 0px;
    }
    
    #about-cards .carousele-double__info-text {
        padding-bottom: 60px;
    }
    .normal #about-cards .carousele-double__custom-arrow button:hover{
        background-color: var(--lock);
        color: var(--accent);
    }
    #about-cards .carousele-double__custom-arrow button:active {
        box-shadow: none;
        transform: none;
    }
}
</style>