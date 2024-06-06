<template>
    <base-page-title 
    :title="data?.title" 
    :img="data?.fields?.img" 
    class="news-first-section"/>
    <UINewsArtInfo 
    :data="data?.fields"
    class="art_news_section"/>
    <NewsVideo :video="data?.fields.video_file" v-if="data?.fields.video"/>
    <UINewsArtPhotos :data="data?.fields?.carousel"/>
</template>

<script>
import axios from 'axios'
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            data: null,
        }
    },
    mounted() {
        const router = useRouter();
        const slug = router.currentRoute.value.params.slug;
        console.log('slug:', slug);
        
        axios.get(`http://stud.shubizle11.beget.tech/v1/methods/news/${slug}`)
        .then(response => {
            this.data = response.data;
            console.log(this.data);
        })
        .catch(error => {
            console.log(error);
            
        });
    }
}
</script>

<style>
.art_news_section{
    border-radius: 0 !important;
}
.news-first-section .image-wrapper img{
    object-position: center 30%;
    border-radius: 20px !important;
}
.news-first-section{
    z-index: 20;
}
.news-video {
    background-color: var(--lock)
}
.news-first-section .gradient::before{
    border-radius: 20px !important;
}
@media screen and (max-width: 1200px){
    .news-first-section .image-wrapper img{
        border-radius: 20px 20px 0 0 !important;
        object-position: 20% !important;
    }
    .news-first-section{
        z-index: 0;
    }
    .art_news_section{
        border-radius: 20px 20px 0 0 !important;
    }
}
</style>