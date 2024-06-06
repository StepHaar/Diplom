<template>
    <div class="image-wrapper" :class="image == false ? 'hidden' : ''">
        <img :src="props?.src" :class="props?.img_class">
    </div>
</template>

<script setup>
const image = useCookie("image");

const props = defineProps({
    src: null,
    img_class: '',
})
</script>

<style>

.image-wrapper.hidden img {
    opacity: 0;
    pointer-events: none;
}

.image-wrapper {
    background-color: var(--bg);
    border-radius: 20px;
}

.image-wrapper img {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    object-fit: cover;
}

.image-wrapper>* {
    transition: .5s;
}

.normal .normal .image-wrapper img:hover:not(.img) {
    transform: scale(1.1);
    object-fit: cover;
}
@media screen and (max-width: 1200px){
    .image-wrapper>* {
        transition: none;
    }

    .normal .image-wrapper img:hover:not(.img) {
        transform: none;
        object-fit: cover;
    }
}

</style>