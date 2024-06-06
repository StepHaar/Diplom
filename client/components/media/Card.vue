<template>
    <div class="media-card" >
        <div class="media-card-holder">
            <div class="card-holder-wrapper">
                <a target="_blank" :href="item?.link">
                    <BaseImageWrapper img_class="img" :src="item?.img" class="card-holder-img"/>
                </a>
            </div>
            <div class="media-card-holder_content">
                <a class="media-card-holder_date">{{ item?.date }}</a>
                <a class="media-card-holder_text" target="_blank" :href="item?.link">{{ item?.title }}</a>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    item: null,
    data: null,
})
</script>

<style scoped>

.media-card-holder{
    overflow: hidden;
    /* border-radius: 20px; */
    height: 100%;
    width: 100%;
    /* display: inline-block; */
    /* overflow: hidden; */
    color: var(--text);
}

.normal .media-card-holder:hover .media-card-holder_text{
    color: var(--accent);
}

.normal .media-card-holder:hover .media-card-holder_date{
    color: var(--accent);
}

.normal .media-card-holder:hover .card-holder-img{
    transform: scale(1.1);
    border-radius: 20px;
    object-fit: cover;
}

.card-holder-wrapper{
    object-fit: cover;
    display: block;
    overflow: hidden;
    border-radius: 20px;
    width: 100% !important;
    margin: 0;
}

.card-holder-wrapper .image-wrapper{
    background-color: var(--text);
}

.card-holder-img{
    transition: .5s;
    height: 330px;
    margin: 0;
}

.media-card-holder_content{
    display: flex;
    flex-direction: column;
}

.media-card-holder_date{
    font-weight: 400;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    color: var(--lock-text);
    margin: 16px 0 16px 0;
}

.media-card-holder_text{
    font-weight: 700;
    font-size: var(--h4);
    line-height: var(--h4_lh);
    letter-spacing: 0.045em;
    color: var(--text);
}

@media screen and (max-width: 1200px){
    .media-card{
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    .media-card-holder{
        gap: 10px;
    }
    .card-holder_img {
        width: 100%;
        height: max-content;
        border-radius: 20px;
    }
    .card-holder_img img{
        transition: none;
    }

    .normal .card-holder_img img:hover{
        transform: none;
    }
    .media-card-holder_date{
        margin: 10px 0 10px 0;
    }
}
</style>