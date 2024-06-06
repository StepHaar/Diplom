<template>
    <section id="about-cards">
        <div class="container wrapper-padding">
            <div class="about-cards">
                <UICarouseleDouble :data="data?.history.card" :slide_prev="1"/>
            </div>
        </div>
    </section>
    
</template>

<script setup>

const props = defineProps({
    data: null,
})

</script>

<style>

#about-cards{
    position: relative;
    z-index: 1;
    background-color: var(--lock);
}

.app-wrapper.blue .carousele-double__custom-arrow--left.lock svg,
.app-wrapper.blue .carousele-double__custom-arrow--right.lock svg{
    fill: var(--accent);
}

.app-wrapper.dark #about-cards .carousele-double__custom-arrow button.lock{
    color: var(--lock-text) !important;
}

.app-wrapper.dark #about-cards .carousele-double__custom-arrow button{
    color: var(--bg) !important;
}


.app-wrapper.blue #about-cards .carousele-double__custom-arrow button.lock{
    color: var(--accent) !important;
}

.app-wrapper.blue #about-cards .carousele-double__custom-arrow button{
    color: var(--text) !important;
}

.app-wrapper.blue #about-cards{
    background-color: var(--text);
}

.app-wrapper.blue .carousele-double__info-pag-color{
    color: var(--lock-text);
}

/* .app-wrapper.blue .carousele-double__custom-arrow button{
    background-color: var(--light-accent) !important;
}
.app-wrapper.blue .carousele-double__custom-arrow--left.lock{
    background-color: var(--lock) !important;
    cursor: auto;
}
.app-wrapper.blue .carousele-double__custom-arrow--left.lock svg{
    fill: var(--accent)
}
.app-wrapper.blue .carousele-double__custom-arrow button svg{
    fill: var(--text)
} */

.about-cards{
    display: grid;
    grid-template-columns: 3fr 2fr;
    gap: 20px;
    /* height: 100vh; */
}

@media screen and (max-width: 1200px){
    .about-cards{
        grid-template-columns: 1fr;
        max-height: none;
        height: auto;
        grid-template-rows: 195px auto;
    }
}

</style>