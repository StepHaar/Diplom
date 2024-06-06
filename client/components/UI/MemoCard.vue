<template>
    <div class="memo-cards">
        <h4 class="memo-cards-numer">{{item?.number}}</h4>
        <p class="memo-cards-text">{{item?.content}}</p>
    </div>
</template>

<script setup>
const props = defineProps({
    item: null,
})

</script>

<style scoped>
.memo {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 20px;
    width: 100%;
    margin: 20px 0;
}

.memo-drop {
    display: grid;
    grid-template-rows: 0fr;
    overflow: hidden;
    transition: 0.8s
}

.memo-drop.drop {
    grid-template-rows: 1fr;
}

.memo-drop .memo {
    min-height: 0px;
}

.memo-cards.hidden {
    display: none;
}

.memo-drop .memo {
    margin: 0;
}

.memo-cards {
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    border: 1px solid var(--lock);
    padding: 40px;
    background-color: var(--bg);
    transition: all .8s ease;
    color: var(--text)
}

.memo-cards-numer {
    font-size: var(--h4);
    font-weight: 700;
    line-height: var(--h4_lh);

    letter-spacing: 0.045em;
    margin: 0;
}

.memo-cards-text {
     font-size: var(--text_size);
    font-weight: 400;
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    margin-top: 20px;
}

#memo .more-btn {
    width: 100%;
    padding: 20px 40px;
    border: 1px solid var(--text);
    border-radius: 50px;
    color: var(--text);
    font-size: var(--h4);
    font-weight: 700;
    line-height: var(--h4_lh);
    letter-spacing: 0.045em;
    text-align: center;
    margin-top: 60px;
    cursor: pointer;
    transition: 0.5s;
}

#memo .more-btn.drop {
    pointer-events: none;
    margin: 0px;
    opacity: 0;
}

@media screen and (max-width: 1200px) {
    
    .memo {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 10px
    }
    .memo-cards {
        padding: 20px;
    }
    .memo-cards-text {
        margin-top: 10px;
    }
    #memo .more-btn {
        margin-top: 40px;
    }
    .reminder.desktop {
        display: none;
    }
    .reminder.mobile {
        display: block;
    }
    .memo-title {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>