<template>
    <base-page-title
        :title="data?.banner.title + ' <span class=\'page-title__slim\'>' + data?.banner.subtitle + '</span>'"
        :text="data?.banner.content"  
        :img="data?.banner.img"
        class="intellegence_title_text"/>
    <intelligence-basic-information :data="data"/>
    <intelligence-Education :data="data"/>
    <intelligence-Leadership :data="data"/>
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
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/intelligence_request")
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
.intellegence_title_text .page-title__text-title{
    margin-bottom: 0;
}
.intellegence_title_text .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
</style>