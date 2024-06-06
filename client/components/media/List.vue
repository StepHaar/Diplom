<template>
    <section id="news">
        <div class="container wrapper-padding">
            <div class="cards">
                <UI-Mediacard :item="item" v-for="(item, index) in allImages" :key="index"/>
            </div>
            <UIButtonMore InnerText="Загрузить еще" BgColor="var(--bg)" v-if="hasMoreImages" @click="loadAdditionalImages"/>
        </div>
        <!-- <button v-if="hasMoreImages" class="more-btn" @click="loadAdditionalImages">Загрузить ещё</button> -->
    </section>
</template>


<script>
import axios from 'axios'

export default {
    data() {
        return {
            allImages: [],
            hasMoreImages: false,
            news_count: 6,
            page_count: 1,
        };
    },
    mounted() {
        this.loadMoreImages();
    },

    methods: {
    loadMoreImages() {
        axios.get('http://stud.shubizle11.beget.tech/v1/methods/media_request', {
        params: {
            news: this.news_count,
            page: this.page_count
        }
        })
        .then(response => {
            this.allImages = response.data.news;
            this.hasMoreImages = response.data.count_items > this.news_count;
        })
        .catch(error => {
            console.error(error);
        });
    },
    loadAdditionalImages() {
        this.news_count += 6;
        if (this.news_count >= this.allImages.length) {
            this.hasMoreImages = true;
        };
        axios.get('http://stud.shubizle11.beget.tech/v1/methods/media_request', {
        params: {
            news: this.news_count,
            page: this.page_count
        }
        })
        .then(response => {
            this.allImages = response.data.news;
            this.hasMoreImages = response.data.count_items > this.news_count;
        })
        .catch(error => {
            console.error(error);
        });
    },
    }
}

</script>

<style>
.app-wrapper.dark .buttonMore{
    border: 1px solid var(--accent);
    color: var(--accent);
}

.app-wrapper.blue #news,
.app-wrapper.blue #news .buttonMore{
    background-color: var(--text) !important;
    color: var(--bg);
}
.app-wrapper.blue #news .buttonMore{
    border: 1px solid var(--bg);
}
.app-wrapper.blue #news .news-card-holder-date,
.app-wrapper.blue #news .news-card-holder-text{
    color: var(--bg);
}

#news{
    position: relative;
    background-color: var(--bg);
    z-index: 1;
}
.cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(1, 1fr) !important;
    gap: 60px 20px;
}
.more-btn {
    width: calc(33% - 20px);
    height: 72px;
    font-size: var(--h4);
    font-weight: 700;
    border-radius: 50px;
    border: 1px solid var(--text);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px auto 0 auto;
    background-color: var(--bg);
    color: var(--text);
    margin-bottom: 50px;
}
@media screen and (max-width: 1200px){
    .cards{
        grid-template-columns: repeat(1, 1fr) !important;
        gap: 40px 0px !important;
    }

}
</style>
