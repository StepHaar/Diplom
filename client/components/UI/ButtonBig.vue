<template>
    <button class="button-big" @click="href(props?.link)">{{ text }}<span><ph-arrow-up-right :size="32"/></span></button>
</template>

<script setup>
import { PhArrowUpRight } from '@phosphor-icons/vue'; 
const props = defineProps({
    link: String,
    InnerText: String,
    text: String,
    });

    function href(link) {
        if (link) {
            window.location.href = link;
        }
    }
</script>

<style>
.button-big { 
    padding-left: 70px !important;
    display: flex; 
    align-items: center; 
    font-size: 24px; 
    font-weight: 700; 
    line-height: 32px; 
    letter-spacing: 0.045em; 
    text-align: left; 
    color: var(--text); 
    background: var(--bg); 
    border: 1px solid var(--bg); 
    border-radius: 50px; 
    padding: 8px 8px 8px 70px; 
} 

.button-big span { 
    width: 85px; 
    height: 85px; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    background: var(--accent); 
    color: var(--bg); 
    border-radius: 50%; 
    margin-left: 50px;  
} 
</style>