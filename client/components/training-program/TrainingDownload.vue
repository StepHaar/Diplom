<template>
    <div class="training-program-main__download">
        <ph-tray-arrow-down :size="24" weight="fill" class="circle" />
        <a  :href="file_download"
            :download="file_download"
            class="training-program-main__download-text">
            {{ name }}
        </a>
    </div>
</template>

<script setup>
import { PhTrayArrowDown } from "@phosphor-icons/vue";
const props = defineProps({
    name: String,
    file_download: String,
})
</script>

<style>

.training-program-main__download {
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all .8s ease;
}
.normal .training-program-main__download:hover {
    color: var(--accent);
}

.training-program-main__download svg{
    transition: all .8s ease;
}

.normal .training-program-main__download:hover svg{
    color: var(--accent);
}

.training-program-main__download-text {
    color: var(--bg);
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    text-decoration: underline;
    cursor: pointer;
    display: flex;
    gap: 10px;
}
@media screen and (max-width: 1200px) {  
    .normal .training-program-main__download:hover a{
    color: var(--bg);
    }

    .normal .training-program-main__download:hover svg{
        color: var(--bg);
    }
}
</style>