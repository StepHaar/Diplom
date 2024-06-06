<template>
    <section id="goals-objectives">
        <div class="container wrapper-padding">
            <div class="goals-objectives__title">
                <base-title-content :sub_title="data?.goals.subtitle" color="--text"/>
                <base-title-content :title="data?.goals.title" color="--text"/>
            </div>
            <div class="goals-objectives__cards">
                <UICardGoals v-for="item in data?.goals.card" :image="item?.img" :title="item?.title" :content="item?.content"/>
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

.app-wrapper.dark #goals-objectives .title.darks{
    color: var(--text);
}

.app-wrapper.blue #goals-objectives .title.darks{
    color: var(--bg);
}

.app-wrapper.blue #goals-objectives{
    background-color: var(--text);
}
.app-wrapper.blue #goals-objectives .card-goals{
    background-color: var(--bg);
}
.app-wrapper.blue #goals-objectives .card-goals-title,
.app-wrapper.blue #goals-objectives .card-goals-text{
    color:var(--text);
}

.title-element{
    z-index: 4;
    padding:40px;
    position: absolute;
    bottom: 0;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.goals-objectives__cards-element img{
    border-radius: 20px;
}

#goals-objectives .image-wrapper{
    height: 100%;
}

#goals-objectives .wrapper-padding{
    padding: 100px 20px;
}

#goals-objectives .img-gradient{
  position: relative !important;
  border-radius: 25px;
  height: 100%;
  width: 100%;
  overflow: hidden
}

#goals-objectives .img-gradient::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 2;
  background: linear-gradient(181.12deg, rgba(30, 30, 30, 0) -8.44%, #2E2E2E 81.59%, #2E2E2E 105.65%) !important;
  border-radius: 25px;
  color:var(--bg);
}

#goals-objectives{
    background-color: var(--bg);
}

.card-goals-wrapper .card-goals{
    border-radius: 30px;
}

.goals-objectives__title{
    display: flex;
    gap: 10px;
}

.goals-objectives__title .title{
    grid-template-columns: 1fr;
}

.goals-objectives__cards{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 1fr;
    gap: 20px;
}

.title-element .goals-objectives__cards-element-title{
    margin-bottom: 20px;
}

@media screen and (max-width: 1200px){

    .goals-objectives__cards img {
        display: none;
    }
    .title-element{
        padding:0px;
        position: relative;
    }
    .goals-objectives__cards{
        display: flex;
        flex-direction: column;
        background-color: var(--loock);
    }
    .goals-objectives__title .title__bold{
        padding: 0px 0px !important;
        margin: 0px;
        flex-wrap: wrap;
    }
    .img-gradient::before {
       display: none;
    }
    .goals-objectives__title{
        display: flex;
        gap: 0;
        margin-bottom: 20px;
    }
    .title-element{
        gap: 10px;
    }
}

</style>