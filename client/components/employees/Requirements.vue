<template>
    <section id="requirements">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.demand?.title" :sub_title="data?.demand?.subtitle" color="--text"/>
            <u-i-collapse :data="data?.demand?.card"/>
        </div>
    </section>
</template>

<script setup>

const props = defineProps({
    data: null,
})

</script>

<style>
.app-wrapper.dark #requirements .collapse-btn{
    border-radius: 20px !important;
    background-color: var(--lock-text) !important;
}

.app-wrapper.dark #requirements .title__bold,
.app-wrapper.dark #requirements .title__slim{
    color: var(--bg);
}

.app-wrapper.blue #requirements .n-collapse-item__content-wrapper{
    border-radius: 0 0 20px 20px;
}

.app-wrapper.blue #requirements{
    background-color: var(--text);
}



.app-wrapper.blue #requirements .collapse-btn{
    border-radius: 20px !important;
    background-color: var(--lock-text) !important;
}

.app-wrapper.blue #requirements .n-collapse-item__content-wrapper{
    background-color: var(--bg);
}
/* 
.app-wrapper.blue #requirements .n-collapse-item__header{
    border: 1px solid var(--bg);
    border-radius: 20px 20px 0 0;
    background-color: var(--bg);
} */
.app-wrapper.blue #requirements .n-collapse-item__header,
.app-wrapper.blue #requirements .collapse-btn{
    /* border: 1px solid var(--bg); */
    /* border-radius: 20px 20px 0 0; */
    background-color: var(--bg);
}

.app-wrapper.blue #requirements .n-collapse-item__header--active{
    border-radius: 20px 20px 0 0 !important;
}

.app-wrapper.blue #requirements .n-collapse-item__header{
    border-radius: 20px;
}

.app-wrapper.blue #requirements .collapse-btn svg,
.app-wrapper.blue #requirements .collapse-element svg{
    fill: var(--accent);
}

.app-wrapper.blue #requirements .n-collapse-item__header-main{
    color: var(--lock-text);
}

.app-wrapper.blue .collapse .n-collapse-item__header--active .n-collapse-item__header-main{
    color: var(--text) !important;
}

.app-wrapper.blue #requirements .title__bold,
.app-wrapper.blue #requirements .title__slim{
    color: var(--bg);
}

.app-wrapper.blue #requirements .collapse-element{
    color: var(--text);
}

#requirements {
    background-color: var(--lock);
    position: relative;
    z-index: 2;
}

#requirements .wrapper-padding{
    padding-bottom: 10px !important;
}

#requirements .title__bold{
    color: var(--text);
}

#requirements .title__slim{
    color: var(--text);

}

</style>