<template>
    <div class="index-partners__cards-card">
        <div class="index-partners__cards-card-img" v-show="item?.img" :class="image ? '':''">
            <BaseImageWrapper class="index-partners__cards-card-img" img_class="img" :src="item?.img" />
        </div>
        <p class="index-partners__cards-card-text">{{ item?.name }}</p>
    </div>
</template>

<script setup>
const image = useCookie("image");
const props = defineProps({
    item: null,
})
</script>

<style scoped>
.index-partners__cards-card{
    background-color: var(--bg);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    height: 200px;
}
.index-partners__cards-card-img.hide-partner{
    display: none;
}
.index-partners__cards-card-text{
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
    border-radius: 0 !important;
}

.index-partners__cards-card-img img{
    max-width: 100%;
    height: 50px;
    border-radius: 0px;
}

@media screen and (max-width: 1200px) {
    .index-partners__cards-card{
    min-width: 150px;
    }

    .index-partners__cards-card-text{
        font-size: var(--text_size_min);
        /* word-break: break-all; */
    }
    .index-partners__cards-card{
        height: auto;
    }
}
</style>