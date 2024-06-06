<template>
    <div class="training-program-main__cards-element">
        <BaseImageWrapper  img_class="img" :src="icon"/>
        <p class="training-program-main__cards-element-text">{{ name }}</p>
    </div>
</template>

<script setup>
const props = defineProps({
    icon: String,
    name: String,
})
</script>

<style>

</style>