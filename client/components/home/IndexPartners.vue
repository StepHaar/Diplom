<template>
    <section id="index-partners">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.title" class="index-partners__title"/>
            <p class="index-partners__subtitle" v-html="data?.content"></p>
            <home-list-partners />
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    data: null,
})

</script>

<style>
#index-partners{
    position: relative;
    z-index: 3;
    background-color: var(--lock);
    color: var(--text);
}

.app-wrapper.blue #index-partners {
    background-color: var(--text)
}

.app-wrapper.blue #index-partners .index-partners__title .darks,
.app-wrapper.blue #index-partners .index-partners__subtitle{
    color: var(--bg);
}

#index-partners .wrapper-padding{
    padding-bottom: 20px !important;
}

.index-partners__cards-card-img img{
    object-fit: cover;
    border-radius: 0px;
}

.index-partners__title .title__bold{
    color: var(--text);
    margin: 0 0 15px 0;
}

.index-partners__subtitle{
    width: 25%;
    margin: -5px 0 0 0 ;
    font-size: var(--text_size);
}

/* .index-partners__more{
    width: calc(20% - 20px);
    height: 72px;
    font-size: var(--h4);
    font-weight: 700;
    border-radius: 50px;
    border: 1px solid var(--text);
    display: block;
    margin: 20px auto 0 auto;
    background-color: var(--lock);
    color: var(--text);
} */

/* .index-partners__cards{
    width: 100%;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    margin-top: 40px;
    align-content: center;
} */

@media screen and (max-width: 1600px) {
    .index-partners__cards{
    grid-template-columns: repeat(3, 1fr)
    }
    .index-partners__subtitle{
        width: 50%;
    }
}

@media screen and (max-width: 1200px) {
    .index-partners__cards-card-img img{
        padding: .3em 0;
    }

    .index-partners__title .title__bold{
        margin: 0 0 20px 0;
    }


    .index-partners__cards{
        gap: 10px;
        margin-top: 20px;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: auto;
    }

    .index-partners__more{
        width: 100%;
    }

    .index-partners__subtitle{
        font-size: var(--text_size);
        width: 100%;
    }
}

@media screen and (max-width: 360px) {
    .index-partners__cards{
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: auto;
    }
}

</style>