<template>
    <div class="training-program-main__skills-cards">
        <div class="training-program-main__skills-cards-element">
            <p class="training-program-main__skills-cards-element-info"
                v-for="item in data?.info?.skill?.column_1.ul">
                <ph-check-circle class="card__check-circle" :size="24" weight="fill" />
                <span class="training-program-main__skills-cards-element-info-text">{{ item.li }}</span>
            </p>
        </div>
        <div class="training-program-main__skills-cards-element">
            <p class="training-program-main__skills-cards-element-info"
                v-for="item in data?.info?.skill?.column_2.ul">
                <ph-check-circle class="card__check-circle" :size="24" weight="fill" />
                <span class="training-program-main__skills-cards-element-info-text">{{ item.li }}</span>
            </p>
        </div>
    </div>
</template>

<script setup>

</script>

<style>

</style>