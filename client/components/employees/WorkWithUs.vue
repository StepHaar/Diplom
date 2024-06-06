<template>
    <section id="work-with-us">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.job.title" :sub_title="data?.job.subtitle" type="light"/>
            <div class="work-with-us__wrapper">
                <UICard class="work-with-us__wrapper-element" v-for="item in data?.job?.cards" :title=item?.title :text=item?.content type="white-between"/>
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
.app-wrapper.blue #work-with-us{
    background-color: var(--bg);
}
.app-wrapper.blue #work-with-us .title__bold{
    color: var(--text);
}
.app-wrapper.blue #work-with-us .work-with-us__wrapper-element{
    background-color: var(--text);
    color: var(--bg);
}
.app-wrapper.blue #work-with-us .work-with-us__wrapper-element svg{
    fill:var(--lock);
}

#work-with-us{
    background-color: var(--text);
    position: relative;
    z-index: 2;
}

.work-with-us__wrapper{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    grid-template-rows: auto;
}

.work-with-us__wrapper-element:first-child{
    grid-column: span 2;
}

.work-with-us__wrapper-element:nth-child(2){
    grid-row: span 2;
    word-break: break-word; 
}

@media screen and (max-width: 1200px) {
    .work-with-us__wrapper{
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 10px;
    }
    .work-with-us__wrapper-element:first-child{
        grid-column: span 1;
    }

    .work-with-us__wrapper-element:nth-child(2){
        grid-row: span 1;
    }

}
</style>