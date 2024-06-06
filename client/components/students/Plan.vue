<template>
    <section id="plan">
        <div class="bg">
            <div class="container wrapper-padding wrapper-plan"> 
                <div class="plan">
                    <base-title-content :title="plan?.title" :sub_title="plan?.subtitle" type="light" class="plan-title"/>
                    <a :href="plan?.file_download" :download="plan?.file_download" class="plan-text">
                        <ph-tray-arrow-down :size="24" weight="fill"/>
                        {{ plan?.download }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { PhTrayArrowDown } from '@phosphor-icons/vue'

const props = defineProps({
    data: null,
})

const plan = ref(null)

watch(props,(new_value) => {
    if (new_value?.data){
        plan.value = new_value?.data;
    }
});

</script>

<style>
.app-wrapper.blue #plan .bg{
    background-color: var(--bg) !important;
}
.app-wrapper.blue #plan .plan-title,
.app-wrapper.blue #plan .plan-text{
    color: var(--text);
}

#plan {
    background-color: var(--lock);
}

#plan .wrapper-plan{
    padding-bottom: 100px !important;
}

.bg {
    background-color: var(--text);
    border-radius: 20px;
    position: relative;
    z-index: 2;
}

.plan {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.plan-text {
    font-size: 16px;
    font-weight: 600;
    line-height: 24px;
    letter-spacing: 0.045em;
    text-decoration: underline;
    color: var(--bg);
    display: flex;
    align-items: center;
    gap: 10px;
}

.plan-title .title__bold {
    margin:0;
}

.normal .plan-text:hover {
    color: var(--accent)
}

@media screen and (max-width: 1200px) {
    .plan {
        flex-direction: column;
        gap: 20px;
    }
}
</style>