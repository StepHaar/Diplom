<template>
    <section id="media">
        <div class="container wrapper-padding cards">
            <media-card :item="item" v-for="item in data?.card"/>
        </div>
    </section>
</template>


<script setup>

const props = defineProps({ 
    data: null,
    item: null,
})
</script>

<style>
.app-wrapper.blue #media{
    background-color: var(--text);
}
.app-wrapper.blue #media .media-card-holder_text{
    color: var(--bg);
}
.app-wrapper.blue #media .card-holder-img{
    background: var(--bg);
}

#media {
    background-color: var(--bg);
    position: relative;
    z-index: 2;
}

.cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(1, 1fr);
    gap: 60px 20px;
}

@media screen and (max-width: 1200px) {
    .cards{
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (max-width: 600px) {
    .cards{
        grid-template-columns: 1fr;
    }
}
</style>
