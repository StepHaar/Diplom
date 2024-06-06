<template>
    <section id="basic-information">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.info.title" :sub_title="data?.info.subtitle" type="light"/>
            <div class="basic-information__cards">
                <UIInfoCard :item="item" v-for="item in data?.info?.card"/>
            </div>
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
.app-wrapper.blue #basic-information{
    background-color: var(--bg);
}
.app-wrapper.blue #basic-information .title__bold,
.app-wrapper.blue #basic-information .title__slim{
    color: var(--text);
}
.app-wrapper.blue #basic-information .basic-information__cards-element{
    background-color: var(--text);
}
.app-wrapper.blue #basic-information .basic-information__cards-element-title,
.app-wrapper.blue #basic-information .basic-information__cards-element-info a{
    color: var(--bg);
}


#basic-information{
    position: relative;
    background-color: var(--text);
    z-index: 1;
}

#basic-information .title__bold{
    color:var(--bg);
}

#basic-information .title__slim{
    color:var(--bg);    
}

.basic-information__cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: auto;
    gap: 20px;
    color: var(--text)
}

@media screen and (max-width:1200px) {
    .basic-information__cards{
        grid-template-columns: repeat(1, 1fr);
    } 
}


</style>