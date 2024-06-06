<!-- <template>
    <div class="news desktop">
        <div class="news-card">
            <ui-newscard/>
        </div>
        <div class="news-card-drop" :class="drop ? 'drop' : ''">
            <div class="news-card first-news">
                <div class="news-card-holder" v-for="(item, index) in data?.card.slice(6)" :key="index + 6">
                    <div class="news-card-holder-img">
                        <a target="_blank" :href="item?.link">
                            <BaseImageWrapper :src="item?.img" class="news-card-holder-img" />
                        </a>
                    </div>
                    <div class="card-holder-content">
                        <p class="news-card-holder-date">{{ item?.date }}</p>
                        <a class="news-card-holder-text" target="_blank" :href="item?.link">{{ item?.title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news mobile">
        <div class="news-card">
            <div class="news-card-holder" v-for="(item, index) in data?.card.slice(0,3)" :key="index">
                <div class="news-card-holder-img">
                    <a target="_blank" :href="item?.link">
                        <BaseImageWrapper :src="item?.img" class="news-card-holder-img-picture" />
                    </a>
                </div>
                <div class="card-holder-content">
                    <p class="news-card-holder-date">{{ item?.date }}</p>
                    <a class="news-card-holder-text" target="_blank" :href="item?.link">{{ item?.title }}</a>
                </div>
            </div>
        </div>
        <div class="news-card-drop" :class="drop ? 'drop' : ''">
            <div class="news-card first-news">
                <div class="news-card-holder"  v-for="(item, index) in data?.card.slice(3)" :key="index + 3">
                    <div class="news-card-holder-img">
                        <a target="_blank" :href="item?.link">
                            <BaseImageWrapper :src="item?.img" class="news-card-holder-img" />
                        </a>
                    </div>
                    <div class="card-holder-content">
                        <p class="news-card-holder-date">{{ item?.date }}</p>
                        <a class="news-card-holder-text" target="_blank" :href="item?.link">{{ item?.title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="more-btn" v-if="data?.card.length > 6" :class="drop ? 'drop' : ''" @click="dropList">Загрузить ещё</div>
</template>

<script setup>
const props = defineProps({
    data: null,
})

const drop = ref(false);

function dropList() {
    drop.value = true;
}
</script>

<style scoped>
#news {
    position: relative;
    z-index: 5;
}


.card-holder-content{
    display: flex;
    flex-direction: column;
}


.news-card-drop{
    display: grid;
    grid-template-rows: 0fr;
    overflow: hidden;
    transition: 0.8s 
}

.news-card-drop.drop {
    grid-template-rows: 1fr;
    margin-top: 60px;
}

.news-card-drop .news-card {
    min-height: 0px;
}

.news-card-drop .news-card{
    margin: 0;
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
}

.more-btn.drop {
    opacity: 0;
    display: none;
    height: 0px;
    pointer-events: none;
}

.news.mobile {
    display: none;
}

@media screen and (max-width: 1600px)  {
    .news-card {
        grid-template-columns: repeat(2, 1fr);
    }
    
}

@media screen and (max-width: 1200px)  {
    .news-card {
        grid-template-columns: repeat(1, 1fr);
        gap: 40px 0px; 
    } 

    .news-card-drop {
        gap: 40px 0;
    } 

    .news-card-drop .news-card {
        grid-template-columns: repeat(1, 1fr);
        gap: 40px 0;
    }
    .news-card-drop.drop {
        margin-top: 40px;
    }
    .more-btn {
        margin-top: 40px;
        width: 100%;
    }

    
    .news.desktop {
        display: none;
    }
    
    .news.mobile {
        display: block;
    }

    .news-card-holder-text{
        line-height: var(--h4_lh) !important;
    }
    .news-card-holder-img{
        height: max-content;
    }
}

</style> -->