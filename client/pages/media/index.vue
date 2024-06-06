<template>
    <base-page-title 
        :title="data?.fields.banner.title + ' <span class=\'page-title__slim\'>' + data?.fields.banner.subtitle + '</span>'" 
        :img="data?.fields.banner.img"
        class="media_photo"/>
    <MediaList 
    class="media_list_section"/>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            data: null
        }
    },

    mounted() {
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/media_request")
            .then(response => {
                this.data = response.data;
                useSeoMeta({
                    title: response.data?.seo.meta_title,
                    ogDescription: response.data?.seo.meta_description,
                    description:  response.data?.seo.meta_description,
                    keywords: response.data?.seo.meta_keywords,
                    imgSrc: response.data?.seo.og_image
                });
            })
            .catch(error => {
                console.log(error);
            });
    }
}
</script>

<style>

.media_photo .gradient::before{
    border-radius: 20px 20px 0 0 !important;
}
.media_photo .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
@media screen and (max-width: 1200px) {
    .media_list_section{
        border-radius: 0;
    }
    .media_photo .image-wrapper img{
        object-position: 15% !important;
    }
    .media_photo{
        z-index: 20;
    }
    .media_photo .image-wrapper img{
        border-radius: 20px !important;
    }
    .media_photo .gradient::before{
        border-radius: 20px !important;
    }
}
</style>