<template>
    <section id="training-program-main">
        <div class="container wrapper-padding">
            <BaseTitleContent :title="data?.info.title" :sub_title="data?.info.subtitle" type="light" class="training-program-main__text"/>
            <div class="training-program-main__download-wrapper">
                <TrainingProgramTrainingDownload v-for="item in data?.info?.download" :file_download="item.file_download" :name="item.name"/>
            </div>
            <div class="training-program-main__skills">
                <h5 class="training-program-main__title training-program-main__skills-title">{{ data?.info?.skill.title
                    }}</h5>
                <div class="training-program-main__skills-cards">
                    <UICardSkill :data="data?.info?.skill?.column_1.ul"/>
                    <UICardSkill :data="data?.info?.skill?.column_2.ul"/>
                </div>
            </div>
            <div class="training-program-main__skills">
                <h5 class="training-program-main__title training-program-main__skills-title">{{ data?.info?.tool.title
                    }}</h5>
                <div class="training-program-main__cards">
                    <UICardTools v-for="item in data?.info?.tool?.card" :icon="item?.icon" :name="item?.name"/>
                    
                </div>
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
#training-program-main {
    background-color: var(--text);
    position: relative;
    z-index: 1;
}

.app-wrapper.dark #training-program-main .training-program-main__title{
    color: var(--bg);
}

.app-wrapper.dark #training-program-main .training-program-main__skills .training-program-main__skills-cards .training-program-main__skills-cards-element .training-program-main__skills-cards-element-info svg{
    fill: var(--lock);
}

.app-wrapper.blue #training-program-main{
    background-color: var(--bg);
}
.app-wrapper.blue #training-program-main .training-program-main__download-wrapper svg{
    fill: var(--text);
}
.app-wrapper.blue #training-program-main .training-program-main__download-wrapper a,
.app-wrapper.blue #training-program-main .training-program-main__text .title__bold{
    color: var(--text);
}
.app-wrapper.blue #training-program-main .training-program-main__skills .training-program-main__skills-cards .training-program-main__skills-cards-element,
.app-wrapper.blue #training-program-main .training-program-main__skills .training-program-main__cards .training-program-main__cards-element,
.app-wrapper.blue #training-program-main .training-program-main__skills .training-program-main__cards .training-program-main__cards-element .image-wrapper{
    background-color: var(--text);
}
.app-wrapper.blue #training-program-main .training-program-main__skills .training-program-main__skills-cards .training-program-main__skills-cards-element .training-program-main__skills-cards-element-info-text,
.app-wrapper.blue #training-program-main .training-program-main__skills .training-program-main__cards .training-program-main__cards-element .training-program-main__cards-element-text{
    color: var(--accent);
}
.app-wrapper.blue #training-program-main .training-program-main__skills .training-program-main__skills-cards .training-program-main__skills-cards-element .training-program-main__skills-cards-element-info svg{
    fill: var(--light-accent);
}


.training-program-main__download-wrapper {
    display: flex;
    gap: 20px;
    margin-bottom: 40px;
    width: max-content;
}

.training-program-main__text .title__bold{
    margin: 0 0 20px 0;
}

.normal .training-program-main__download-wrapper:hover{
    color: var(--accent);
}


.training-program-main__skills-cards {
    /* display: grid;
    grid-template-columns: repeat(2, 1fr); */
    display: flex;
    gap: 20px;
    margin-bottom: 40px;
}
.circle {
    color: var(--bg)
}

.training-program-main__title {
    margin: 0 0 20px 0;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 600;
    color: var(--lock-text);
}

.training-program-main__cards {
    display: grid;
    gap: 20px;
    grid-template-columns: repeat(10, auto);
}

.training-program-main__cards-element {
    width: 100%;
    padding: 10px 20px;
    background-color: var(--bg);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all .8s ease;
    gap: 20px;
}

.training-program-main__cards-element .image-wrapper{
    display: flex;
    align-items: center;
}

.normal .training-program-main__cards-element:hover {
    opacity: 0.9;
}

.training-program-main__cards-element img {
    max-height: 30px;
    border-radius: 0 !important;
}

.training-program-main__cards-element-text {
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    font-weight: 600;
    margin: 0;
    color: var(--text);
}

.card__check-circle {
    color: var(--accent) !important;
}

@media screen and (max-width: 1600px) {
    .training-program-main__cards {
        grid-template-columns: repeat(5, 1fr);
    }
}

@media screen and (max-width: 1200px) {
    .training-program-main__download-wrapper {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
    }

    .training-program-main__skills-cards {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
    }

    .training-program-main__cards {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .training-program-main__cards-element {
        width: 100%;
        gap: 10px;
        justify-content: center;
        padding: 10px 15px;
    }
    .training-program-main__cards-element img{
        border-radius: 0 !important;
    }
}
</style>