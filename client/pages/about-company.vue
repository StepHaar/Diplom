<template>
    <base-page-title 
    :title="data?.banner.title" 
    :img="data?.banner.img"
    class="about_photo"/>
    <AboutCompanyAboutCards :data="data"/>
    <about-company-value-org :data="data"/>
    <about-company-goals-objectives :data="data"/>
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
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/about_request")
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
.about_photo .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
</style>