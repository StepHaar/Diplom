<template>
    <base-page-title 
        :title="data?.banner.title" 
        :img="data?.banner.img"
        class="employees_photo"/>
    <employees-work-with-us :data="data"/>
    <employees-requirements :data="data"/>
    <BaseApplicationForm  :data="data?.request.demand" style="margin-top: -30px;"/>
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
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/employees_request")
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
.employees_photo .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
@media screen and (max-width: 1200px){
    .employees_photo .image-wrapper img{
        object-position: 50% !important;
    }
}
</style>