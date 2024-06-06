<template>
    <div class="training-program-main__skills-cards-element">
        <p class="training-program-main__skills-cards-element-info"
            v-for="item in data">
            <ph-check-circle class="card__check-circle" :size="24" weight="fill" />
            <span class="training-program-main__skills-cards-element-info-text">{{ item.li }}</span>
        </p>
    </div>
</template>

<script setup>
import {PhCheckCircle } from "@phosphor-icons/vue";
const props = defineProps({
    data: null,
})
</script>

<style>
.training-program-main__skills-cards-element {
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: var(--bg);
    border-radius: 20px;
    padding: 40px;
    width: 100%;
    transition: all .8s ease;
}
.normal .training-program-main__skills-cards-element:hover {
    opacity: 0.9;
}

.training-program-main__skills-cards-element-info {
    display: grid;
    align-items: start;
    grid-template-columns: 20px auto;
    margin: 0;
}

.training-program-main__skills-cards-element-info-text {
    color: var(--text);
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 600;
    margin-left: 20px;
}
.normal .training-program-main__skills-cards-element:hover .card__check-circle {
    opacity: 0.9;
}
@media screen and (max-width: 1200px) {
    .training-program-main__skills-cards-element {
        padding: 20px;
    }
}
</style>