<template>
    <div class="index-partners__cards-card" :key="index" v-if="!link">
        <BaseImageWrapper v-show="img" img_class="img" class="index-partners__cards-card-img" :src="img" />
        <p class="index-partners__cards-card-text" v-if="name">{{ name }}</p>
    </div>
    <a :href="link" v-else target="_blank">
        <div class="index-partners__cards-card" :key="index" >
            <BaseImageWrapper  v-show="img" img_class="img" class="index-partners__cards-card-img" :src="img" />
            <p class="index-partners__cards-card-text" v-if="name">{{ name }}</p>
        </div>
    </a>
</template>

<script setup>
const props = defineProps({
    index: Number,
    img: String,
    name: String,
    link: String,
})
</script>

<style>

.index-partners__cards-card{
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    height: 200px;
}


.index-partners__cards-card.no-img{
    display: flex;

}

.index-partners__cards-card-text{
    margin: 10px;
    text-align: center;
    /* font-size: var(--h5); */
    font-size: var(--text_size);
}

.index-partners__cards-card-img{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
    margin-bottom: 10px;
}

.index-partners__cards-card-img.no-img{
    height: 0px;
}

.index-partners__cards-card-img img{
    max-width: 100%;
    height: 50px;
    border-radius: 0px !important;
}

.index-partners__cards-card-img.non_image{
    height: 0;
}

.index-partners__cards-card-wrapper{
    display: grid;
    grid-template-rows: 0fr;
    overflow: hidden;
    transition: all .2s ease;
}

.index-partners__cards-card-wrapper.open{
    grid-template-rows: 1fr;
}
@media screen and (max-width: 1200px) {
    .index-partners__cards-card-img img{
        padding: .3em 0;
    }

    .index-partners__cards-card{
        min-width: 150px;
    }

    .index-partners__cards-card-text{
        font-size: var(--text_size);
        /* word-break: break-all; */
    }
}

@media screen and (max-width: 360px) {
    .index-partners__cards-card{
        width: calc(100vw - 40px);
        /* padding: 10px !important; */
        border-radius:20px !important;
    }
    .index-partners__cards-card-img{
        overflow: hidden;
        border-radius: 0 !important;
    }
}
</style>