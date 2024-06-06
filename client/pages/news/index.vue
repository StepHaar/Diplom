<template>
    <base-page-title 
    :title="data?.fields?.banner?.title" 
    :subtitle="data?.fields?.banner?.subtitle" 
    :img="data?.fields?.banner?.img"
    class="news_photo"/>
    <NewsList 
    class="news_list_section"/>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            data: null,
        }
    },

    mounted() {
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/news_request")
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
.news_list_section{
    border-radius: 0;
}
@media screen and (max-width: 1200px){
    .news_photo .image-wrapper img{
        object-position: 40% !important;
    }
    .news_photo .page-title__text-title{
        margin-bottom: 60px;
    }
}
.news_photo{
    z-index: 20;
}
.news_photo .gradient::before{
    border-radius: 20px !important;
}

</style>