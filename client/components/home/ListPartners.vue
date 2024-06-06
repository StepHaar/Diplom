<template>
    <div>
        <div class="index-partners__cards">
            <UIPartnerCard :item="item" v-for="(item, index) in (hasMoreImages ? allImages.slice(0, loadedImages) : allImages)" :key="index"/>
        </div>
        <!-- <button class="index-partners__more" v-if="hasMoreImages" @click="loadAdditionalImages">Загрузить еще</button> -->
        <UIButtonMore InnerText="Загрузить еще" BgColor="var(--lock)" v-if="hasMoreImages" @click="loadAdditionalImages"/>
    </div>
</template>

<script>
import axios from 'axios'

export default{
    data() {
        return {
            loadedImages: 10,
            allImages: [],
            hasMoreImages: false
        };
    },
    mounted() {
        this.loadMoreImages();
    },
    methods: {
        loadMoreImages() {
            axios.get('http://stud.shubizle11.beget.tech/v1/methods/partners_cards')
            .then(response => {
                this.allImages = response.data.cards;
                this.hasMoreImages = this.allImages.length > this.loadedImages;
            })
            .catch(error => {
                console.error(error);
            });
        },
        loadAdditionalImages() {
            this.loadedImages += 5;
            if (this.loadedImages >= this.allImages.length) {
                this.hasMoreImages = false;
            }
        }
    }
}



</script>

<style>
.app-wrapper.dark #index-partners .buttonMore{
    border: 1px solid var(--bg);
    color: var(--bg);
}

.app-wrapper.dark #index-partners .title__bold{
    color: var(--bg);
}

.app-wrapper.dark #index-partners .index-partners__subtitle{
    color: var(--bg);
}

#index-partners{
    position: relative;
    z-index: 3;
    background-color: var(--lock);
    color: var(--text);
}

#index-partners .wrapper-padding{
    padding-bottom: 20px !important;
}

.index-partners__title .title__bold{
    color: var(--text);
}

.index-partners__subtitle{
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

.index-partners__cards{
    width: 100%;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    margin-top: 40px;
    align-content: center;
}

@media screen and (max-width: 1600px) {
    .index-partners__cards{
    grid-template-columns: repeat(3, 1fr)
    }
}

@media screen and (max-width: 1200px) {
    .index-partners__cards{
        grid-template-columns: repeat(2, 1fr)
    }

    .index-partners__more{
        width: 100%;
    }

    .index-partners__subtitle{
        font-size: var(--text_size);
    }
}

</style>