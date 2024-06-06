<template>
    <div class="memo first-memo">
        <UIMemoCard :item="item" v-for="(item, index) in (hasMoreImages ? allImages.slice(0, loadedImages) : allImages)" :key="index"/>  
    </div>
    <UIButtonMore InnerText="Загрузить еще" BgColor="var(--lock)" v-if="hasMoreImages" @click="loadAdditionalImages"/>
</template>

<script>
import axios from 'axios'

export default{
    data() {
        return {
            loadedImages: 8,
            loadedCards: 4,
            allImages: [],
            hasMoreImages: false
        };
    },
    mounted() {
        this.loadMoreImages();
    },
    methods: {
        loadMoreImages() {
            axios.get('http://stud.shubizle11.beget.tech/v1/methods/memo_cards')
            .then(response => {
                this.allImages = response.data.cards;
                this.hasMoreImages = this.allImages.length > this.loadedImages;
            })
            .catch(error => {
                console.error(error);
            });
        },
        loadAdditionalImages() {
            this.loadedImages += 4;
            if (this.loadedImages >= this.allImages.length) {
                this.hasMoreImages = false;
            }
        }
    }
}
</script>

<style scoped>
.mobile-memo {
    display: none;
}

@media screen and (max-width:1200px) {
    .mobile-memo {
        display: flex;
        flex-direction: column;
    }
}
</style>