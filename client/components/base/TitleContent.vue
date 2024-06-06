<template>
    <div class="title" :class="type">
        <h2 class="title__bold" :class="type">
            {{ title }}
            <span class="title__slim" v-html="sub_title" v-if="sub_title" :class="type"></span>
        </h2>
        <p v-if="text" class="title__text" :class="type">{{ text }}</p>
    </div>
</template>

<script setup>
const props = defineProps({
    data: null,
    title: String,
    sub_title: String,
    text: String,
    type: {
        type: String,
        default: () => "darks",
    },
    computed: {
        sub_title() {
            return this.sub_title;
        },
    },
});
</script>

<style>
.title{
    display: grid;
    grid-template-columns: 2fr 1fr
}

.title.darks {
    color: var(--text)
}

.app-wrapper.dark .title.darks{
    color: var(--bg)
}

.title.light {
    color: var(--bg)
}

.title__bold {
    font-size: var(--h2);
    line-height: var(--h2_lh);
    font-family: Montserrat;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 66px;
    letter-spacing: 0.045em;
    margin: 0 0 40px 0;
}

.title__slim {
    font-family: "Montserrat-light";
    font-weight: 400;
}

.title__text{
    display: flex;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    line-height: 24px;
    justify-content: flex-end;
}
@media screen and (max-width: 1200px) {
    .title__bold {
        font-size: 24px;
        line-height: 32px;
        letter-spacing: 0.045em;
        margin: 0 0 20px 0;
        padding: 0px !important; 
    }
    
    .title {
        grid-template-columns: 2fr;
        grid-template-rows: 2fr;
        /* justify-content: left; */
    }

    .title__text {
        margin-bottom: 20px;
    }
}
</style>
