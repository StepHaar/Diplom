<template>
    <section class="first-section" id="page-title">
        <div class="container contacts__wrapper wrapper-padding">
            <div class="page-title__text">
                <h1 class="page-title__text-title" v-html="props?.title"></h1>
                <p class="page-title__text-subtitle" v-if="text" v-html="props?.text"></p>
                <a v-if="button && scroll_to" class="page-title__button">
                    <UIButton scrollTo="#application-form" class="page-title__text-btn" :InnerText="props?.button" type="big enabled"/>
                </a>
                <!-- <UIButton scrollTo="#application-form" :InnerText="props?.button" v-else-if="button" type="big enabled"/> -->
            </div>
        </div>
        <div class="gradient_img">
            <div class="gradient" :class="image ? '':'clear-gradient'">
            </div>
            <BaseImageWrapper :src="props?.img"/>
        </div>
    </section>
</template>
<script setup>

const image = useCookie("image");

if (image?.value == undefined) {
    image.value = true
}

const props = defineProps({
    title: String,
    text: String,
    subtitle:String,
    img: String,
    button: String, 
    scroll_to: String,
});
</script>

<style>

#page-title .gradient_img .image-wrapper {
    background-color: #000000;
}

#page-title .image-wrapper{
    position: absolute;
    top: 0;
    height: 100%;
    width: 100%;
    object-fit: cover;
}

#page-title .gradient {
    display: block;
    border-radius: 20px;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
}


#page-title .gradient .image-wrapper {
    position: relative;
    z-index: 1;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#page-title .gradient img {
    position: relative;
    z-index: 1;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
#page-title .gradient .image-wrapper img{
    border-radius: 20px 20px 0px 0;
    
}

#page-title .gradient::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 2;
  background: linear-gradient(213.25deg, rgba(67, 67, 67, 0) 41.48%, #000000 91.79%);
  border-radius: 20px 20px 0 0;
}

.page-title__text-title {
    font-size: var(--h1);
    font-weight: 700;
    line-height: var(--h1_lh);
    letter-spacing: 0.045em;
    text-align: left;
    margin-bottom: 80px;
}

.contacts__wrapper {
    display: flex;
    align-items: flex-end;
    position: relative;
    z-index: 30;
}

.first-section .container{
    z-index: 30;
    padding-bottom: 30px;
    
}

.page-title__slim {
    font-family: "Montserrat-Light";
    font-weight: 400;
}

/* #page-title {
    position: relative;
    background-size: cover !important;
    background-position: center center !important;
} */

.page-title__text {
    color: #fff;
    align-items: flex-start;
    padding-bottom: 120px;
    /* padding-left: 70px; */
}

.first-section{
    position: relative;
    z-index: 0;
}

.page-title__text-subtitle {
    margin: 20px 0 0 0;
    font-size: var(--text_size);
    font-weight: 400;
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    font-family: "Montserrat-Light"
}

.page-title__text-btn {
    margin-top: 60px;
}

.page-title__text a {
    width: max-content;
    cursor: default;
}

@media screen and (max-width: 1200px) {
    .page-title__text{
        /* margin-bottom: 80px; */
        word-break: break-word;
        hyphenate-character: "-";
    }

    .gradient {
        height: 100%;
        display: block;
        border-radius: 20px;
        width: 100%;
    }

    .gradient img {
        position: relative;
        z-index: 1;
        width: 100%;
        object-fit: cover;
    }

    .gradient::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
        background: linear-gradient(213.25deg, rgba(67, 67, 67, 0) 41.48%, #000000 91.79%) !important;
    }

    .gradient .clear-gradient::before{
        background: var(--text) !important;
    }

    .first-section .container{
        z-index: 30;
    }
    
    .first-section{
        z-index: 0;
    }
    
    .page-title__text {
        padding-bottom: 0px;
        padding-left: 0px;
    }
    .first-section {
        background-position: center;
    }
    .page-title__button .custom-btn{
        margin-top: 40px;
        margin-bottom: 80px;
        width: 100%;

    }
    #page-title .image-wrapper img{
        object-position: 60%;
    }
    
}
</style>