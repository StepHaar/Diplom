<template>
    <section id="news-video">
        <div class="container wrapper-padding news-video">
            <div class="news-video_wrapper" @click="playVideo()" :class="image ? '':'hide-video'">
                <BaseVideo :video="video"/>
            </div>
        </div>
    </section>
</template>

<script setup>
const image = useCookie("image");
const is_active_play = ref(false)
const play_btn = ref('')
const is_active_pause = ref('')

if (image?.value == undefined) {
    image.value = true
}

function playVideo(){
    is_active_play.value = !is_active_play.value
    is_active_pause.value = !is_active_pause.value
}
const props = defineProps({
    video: String,
})
</script>

<style>
#news-video{
    background-color: var(--lock);
}

.news-video_wrapper{
    position: relative;
    border-radius: 20px;
}

.news-video_wrapper video{
    border-radius: 20px;
    height: auto;
    width: 100%;
}

.news-video_wrapper.hide-video .video-container{
    opacity: 0;
    pointer-events: none;
}

.changes-life__video.hide-video{
    background-color: var(--bg);
}
</style>