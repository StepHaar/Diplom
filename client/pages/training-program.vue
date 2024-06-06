<template>
    <base-page-title
        :title="data?.banner.title + ' <span class=\'page-title__slim\'>' + data?.banner.subtitle + '</span>'"
        :text="data?.banner.content" 
        :button="data?.banner.button" 
        scroll_to="#application-form"
        :img="data?.banner.img"
        class="training_photo"
    />
    <training-program-full-stack :data="data"/>
    <training-program-advantages-prog :data="data"/>
    <base-application-form :data="data?.request.demand"/>
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
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/training_request")
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
.training_photo .page-title__text-title{
    margin-bottom: 0;
}
.training_photo .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
@media screen and (max-width: 1200px){
    .training_photo .image-wrapper img{
        object-position: 0% !important;
    }
}
</style>