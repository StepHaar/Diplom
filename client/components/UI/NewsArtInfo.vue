<template>
    <section id="news__cur__info-block">
        <div class="container wrapper-padding">
            <div class="news__cur__info-block">
                <div class="news__cur__info">
                    <h5 class="news__cur__info-date">{{ data?.date }}</h5>
                    <p class="news__cur__info-content" v-html="data?.content"></p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

const props = defineProps({
    data: null,
})

</script>

<style>
.app-wrapper.blue #news__cur__info-block {
    background-color: var(--text) !important;
}

.news__cur__info-content h5{
    font-size: var(--text_size);
    font-weight: 400;
    margin: 0 0 10px 0;
}

.news__cur__info-content p{
    font-size: var(--text_size);
    font-weight: 400;
    margin: 0 0 20px 0;
}

.news__cur__info-content p:last-of-type{
    margin: 0;
}

#news__cur__info-block{
    position: relative;
    background-color: var(--lock);
    z-index: 1;
}

.news__cur__info-block{
    background-color: var(--bg);
    border-radius: 20px;
    padding: 40px;
    display: grid;
    grid-template-columns: 3fr 1fr;
}

.news__cur__info{
    grid-column: 1;
    display: flex;
    flex-direction: column;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
}

.news__cur__info-date{
    color: var(--lock-text);
    margin-bottom: 20px;
    font-weight: 400;
}

.news__cur__info-content{
    color: var(--text);
    font-weight: 400;
}

@media screen and (max-width: 1200px){
    .app-wrapper.blue .news__cur__info-block{
        background-color: var(--text);
    }

    .app-wrapper.blue .news__cur__info-content{
        color: var(--lock);
    }

    .app-wrapper.monochrome .news__cur__info-date{
        color: var(--accent);
    }

    .news__cur__info-block {
        background-color: var(--lock);
        border-radius: 0px;
    }

    .news__cur__info-block{
        display: block;
        padding: 0;
    }

    .app-wrapper.dark .news__cur__info-content{
        color: var(--bg);
    }

}
</style>