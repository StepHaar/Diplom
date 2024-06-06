<template>
    <base-page-title
        :title="data?.banner.title + ' <span class=\'page-title__slim\'><br>' + data?.banner.subtitle + '</span>'"
        :text="data?.banner.content" 
        :button="data?.banner.button" 
        scroll_to="#application-form"
        :img="data?.banner.img"
        class="page_title_text"
    />
    <home-why-choose-us 
    :data="data?.choice"
    class="why_choose_section"/>
    <home-specialties :data="data?.speciality"/>
    <home-changes-life :data="data?.step"/>
    <home-index-partners :data="data?.partners"/>
    <base-application-form :data="data?.request.demand"/>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            data: null,
        };
    },

    mounted() {
        axios
            .get("http://stud.shubizle11.beget.tech/v1/methods/home_request")
            .then((response) => {
                this.data = response.data;
                useSeoMeta({
                    title: response.data?.seo.meta_title,
                    ogDescription: response.data?.seo.meta_description,
                    description: response.data?.seo.meta_description,
                    keywords: response.data?.seo.meta_keywords,
                    imgSrc: response.data?.seo.og_image,
                });
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>

<style>
.why_choose_section{
    border-radius: 0;
}
.page_title_text .page-title__text-title{
    margin-bottom: 0;
}

.page_title_text{
    z-index: 20;
}
.page_title_text .gradient::before{
    border-radius: 20px !important;
}

@media screen and (max-width: 1200px) {
    .page_title_text .page-title__text-title{
        font-size: 26px !important;
    }
    .page_title_text .page-title__button .custom-btn{
        margin-bottom: 60px;
    }
}

</style>
