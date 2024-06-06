<template>
    <section id="work">
        <div class="container wrapper-padding">
            <base-title-content :title="props?.data?.process.title" :sub_title="props?.data?.process.subtitle" type="light"/>
            <div class="work__cards">
                <div class="work__cards-row-element" v-for="item in props?.data?.process?.card">
                    <h4 class="work__cards-row-element-title">{{ item.title }}</h4>
                    <p class="work__cards-row-element-text">{{ item.description }}</p>
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
#work .title__bold{
    margin: 0 0 20px 0;
}

.app-wrapper.blue #work{
    background-color: var(--bg);
}
.app-wrapper.blue #work .title__bold{
    color: var(--text);
}
.app-wrapper.blue #work .work__cards-row-element{
    background-color: var(--text);
}
.app-wrapper.blue #work .work__cards-row-element-title,
.app-wrapper.blue #work .work__cards-row-element-text{
    color: var(--bg);
}

.work__cards-row-element{
    width: 100%;
    padding: 40px;
    height: 100%;
    background-color: var(--bg);
    border-radius: 20px;
    grid-column: span 5;
    transition: all .8s ease;
    word-break: break-word;
}

.normal .work__cards-row-element:hover {
    opacity: 0.9;
}

.work__cards-row-element:nth-child(1), 
.work__cards-row-element:nth-child(5){
    grid-column: span 7;
}

.work__cards-row-element:nth-child(2), 
.work__cards-row-element:nth-child(6){
    grid-column: span 8;
}

.work__cards-row-element-title{
    font-size: var(--h4);
    line-height: var(--h4_lh);
    font-weight: 700;
    margin: 0;
    color: var(--text);
    margin-bottom: 20px;
}

.work__cards-row-element-text{
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 400;
    line-height: 24px;
    margin: 0;
    color: var(--text);
}

#work{
    position: relative;
    background-color: var(--text);
    z-index: 2;
}

.work__cards{
    display: grid;
    grid-template-columns: repeat(20, 1fr);
    gap: 20px;
}

@media screen and (max-width: 1200px) {
    #work .title__bold{
        margin: 0 0 10px 0;
    }
    .app-wrapper.blue #work .title__bold{
        color: var(--text);
    }
    .app-wrapper.blue #work .work__cards-row-element{
        background-color: var(--bg);
    }
    .app-wrapper.blue #work .work__cards-row-element-title,
    .app-wrapper.blue #work .work__cards-row-element-text{
        color: var(--text);
    }
    .work__cards{
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 0px;
        grid-column: span 1;
    }
    .work__cards-row-element:nth-child(1), 
    .work__cards-row-element:nth-child(5){
        grid-column: span 5;
    }

    .work__cards-row-element:nth-child(2), 
    .work__cards-row-element:nth-child(6){
        grid-column: span 5;
    }
    .work__cards-row-element{
        padding: 10px 0;
        background-color: var(--text);
        color: var(--bg)
    }
    .work__cards-row-element-title {
        margin-bottom: 10px;
        color:var(--bg)
    }
    .work__cards-row-element-text{
        color:var(--bg)
    }
}
</style>