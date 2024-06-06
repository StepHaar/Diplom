<template>
    <div class="card-goals-wrapper">
        <div class="card-goals" v-if="image == ''">
            <h4 class="card-goals-title">{{ title }}</h4>
            <p v-html="content" class="card-goals-text"></p>
        </div>
        <div class="card-goals" style="padding: 0" v-else>
            <div class="card-goals-img gradient img-gradient">
                <BaseImageWrapper v-if="image != ''" :src="image" class="element-img"/>
                <div class="title-element">
                    <h4 class="card-goals-title">{{ title }}</h4>
                    <p v-html="content" class="card-goals-text"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    image: String,
    title: String,
    content: String,
})
</script>

<style>

.card-goals{
    background-color: var(--text);
    padding: 40px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: space-between;
    border-radius: 20px;
    height: 100%;
    transition: all .8s ease;
}

.normal .card-goals:hover {
    opacity: 0.9;
}

.card-goals-title{
    font-size: var(--h4);
    line-height: var(--h4_lh);
    color: var(--bg);
    font-weight: 700;
    margin: 0;
    font-family: 'Montserrat-Light';
}

.card-goals-text{
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    color: var(--bg);
    font-weight: 400;
    margin: 0;
    font-family: 'Montserrat-Light';
}

.card-goals-img{
    height: 100%;
    /* width: 100%; */
    /* padding: 40px; */
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    gap: 20px;
    border-radius: 20px;
    background-size: cover !important;
    background-position: center center !important;
    transition: all .8s ease;
}

.card-goals-wrapper:nth-child(1){
    grid-row: span 2;
    grid-column: span 2;
}

.card-goals-wrapper:nth-child(2){
    grid-column: span 2;
}

.app-wrapper.dark .card-goals-wrapper:nth-child(1) .card-goals-title,
.app-wrapper.dark .card-goals-wrapper:nth-child(1) .card-goals-text{
    color: var(--text);
}

@media screen and (max-width: 1200px){
    .goals-objectives__title{
        display: flex !important;
        flex-direction: column;
    }
    .card-goals-img{
        background: none !important;
        background-color: var(--bg) !important;
        padding: 0px !important;
        border-radius: 0 !important;
    }
    .card-goals{
        background-color: var(--bg);
        padding: 0px !important;
    }
    .card-goals-text{
        color: var(--text) !important;
    }
    .card-goals-title{
        color: var(--text) !important;
    }
    .card-goals-img .image-wrapper{
        display: none;
    }
    .title-element{
        position: static !important;
        padding: 0 !important;
    }
    .img-gradient::before {
        display: none;
    }
    
}

</style>