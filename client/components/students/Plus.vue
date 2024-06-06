<template>
    <section id="plus">
        <div class="container wrapper-padding">
            <div class="plus">
                <base-title-content :title="data?.title" :sub_title="data?.subtitle" color="--text"/>
                <div class="plus-cards">
                    <div class="plus-cards-row" v-for="item in data?.card">
                        <!-- <ph-check-circle :size="24"  weight="fill" class="cricle-plus" /> -->
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0.25C8.07164 0.25 6.18657 0.821828 4.58319 1.89317C2.97982 2.96451 1.73013 4.48726 0.992179 6.26884C0.254225 8.05042 0.061142 10.0108 0.437348 11.9021C0.813554 13.7934 1.74215 15.5307 3.10571 16.8943C4.46928 18.2579 6.20656 19.1865 8.09787 19.5627C9.98919 19.9389 11.9496 19.7458 13.7312 19.0078C15.5127 18.2699 17.0355 17.0202 18.1068 15.4168C19.1782 13.8134 19.75 11.9284 19.75 10C19.7468 7.41513 18.7185 4.93705 16.8907 3.10927C15.063 1.28149 12.5849 0.253225 10 0.25ZM13.75 10.75H10.75V13.75C10.75 13.9489 10.671 14.1397 10.5303 14.2803C10.3897 14.421 10.1989 14.5 10 14.5C9.80109 14.5 9.61033 14.421 9.46967 14.2803C9.32902 14.1397 9.25 13.9489 9.25 13.75V10.75H6.25C6.05109 10.75 5.86033 10.671 5.71967 10.5303C5.57902 10.3897 5.5 10.1989 5.5 10C5.5 9.80109 5.57902 9.61032 5.71967 9.46967C5.86033 9.32902 6.05109 9.25 6.25 9.25H9.25V6.25C9.25 6.05109 9.32902 5.86032 9.46967 5.71967C9.61033 5.57902 9.80109 5.5 10 5.5C10.1989 5.5 10.3897 5.57902 10.5303 5.71967C10.671 5.86032 10.75 6.05109 10.75 6.25V9.25H13.75C13.9489 9.25 14.1397 9.32902 14.2803 9.46967C14.421 9.61032 14.5 9.80109 14.5 10C14.5 10.1989 14.421 10.3897 14.2803 10.5303C14.1397 10.671 13.9489 10.75 13.75 10.75Z" fill="#3947F4"/>
                        </svg>
                        <p class="plus-cards-row-text">{{ item?.content }}</p>
                    </div>
                </div>
                <n-carousel :loop="false" :show-dots="false" :space-between="10":slide_prev="2" class="plus-carousel" >
                    <div class="plus-cards-row mobile" v-for="item in data?.card">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0.25C8.07164 0.25 6.18657 0.821828 4.58319 1.89317C2.97982 2.96451 1.73013 4.48726 0.992179 6.26884C0.254225 8.05042 0.061142 10.0108 0.437348 11.9021C0.813554 13.7934 1.74215 15.5307 3.10571 16.8943C4.46928 18.2579 6.20656 19.1865 8.09787 19.5627C9.98919 19.9389 11.9496 19.7458 13.7312 19.0078C15.5127 18.2699 17.0355 17.0202 18.1068 15.4168C19.1782 13.8134 19.75 11.9284 19.75 10C19.7468 7.41513 18.7185 4.93705 16.8907 3.10927C15.063 1.28149 12.5849 0.253225 10 0.25ZM13.75 10.75H10.75V13.75C10.75 13.9489 10.671 14.1397 10.5303 14.2803C10.3897 14.421 10.1989 14.5 10 14.5C9.80109 14.5 9.61033 14.421 9.46967 14.2803C9.32902 14.1397 9.25 13.9489 9.25 13.75V10.75H6.25C6.05109 10.75 5.86033 10.671 5.71967 10.5303C5.57902 10.3897 5.5 10.1989 5.5 10C5.5 9.80109 5.57902 9.61032 5.71967 9.46967C5.86033 9.32902 6.05109 9.25 6.25 9.25H9.25V6.25C9.25 6.05109 9.32902 5.86032 9.46967 5.71967C9.61033 5.57902 9.80109 5.5 10 5.5C10.1989 5.5 10.3897 5.57902 10.5303 5.71967C10.671 5.86032 10.75 6.05109 10.75 6.25V9.25H13.75C13.9489 9.25 14.1397 9.32902 14.2803 9.46967C14.421 9.61032 14.5 9.80109 14.5 10C14.5 10.1989 14.421 10.3897 14.2803 10.5303C14.1397 10.671 13.9489 10.75 13.75 10.75Z" fill="#3947F4"/>
                        </svg>
                        <p class="plus-cards-row-text">{{ item?.content }}</p>
                    </div>
                </n-carousel>
            </div>
        </div>
    </section>
</template>

<script setup>
import { NCarousel } from 'naive-ui';
import { PhCheckCircle } from '@phosphor-icons/vue';

const props = defineProps({
    data: null,
})
</script>

<style>
.app-wrapper.dark #plus .title__bold, 
.app-wrapper.dark #plus .title__slim{
    color: var(--bg);
}

.app-wrapper.dark #plus .plus-cards-row svg path{
    fill: var(--accent);
}
.app-wrapper.monochrome #plus .plus-cards-row svg path{
    fill: var(--text);
}

.app-wrapper.dark #plus .plus-cards-row p{
    color: var(--accent);
}

.app-wrapper.blue #plus,
.app-wrapper.blue #plus .plus-cards-row{
    background-color: var(--text);
}
.app-wrapper.blue #plus .plus-cards-row p{
    color: var(--text);
}
.app-wrapper.blue #plus .title__bold,
.app-wrapper.blue #plus .title__slim{
    color: var(--bg);
}
.app-wrapper.blue #plus .plus-cards-row{
    background-color: var(--lock);
}
.app-wrapper.blue #plus .plus-cards-row svg path{
    fill: var(--text);
}

#plus {
    background-color: var(--lock);
}

#plus .title__bold{
    color: var(--text);
}

#plus .title__slim{
    color: var(--text);
}

.plus-carousel {
    display: none;
    padding: 0 40px 80px 0px;
}

.normal .plus-cards-row:hover {
    opacity: 0.9;
}

.cricle-plus {
    color: var(--accent);
    transition: all .8s ease;
}

.normal .plus-cards-row:hover .cricle-plus {
    opacity: 0.9;
}

.plus-cards {
    display: grid;
    grid-template-columns: repeat(19, 1fr);
    gap: 20px;
}
.plus-cards-row {
    width: 100%;
    padding: 40px;
    min-height: 252px;
    height: 100%;
    background-color: var(--bg);
    border-radius: 20px;
    grid-column: span 5;
    transition: all .8s ease;
}

.plus-cards-row:nth-child(1) {
    grid-column: span 9;
}

.plus-cards-row:nth-child(2) {
    grid-column: span 5;
}

.plus-cards-row:nth-child(5) {
    grid-column: span 9;
}

.plus-cards-row:nth-child(6) {
    grid-column: span 5;
}

.plus-cards-row-text {
    font-size: var(--text_size);
    font-weight: 400;
    line-height: var(--text_size_lh);
    margin: 0;
    max-width: 515px;
    color: var(--text);
}
.plus-cards-row.mobile {
    display: none;
}

@media screen and (max-width: 1200px) {
    .plus-carousel {
        display: none;
        padding: 0 40px 0 0;
    }
    .plus-cards-row {
        display: none;
    }
    .plus-cards-row.mobile {
        display: block;
        
    }
    .plus-cards-row {
        width: 100%;
        padding: 20px;
        height: 100%;
        background-color: var(--bg);
        border-radius: 20px;
        grid-column: span 5;
    }
    .plus-carousel {
        display: block;
    }
}
</style>