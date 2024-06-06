<template>
    <template v-if="props?.link">
        <button class="custom-btn" :class="props?.type" @click="navigateToBlock(); setRedirect(true)">
            {{ InnerText }}
            <span><ph-arrow-up-right :size="19" /></span>
        </button>
    </template>
    <template v-else-if="props?.link && props?.redirect">
        <a class="custom-btn" :class="props?.type" :href="props?.link">
            {{ InnerText }}
            <span><ph-arrow-up-right :size="19" /></span>
        </a>
    </template>
    <template v-else>
        <button @click="scrollToForm" :isFrom="props?.isFrom" :scrollTo="props?.scrollTo" class="custom-btn" :class="props?.type">
            {{ InnerText }}<span><ph-arrow-up-right :size="19" /></span>
        </button>
    </template>
</template>

<script setup>
import { PhArrowUpRight } from "@phosphor-icons/vue";
const props = defineProps({
    InnerText: String,
    type: String,
    link: String,
    redirect: false,
    scrollTo: String,
});

const arrow_size = ref(null);

function href(link) {
    if (link) {
        window.location.href = link;
    }
}

const scrollToForm = () => {
    try {
        const formElement = document.querySelector(props?.scrollTo);
        formElement.scrollIntoView({ behavior: 'smooth' });
    }
    catch {
        
    }
}

const state_redirect = useState('state_redirect', () => '');

function setRedirect(value) {
    state_redirect.value = value;
    console.log("state_redirect.value before: ", state_redirect.value);
}


import { ref } from 'vue';

//let self = this

const router = useRouter()

function navigateToBlock() {
    router.push(props.link);
}

// import { useRouter } from 'vue-router';
// const router = useRouter()

// const navigateToBlock = async () => {
//     await router.push(props.link);
//     console.log("click");
// };


</script>

<style>


.app-wrapper.dark .custom-btn.big{
    color: var(--accent);
}

.app-wrapper.dark .custom-btn.big.disabled{
    color: var(--lock-text);
}



.app-wrapper.blue .custom-btn{
    color: var(--accent);
    background: var(--text);
}

.app-wrapper.blue .custom-btn span{
    background: var(--accent);
    color: var(--text);
}

.app-wrapper.blue .custom-btn.disabled,
.app-wrapper.blue .custom-btn.big.disabled {
    color: var(--lock);
    background: var(--lock-text);
}


.app-wrapper.blue .custom-btn.disabled span,
.app-wrapper.blue .custom-btn.big.disabled span {
    background: var(--lock);
    color: var(--lock-text);
}


.custom-btn {
    display: flex;
    align-items: center;
    font-size: var(--text_size_lh);
    font-weight: 700;
    line-height: 24px;
    letter-spacing: 0.045em;
    color: var(--text);
    background: var(--bg);
    border: none;
    border-radius: 50px;
    padding: 8px 8px 8px 50px;
    transition: all .5s ease;
    cursor: pointer;
}

.custom-btn a{
    width: fit-content;
}

.custom-btn span {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--accent);
    color: var(--bg);
    border-radius: 50%;
    margin-left: 40px;
    transition: all .5s ease;
}

.custom-btn.disabled,
.custom-btn.big.disabled {
    color: var(--lock-text);
    background: var(--lock);
    cursor: default;
}

.custom-btn.disabled span,
.custom-btn.big.disabled span {
    background: var(--lock-text);
    color: var(--bg);
}

.normal .custom-btn.enabled:hover,
.normal .custom-btn.big.enabled:hover{
    background: var(--accent);
    color: var(--bg);
}

.normal .custom-btn.enabled:hover span,
.normal .custom-btn.big.enabled:active span {
    background-color: var(--bg);
    color: var(--accent);
} 

.normal .app-wrapper.dark .custom-btn.glow:hover,
.normal .app-wrapper.dark .custom-btn.big.glow:hover{
    box-shadow: rgba(10, 10, 10, 0.549) 0px 0px 30px 5px;
}

.normal .custom-btn.glow:hover,
.normal .custom-btn.big.glow:hover{
    box-shadow: rgba(255, 255, 255, 0.549) 0px 0px 30px 5px;
}

.custom-btn:active:enabled,
.custom-btn.big:active:enabled {
    /* background: var(--bg); */
    transform: scale(1);
    box-shadow: inset 0px 1px 5px 2px rgba(0, 0, 0, 0.25);
}

.custom-btn.big {
    display: flex;
    align-items: center;
    font-size: 24px;
    font-weight: 700;
    line-height: 32px;
    letter-spacing: 0.045em;
    color: var(--text);
    background: var(--bg);
    border: none;
    border-radius: 50px;
    padding: 8px 8px 8px 70px;
    transition: all 0.5s ease;
}

.custom-btn.big span {
    width: 85px;
    height: 85px;
    aspect-ratio: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--accent);
    color: var(--bg);
    border-radius: 50%;
    margin-left: 50px;
    transition: all 0.5s ease;
}

.custom-btn.big span svg{
    height: 32px;
    width: 32px;
}

@media screen and (max-width: 1200px) {

    .custom-btn.big{
        width: max-content;
        height: 66px;
        padding: 8px 8px 8px 70px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        line-height: 24px;
        justify-content: space-between;
    }
    .custom-btn{
        width: 100%;
        height: 66px;
        padding: 8px 8px 8px 70px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        line-height: 24px;
        white-space: nowrap;
        justify-content: space-between;
    }
    .custom-btn.big span {
        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        /* background: var(--accent);
        color: var(--bg); */
        border-radius: 50%;
        aspect-ratio: 1;
        margin-left: 40px;

}
}
@media screen and (max-width: 360px) {
    .custom-btn {
        padding: 8px 8px 8px 30px;
    }
    .custom-btn.big {
        padding: 8px 8px 8px 30px;
    }
}

</style>
