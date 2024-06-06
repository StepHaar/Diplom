<template>
    <n-collapse :accordion="accordion" class="collapse">
        <template #arrow>
            <div></div>
        </template>
        <template #header-extra>
            <button class="collapse-btn">
                <ph-plus :size="16" weight="light" class="collapse-btn-plus"/>
                <ph-minus :size="16" weight="light" class="collapse-btn-minus" />
            </button>
        </template>
        <!-- <n-collapse-item v-for="(item, index) in data" :title="item?.title" :name="index+1" :on-item-header-click="open(index)">

        </n-collapse-item> -->
        <n-collapse-item  v-for="(item, index) in data" :title="item?.title" :name="index+1" :on-item-header-click="open(index)">
            <div class="collapse-element" v-for="element in item?.li">
                <ph-dot :size="16" weight="light" class="collapse-element__dot" />
                {{ element?.ul }}
            </div>
        </n-collapse-item>
    </n-collapse>
</template>

<script setup>

import {
    NCollapse,
    NCollapseItem,
} from "naive-ui";
import { PhPlus, PhMinus,PhDot } from '@phosphor-icons/vue';

const props = defineProps({
    data: Array,
    accordion: Boolean,
})

function open(index){
    console.log(index);
}

// console.log(props?.data?.li);

</script>

<style>


.app-wrapper.dark .collapse .n-collapse-item .n-collapse-item__content-wrapper .n-collapse-item__content-inner{
    border-top: 1px solid var(--lock-text);
}

.collapse .n-collapse-item__content-wrapper{
    transition: .6s !important;
}

.collapse{
    border: none;
}

.collapse .n-collapse-item__header{
    gap: 20px;
}

.collapse .n-collapse-item__header--active .n-collapse-item__header-main{
    color: var(--accent) !important;
}

.collapse .n-collapse-item__header--active .collapse-btn-plus{
    opacity: 0;
}

.collapse-element{
    margin-bottom: 20px;
    position: relative;
}

.collapse-element:last-child{
    margin-bottom: 0;
}

.collapse-element__dot{
    position: absolute;
    left: -20px;
    top: 4px;
    color: var(--text);
}

.collapse .n-collapse-item{
    background-color: var(--bg);
    border-radius: 20px;
    /* border: none !important; */
    margin-left: 0;
    margin-right: 0;
}

.collapse .n-collapse-item:first-child > .n-collapse-item__header{
    padding-top: 40px;
}

.collapse .n-collapse-item .n-collapse-item__content-wrapper .n-collapse-item__content-inner {
    padding: 40px 0 40px 15px;
    margin: 0 40px 0 40px;
    border-top: 1px solid var(--lock);
}

.collapse-btn-plus {
    color: var(--accent);
    position: absolute;
    transition: all .2s ease;
}

.collapse-btn-minus {
    color: var(--accent);
    position: absolute;
}

.collapse-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    border: 0;
    background-color: var(--lock);
    cursor: pointer;
    position: relative;
    transition: all .3s ease;
}

.normal .collapse-btn:hover {
    background-color: var(--accent);
    color: var(--bg);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.normal .collapse-btn:hover .collapse-btn-plus{
    color: var(--bg);
}

.normal .collapse-btn:hover .collapse-btn-minus{
    color: var(--bg);
}

.collapse-btn:active {
    transform: scale(0.95);
    transform-origin: center;
    background-color: var(--lock);
}

@media screen and (max-width: 1200px) {
    .collapse-element{
        margin-bottom: 10px;
    }
    .collapse .n-collapse-item:first-child > .n-collapse-item__header {
        padding-top: 20px;
    }
    
    .n-collapse-item__header{
        padding: 20px;
    }

    .collapse .n-collapse-item .n-collapse-item__content-wrapper .n-collapse-item__content-inner {
        padding: 20px 0 20px 15px;
        margin: 0 20px 0 20px;
        border-top: 1px solid var(--lock);
    }
    .collapse .n-collapse-item .n-collapse-item__header {
        padding: 20px;
    }
    .n-collapse .n-collapse-item {
        margin: 10px 0;
    }

}
</style>