<template >
    <section id="changes-life">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.title" :sub_title="'<br>' + data?.subtitle" type="light"/> 
            <div class="changes-life__video" @click="playVideo()" :class="image ? '':'hide-video'">
                <BaseVideo :video="data?.video"/>
            </div>
            <div class="changes-life__cards">
                <UICardGradientNumber v-for="(item, index) in data?.card" :title="item?.title" :content="item?.content" :index="index"/>
            </div>
        </div>
    </section>
</template>

<script setup>
import { PhPlayCircle, PhPauseCircle } from '@phosphor-icons/vue'; 
const image = useCookie("image");
const is_active_play = ref(false)
const play_btn = ref('')
const is_active_pause = ref('')

if (image?.value == undefined) {
    image.value = true
}

onMounted(() => {
    console.log(image.value);
})


const props = defineProps({
    data: null
})

function playVideo(){
    is_active_play.value = !is_active_play.value
    is_active_pause.value = !is_active_pause.value
}

</script>

<style>
#changes-life .image-wrapper{
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.changes-life__video.hide-video .video-container{
    opacity: 0;
    pointer-events: none;
}

.changes-life__video.hide-video{
    background-color: var(--bg);
}

#changes-life{
    background-color: var(--text);
    position: relative;
    margin-bottom: -20px;
}

.app-wrapper.blue #changes-life {
    background-color: var(--bg);
}

.app-wrapper.blue #changes-life .title__bold{
    color: var(--text) !important;
}

.app-wrapper.blue #changes-life .card-gradient-number{
    background-color: var(--lock) !important;
}

.app-wrapper.blue #changes-life .card-gradient-number-number::before{
    background: var(--accent) !important;
    color: var(--text);
    position: relative !important;
    transition: none;
    transform: none;
}
.app-wrapper.blue #changes-life .card-gradient-number-number{
    color: var(--text);
    
}

.app-wrapper.dark #changes-life .card-gradient-number-number::before,
.app-wrapper.dark #changes-life .card-gradient-number-info-title,
.app-wrapper.dark #changes-life .card-gradient-number-info-text{
    color: var(--accent);
}


.changes-life__video{
    position: relative;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 40px;
}

.changes-life__video video{
    border-radius: 20px;
    height: auto;
    width: 100%;
}

.changes-life__video-btns{
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
}

.changes-life__video-btn{
    position: absolute;
    opacity: 0;
    transition: all .2s ease;
    pointer-events: none;
    background: none;
}

.changes-life__video-btn-pause{
    position: absolute;
    opacity: 0;
    transition: all .2s ease;
    pointer-events: none;
    background: none;
}

.normal .changes-life__video:hover .changes-life__video-btn-pause.active{
    opacity: 1 ;
}

.changes-life__cards{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

@media screen and (mix-width: 1200px) and (max-width: 1600px) {
    
}

@media screen and (max-width: 1200px) {
    .changes-life__video{
        margin-bottom: 20px;;
    }
    .changes-life__cards{
        grid-template-columns: 1fr;
        max-height: none;
        height: auto;
        grid-template-rows: auto;
    }
    .changes-life__video-btn{
        width: 40px;
        height: 40px
    }
    .changes-life__video-btn-pause{
        width: 40px;
        height: 40px
    }
    .app-wrapper.blue #changes-life .card-gradient-number-number::before{
        background-color: transparent !important;
    }
}
</style>