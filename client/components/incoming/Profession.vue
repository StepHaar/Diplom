<template>
    <section id="profession">
        <div class="container wrapper-padding">
            <base-title-content :title="data?.info.title" :sub_title="data?.info.subtitle" color="--text"/>
            <div class="profession__main">
                <div class="profession__main-image">
                    <base-image-wrapper img_class="img" :src="data?.info.img" alt="" class="profession-img"/>
                </div>
                <!-- <div class="profession__main-text"> -->
                    <p class="profession__main-text-item">{{ data?.info.description_1 }}</p>
                    <p class="profession__main-text-item">{{ data?.info.description_2 }}</p>
                <!-- </div> -->
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

.app-wrapper.dark #profession .title__bold,
.app-wrapper.dark #profession .title__slim,
.app-wrapper.dark #profession .profession__main-text-item{
    color: var(--bg);
}

.app-wrapper.blue #profession{
    background-color: var(--text);
}
.app-wrapper.blue #profession .title__bold,
.app-wrapper.blue #profession .title__slim,
.app-wrapper.blue #profession .profession__main-text-item{
    color: var(--bg);
}

#profession{
    position: relative;
    background-color: var(--lock);
    z-index: 1;
}

#profession .title__bold{
    color: var(--text);
}

#profession .title__slim{
    color: var(--text);
}

.profession__main{
    display: grid;
    grid-template-columns: 3fr 2fr;
    grid-template-rows: 1fr;
    gap: 20px;
    align-items: end;
}

.profession__main-image{
    grid-row: 1 / span 2;
    max-height: 542px;
    max-width: 1030px;
    height: 100%;
}

.profession__main-image img{
    object-fit: cover;
    max-height: 542px;
    max-width: 1030px;
    width: 100%;
    height: 100%;
    border-radius: 20px;
}

.profession__main-text{
    max-width: 730px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 100%;
    gap: 20px;
}

.profession-img{ 
    border-radius: 20px;
    height: 100%;
}

.profession__main-text-item{
    grid-column: 2;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    color: var(--text);
}

@media screen and (max-width: 1200px) {
    .profession__main{
        grid-template-columns: 1fr;
        grid-template-rows: 3fr;
        gap: 10px;
    }
    
    .profession__main-image{
        grid-column: 1;
        grid-row: 2;
    }

    .profession__main-image img {
        object-fit: fill;
    }

    .profession__main-text-item{
        grid-column: 1;
    }

}
</style>