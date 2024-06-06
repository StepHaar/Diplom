<template>
    <section id="documents">
        <div class="container wrapper-padding">
            <u-i-collapse :data="props?.data?.documents.card" accordion/>
        </div>
    </section>
</template>

<script setup>

const props = defineProps({
    data: null,
})

</script>

<style>
/* .app-wrapper.blue #documents,
.app-wrapper.blue #documents .n-collapse-item__header,
.app-wrapper.blue #documents .collapse-btn,
.app-wrapper.blue #documents .n-collapse-item-arrow,
.app-wrapper.blue #documents .n-collapse-item__content-inner,
.app-wrapper.blue #documents .n-collapse-item__content-wrapper,
.app-wrapper.blue #documents .n-collapse-item__header--active,
.app-wrapper.blue #documents .n-collapse-item--trigger-area-extra{
    background-color: var(--text);
} */
/* .app-wrapper.blue #documents .n-collapse-item--trigger-area-extra{
    border: 1px solid var(--bg);
} */
/* .app-wrapper.blue #documents .n-collapse-item__header,
.app-wrapper.blue #documents .collapse-btn{
    border: 1px solid var(--bg);
    border-radius: 20px;
}
.app-wrapper.blue #documents .n-collapse-item__header-main,
.app-wrapper.blue #documents .n-collapse-item__content-inner{
    color: var(--bg);
}
.app-wrapper.blue #documents .collapse-btn svg,
.app-wrapper.blue #documents .n-collapse-item__content-inner svg{
    fill: var(--bg);
} */

.app-wrapper.dark #documents .collapse-btn{
    background-color: var(--lock-text) !important;
}

.app-wrapper.blue #documents .collapse-btn{
    background-color: var(--lock-text) !important;
}

.app-wrapper.dark .collapse-btn-plus,
.app-wrapper.dark .collapse-btn-minus{
    color: var(--bg);
}

.app-wrapper.blue #documents .n-collapse-item__content-wrapper{
    border-radius: 0 0 20px 20px;
}

.app-wrapper.blue #documents,
.app-wrapper.blue #documents .n-collapse-item__header,
.app-wrapper.blue #documents .collapse-btn,
.app-wrapper.blue #documents .n-collapse-item__header
{
    background-color: var(--text);
    
}
.app-wrapper.blue #documents .n-collapse-item--active,
.app-wrapper.blue #documents .n-collapse-item--trigger-area-arrow{
    background-color: var(--bg);
}

.app-wrapper.blue #documents .n-collapse-item__content-wrapper{
    background-color: var(--bg);
}


.app-wrapper.blue #documents .n-collapse-item__header{
    /* border: 1px solid var(--bg); */
    border-radius: 20px 20px 0 0;
    background-color: var(--bg);
}

/* .app-wrapper.blue #documents .n-collapse-item__header--active{
    border-radius: 20px 20px 0 0 !important;
} */

.app-wrapper.blue #documents .n-collapse-item__header{
    border-radius: 20px;
}

.app-wrapper.blue #documents .collapse-btn svg,
.app-wrapper.blue #documents .collapse-element svg{
    fill: var(--bg);
}

.app-wrapper.blue #documents .n-collapse-item__header-main{
    color: var(--lock-text);
}

.app-wrapper.blue .collapse .n-collapse-item__header--active .n-collapse-item__header-main{
    color: var(--text) !important;
}

.app-wrapper.blue #documents .title__bold,
.app-wrapper.blue #documents .title__slim{
    color: var(--bg);

}
.app-wrapper.blue #documents .collapse-element{
    color: var(--text);
}


#documents {
    background-color: var(--lock);
    position: relative;
    z-index: 2;
}
</style>