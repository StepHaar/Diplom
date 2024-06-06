<template>
    <base-page-title :title="data?.banner.title" :img="data?.banner.img" class="incoming-first-section" />
    <incoming-Profession :data="data"/>
    <incoming-Work  :data="data"/>
    <incoming-Success  :data="data"/>
    <base-application-form  :data="data?.request.demand"/>
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
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/incoming_request")
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
.incoming-first-section .image-wrapper img{
    object-position: center top;
    border-radius: 20px 20px 0 0 !important;
}

@media screen and (max-width: 1200px) {
    .incoming-first-section .page-title__text-title{
        font-size: 28px !important;
    }
}

</style>