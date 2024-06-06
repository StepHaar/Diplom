<template>
    <section id="vacancy">
        <vacancy-Card :data="data" />
    </section>
</template>

<script setup>
// import vacancy_card from '@/components/vacancy/Card.vue'

const props = defineProps({
    data: null,
});
</script>

<style>


.app-wrapper.blue #vacancy{
    background-color: var(--text);
}

.app-wrapper.blue #vacancy .block-left_vacancy .vac_open{
    color: var(--text);
}

.app-wrapper.blue #vacancy .vac-card-holder{
    background-color: var(--accent);
}
/* .app-wrapper.blue #vacancy .vac_open,
.app-wrapper.blue #vacancy .vac_img svg path{ */
    /* Сменить фотку галки на свг для смены цвета: Fill: var(--bg); вставить прямо сюда же*/
    /* color: var(--bg);
} */

/* .app-wrapper.blue #vacancy .block-left_vacancy .vac_img svg path{
    fill: var(--bg);
} */

.app-wrapper.blue #vacancy .block-left_vacancy{
    /* background-color: var(--text) !important;
    color: var(--lock); */
    background-color: var(--bg);
}

.app-wrapper.blue #vacancy .block-left_vacancy.closed{
    background-color: var(--lock-text) !important;
    color: var(--lock);
}
.app-wrapper.blue #vacancy .vac-card-holder.closed{
    background-color: var(--lock);
    border: 1px solid var(--lock);
}
.app-wrapper.blue #vacancy .block-left_title.closed{
    color: var(--lock-text);
}
.app-wrapper.blue #vacancy .block-left_title{
    color: var(--text);
}

    #vacancy {
    background-color: var(--bg);
    position: relative;
    z-index: 2;
}

</style>

