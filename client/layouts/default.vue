<template>
    <base-header :data="data" :is_close="to_close"/>
    <main @click="close">
        <slot />
    </main>
    <base-footer :data="data"/>
</template>

<script>

import axios from 'axios'

export default {
    data() {
        return {
            to_close: {
                type: Boolean, default: ()=> false
            },
            data: null,
        }
    },
    mounted() {
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/site_info")
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
    },
    methods:{
        close(){
            this.to_close = !this.to_close
        },
    }
}


</script>

<style>
main{
    margin-top: 103px;
}
@media screen and (max-width: 1200px){
    main{
        margin-top: 85px;
    }
}
</style>