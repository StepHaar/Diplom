<template>
    <div class="card" :class="props?.type">
        <div class="card__title">
            <ph-check-circle
                class="card__check-circle"
                :size="24"
                weight="fill"
            />
            <h4 v-html="title"></h4>
        </div>
        <p class="card__text" v-html="text"></p>
    </div>
</template>

<script setup>
import { PhCheckCircle } from "@phosphor-icons/vue";

const props = defineProps({
    title: String,
    text: String,
    type: String,
});
</script>

<style>

.card {
    display: flex;
    flex-direction: column;
    padding: 40px;
    gap: 20px;
    border-radius: 20px;
    height: 100%;
    width: 100%;
    transition: all 0.8s ease;
}

.dark {
    background-color: var(--text);
    color: var(--bg);
}

.normal .dark:hover {
    opacity: 0.9;
}

.white {
    background-color: var(--bg);
    color: var(--text); 
    transition: all 0.8s ease;
}

.normal .white:hover {
    opacity: 0.9;
}

.normal .white:hover .card__check-circle {
    opacity: 0.9;
}

.dark-between {
    background-color: var(--text);
    color: var(--bg);
    justify-content: space-between;
}

.normal .dark-between:hover {
    opacity: 0.9;
}

.white-between {
    background-color: var(--bg);
    color: var(--text);
    justify-content: space-between;
    transition: all 0.8s ease;
}

.normal .white-between:hover {
    opacity: 0.9;
}

.normal .white-between:hover .card__check-circle {
    opacity: 0.9;
}

.dark .card__check-circle,
.dark-between .card__check-circle {
    color: var(--bg) !important;
}

.white .card__check-circle,
.white-between .card__check-circle {
    color: var(--accent) !important;
}


.card__check-circle {
    margin: 0;
    transition: all 0.8s ease;
}

.card__title h4 {
    font-family: "Montserrat-Regular";
    font-size: var(--h4);
    line-height: var(--h4_lh);
    margin: 0;
    font-weight: 700;
}

.card__title {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.card__text {
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    line-height: 24px;
    margin: 0;
    letter-spacing: 0.045em;
}

@media screen and (max-width: 1200px) {
    .card {
        padding: 20px;
        gap: 10px;
    } 
    .card__title {
        gap: 10px;
    }
}
</style>
