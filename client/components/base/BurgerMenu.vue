<template>
    <div style="min-height: 0; overflow: hidden;">
        <div class="burger-menu__wrapper">
            <n-collapse arrow-placement="right" class="burger-menu__collapse">
                <template #arrow>
                    <n-icon>
                        <ph-caret-right :size="18"/>
                    </n-icon>
                </template>
                <n-collapse-item class="burger-menu__collapse-item" v-for="column in data?.footer.menu" :title="column.label">
                    <nuxt-link :to="subitem?.link" v-for="subitem in column?.children">{{ subitem?.label }}</nuxt-link>
                </n-collapse-item>
            </n-collapse>
        </div>
    </div>
</template>
<script setup>
import {NCollapse, NCollapseItem, NIcon} from "naive-ui";
import {PhCaretRight} from "@phosphor-icons/vue";
const props = defineProps({
    data: null,
})
</script>

<style>
.burger-menu__collapse-item .n-collapse-item__content-inner{
    display: flex;
    flex-direction: column;
}
.burger-menu__collapse-item{
    margin: 0 !important;
}
.burger-menu__collapse-item .n-collapse-item__header{
    padding: 0 !important;
}
.burger-menu__collapse-item .n-collapse-item__header-main{
    justify-content: space-between;
}
.burger-menu__wrapper{
    margin: 20px 0;
}
.burger-menu__collapse-item .n-collapse-item__content-inner{
    padding-top: 0px !important;
}
.burger-menu__collapse-item .n-collapse-item__header-main{
    padding: 11px 0;
    font-size: var(--text_size);
    line-height: var(--text_size_lh)
}
.burger-menu__collapse-item .n-collapse-item__content-inner a{
    padding: 10px 0;
    font-size: var(--text_size);
    line-height: var(--text_size_lh)
}
.burger-menu__collapse-item .n-collapse-item-arrow{
    transform: rotate(90deg);
}

.n-collapse .n-collapse-item.n-collapse-item--active .n-collapse-item__header.n-collapse-item__header--active .n-collapse-item-arrow{
    transform: rotate(-90deg);
}
.n-collapse .n-collapse-item .n-collapse-item__header .n-collapse-item-arrow{
    color: var(--text);
}

.n-collapse .n-collapse-item:not(:first-child){
    /* border-top: 1px solid var(--lock-text); */
    border-top: none;
}

@media screen and (max-width: 1200px) {
    .normal .burger-menu__collapse-item:hover a{
        color: var(--text);
    }
}
</style>