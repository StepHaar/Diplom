<template>
    <div class="news-card-holder">
        <div class="news-card-holder-wrapper">
            <nuxt-link class="news-a" target="_blank" :to="'media/' + item?.slug">
                <BaseImageWrapper img_class="img" :src="item?.fields.img" class="news-card-holder-img" />
            </nuxt-link>
        </div>
        <div class="card-holder-content">
            <a class="news-card-holder-date">{{ item?.fields.date }}</a>
            <nuxt-link class="news-card-holder-text" target="_blank" :to="'media/' + item?.slug">{{ item?.fields.title }}</nuxt-link>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    // data: null,
    item: null,
})
</script>

<style scoped>

.app-wrapper.dark .news-card-holder-text{
    color: var(--accent);
}

.news-a{
    font-size: 0px;
}

.news-card-holder{
    width: 100%;
    height: 100%;
    overflow: hidden;
    color: var(--text);
}

.normal .news-card-holder:hover .news-card-holder-text{
    transition: all .5s;
    color: var(--accent);
}


.normal .news-card-holder:hover .news-card-holder-date{
    color: var(--accent);
}

.normal .news-card-holder:hover .news-card-holder-img{
    border-radius: 20px;
    transform: scale(1.1);
    object-fit: cover;
}

.card-holder-content{
    display: flex;
    flex-direction: column;
}

.news-card-holder-wrapper{
    width: 100% !important;
    border-radius: 20px;
    object-fit: cover;
    overflow: hidden;
    display: block;
}

.news-card-holder-wrapper .image-wrapper{
    background-color: var(--text)
}
.app-wrapper.blue .news-card-holder-wrapper .image-wrapper{
    background-color: var(--bg)
}

.news-card-holder-img{
    transition: all .5s;
    height: 330px;
}

.news-card-holder-date{
    font-weight: 400;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    text-align: left;
    color: var(--lock-text);
    margin: 10px 0 10px 0;
}

.news-card-holder-text{
    font-weight: 700;
    font-size: var(--h4);
    line-height: var(--h4_lh);
    letter-spacing: 0.045em;
    color: var(--text);
}

@media screen and (min-width: 1200px) and (max-width: 1600px){
    
}

@media screen and (max-width: 1200px) {
    .normal .news-card-holder:hover .news-card-holder-date{
        color: var(--lock-text);
    }

    .normal .news-card-holder:hover .news-card-holder-img{
        border-radius: 20px;
        transform: none;
        object-fit: cover;
    }
    .normal .news-card-holder:hover .news-card-holder-text{
        transition: none;
        color: var(--text) !important;
    }
    .normal .news-card-holder:hover .news-card-holder-img img {
        transform: none;
    }
    .news-card-holder-date {
        display: flex;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: 0.045em;
    }
    .news-card-holder-text{
        display: flex;
        line-height: var(--h4_lh) !important;
    }
    .news-card-holder-img{
        height: 330px;
        transform: none;
        transition: none;
    }
}
</style>