<template>
    <base-page-title 
    :title="data?.title" 
    :img="data?.fields?.img"
    class="media_list_photo"/>
    <UINewsArtInfo 
    :data="data?.fields"
    class="art_media_section"/>
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
        
        axios.get(`http://stud.shubizle11.beget.tech/v1/methods/media/${slug}`)
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
.art_media_section{
    border-radius: 0 !important;
    /* z-index: 0; */
}
.media_list_photo .image-wrapper img{
    object-position: center 30%;
    border-radius: 20px !important;
}
.media_list_photo{
    z-index: 20;
    border-radius: 20px !important;
}
.media_list_photo .gradient::before{
    border-radius: 20px !important;
}
@media screen and (max-width: 1200px){
    .media_list_photo .image-wrapper img{
        border-radius: 20px 20px 0 0 !important;
        object-position: 45% !important;
    }
    .media_list_photo{
        z-index: 0;
    }
    .art_media_section{
        border-radius: 20px 20px 0 0 !important;
    }
}
</style>