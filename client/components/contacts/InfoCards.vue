<template>
    <div class="cont-info-block">
        <div class="cont-info-card" v-for="item in data">
            <div class="card-title">
                {{ item?.title }}
            </div>
            <a class="card-subtitle" :href="item?.url" target="_blank">
                {{ item?.subtitle }}
            </a>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    data: null,
});
</script>

<style scoped>
.app-wrapper.dark .cont-info-card .card-title,
.app-wrapper.dark .cont-info-card .card-subtitle{
    color: var(--accent);
}

.app-wrapper.blue .cont-info-card{
    background-color: var(--text);
}
.app-wrapper.blue .cont-info-card .card-title,
.app-wrapper.blue .cont-info-card .card-subtitle{
    color: var(--bg);
}


.cont-info-block {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.cont-info-card {
    display: flex;
    flex-direction: column;
    padding: 40px;
    gap: 20px;
    width: 100%;
    background-color: var(--bg);
    color: var(--text);
    border-radius: 20px;
    transition: all .8s ease;
}

.normal .cont-info-card:hover {
    opacity: 0.9;
}

.normal .cont-info-card:hover .card-title,
.normal .cont-info-card:hover .card-title {
    color:  var(--text);
}

.normal .cont-info-card:hover .card-subtitle, 
.normal .cont-info-card:hover .card-subtitle {
    color: var(--accent);
    text-decoration: underline;
}

.card-title {
    width: 100%;
    font-style: normal;
    font-weight: 400;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    color: var(--lock-text);
    transition: all .8s ease;
}

.app-wrapper.blue .card-title{
    color: var(--text);
}


.card-subtitle {
    width: 100%;
    font-style: normal;
    font-weight: 700;
    font-size: var(--h5);
    line-height: var(--h5_lh);
    letter-spacing: 0.045em;
    color: var(--text);
    transition: all .8s ease;
}

@media screen and (min-width: 1200px) and (max-width: 1600px) {
    
    .cont-info-card {
        gap: 10px;
        padding: 20px;
    }
    /* .normal .cont-info-card:hover .card-subtitle, 
    .normal .cont-info-card:hover .card-subtitle a {
        color: var(--text);
        text-decoration: none;
        transition: none;
    } */
}

@media screen and (max-width: 1200px) {
    .card-title{
        margin: 0;
    }
    .cont-info-block {
        grid-template-columns: repeat(1,1fr);
        gap: 10px;
    }
    .cont-info-card {
        gap: 10px;
        padding: 20px;
    }
    .normal .cont-info-card:hover .card-subtitle, 
    .normal .cont-info-card:hover .card-subtitle a {
        color: var(--text);
        text-decoration: none;
        transition: none;
    }
}
</style>
