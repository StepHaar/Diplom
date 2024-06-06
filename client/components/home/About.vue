<template> 
    <section id="about"> 
        <div class="container"> 
            <div class="about-info"> 
                <h1 class="about-info-title">{{ data?.title }}<span>{{ data?.subtitle }}</span></h1>  
                <p class="about-info-text">{{ data?.content }}</p>  
                <button class="about-info-button">{{ data?.btn_text }}<span><ph-arrow-up-right :size="32"/></span></button> 
            </div>   
        </div> 
    </section> 
</template> 
 
<script setup> 
import { PhArrowUpRight } from '@phosphor-icons/vue';

const props = defineProps({
    data: null,
})
</script> 
 
<style> 
#about { 
    width: 100%; 
    height: 912px; 
    background: linear-gradient(230.98deg, rgba(67, 67, 67, 0) -9.31%, #000000 95.96%), url('/assets/img/about_bg.png'); 
    background-size: cover; 
    background-position: center; 
    border-radius: 20px;
} 
 
#about .container { 
    padding: 0 70px; 
} 
 
.about-info { 
    padding-top: 387px; 
} 
 
.about-info-title { 
    font-size: var(--h1); 
    font-weight: 700; 
    line-height: var(--h1_lh); 
    letter-spacing: 0.045em; 
    max-width: 1162px; 
    color: var(--bg); 
} 
 
.about-info-title span { 
    font-size: var(--h1); 
    font-weight: 400; 
    line-height: var(--h1_lh); 
    letter-spacing: 0.045em; 
    max-width: 837px; 
} 
 
.about-info-text { 
    font-size: var(--text_size); 
    font-weight: 400; 
    line-height: var(--text_size_lh); 
    letter-spacing: 0.045em;
    max-width: 632px; 
    color: var(--bg); 
    padding-bottom: 60px; 
} 
 
.about-info-button { 
    display: flex; 
    align-items: center; 
    font-size: var(--h4); 
    font-weight: 700; 
    line-height: var(--h4_lh); 
    letter-spacing: 0.045em; 
    text-align: left; 
    color: var(--text); 
    background: var(--bg); 
    border: 1px solid var(--bg); 
    border-radius: 50px; 
    padding: 8px 8px 8px 70px; 
} 
 
.about-info-button span { 
    width: 50px; 
    height: 50px; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    background: var(--accent);
    color: var(--text); 
    border-radius: 50%; 
    margin-left: 50px;  
} 
</style>