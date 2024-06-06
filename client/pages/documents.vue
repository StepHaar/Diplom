<template>
    <base-page-title 
        :title="data?.banner.title + ' <span class=\'page-title__slim\'> <br>' + data?.banner.subtitle + '</span>'"
        :img="data?.banner.img"
        class="documents_photo"/>
    <documents-document-element :data="data"/>  
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
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/documents_request")
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
.documents_photo .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
</style>
