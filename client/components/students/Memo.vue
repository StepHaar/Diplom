<template>
    <section id="memo"> 
        <div class="container wrapper-padding">
            <div class="memo-title">
                <base-title-content :title="data?.title" :sub_title="data?.subtitle" color="--text"/>
                <div class="title-download">
                    <a :href="data?.file_download" :download="data?.file_download" class="title-download-text">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5 0H1.5C1.10218 0 0.720644 0.158035 0.43934 0.43934C0.158035 0.720644 0 1.10218 0 1.5V16.5C0 16.8978 0.158035 17.2794 0.43934 17.5607C0.720644 17.842 1.10218 18 1.5 18H16.5C16.8978 18 17.2794 17.842 17.5607 17.5607C17.842 17.2794 18 16.8978 18 16.5V1.5C18 1.10218 17.842 0.720644 17.5607 0.43934C17.2794 0.158035 16.8978 0 16.5 0ZM5.46937 7.71937C5.53903 7.64964 5.62175 7.59432 5.71279 7.55658C5.80384 7.51884 5.90144 7.49941 6 7.49941C6.09856 7.49941 6.19616 7.51884 6.28721 7.55658C6.37825 7.59432 6.46097 7.64964 6.53063 7.71937L8.25 9.43969V3.75C8.25 3.55109 8.32902 3.36032 8.46967 3.21967C8.61032 3.07902 8.80109 3 9 3C9.19891 3 9.38968 3.07902 9.53033 3.21967C9.67098 3.36032 9.75 3.55109 9.75 3.75V9.43969L11.4694 7.71937C11.5391 7.64969 11.6218 7.59442 11.7128 7.5567C11.8039 7.51899 11.9015 7.49958 12 7.49958C12.0985 7.49958 12.1961 7.51899 12.2872 7.5567C12.3782 7.59442 12.4609 7.64969 12.5306 7.71937C12.6003 7.78906 12.6556 7.87178 12.6933 7.96283C12.731 8.05387 12.7504 8.15145 12.7504 8.25C12.7504 8.34855 12.731 8.44613 12.6933 8.53717C12.6556 8.62822 12.6003 8.71094 12.5306 8.78063L9.53063 11.7806C9.46097 11.8504 9.37825 11.9057 9.2872 11.9434C9.19616 11.9812 9.09856 12.0006 9 12.0006C8.90144 12.0006 8.80384 11.9812 8.7128 11.9434C8.62175 11.9057 8.53903 11.8504 8.46937 11.7806L5.46937 8.78063C5.39964 8.71097 5.34432 8.62825 5.30658 8.5372C5.26884 8.44616 5.24941 8.34856 5.24941 8.25C5.24941 8.15144 5.26884 8.05384 5.30658 7.96279C5.34432 7.87175 5.39964 7.78903 5.46937 7.71937ZM16.5 16.5H1.5V12.75H4.18969L6 14.5613C6.13895 14.7008 6.30421 14.8115 6.48622 14.8868C6.66822 14.9621 6.86335 15.0006 7.06031 15H10.9397C11.1367 15.0006 11.332 14.9621 11.514 14.8866C11.696 14.8111 11.8612 14.7002 12 14.5603L13.8103 12.75H16.5V16.5Z" fill="#2E2E2E"/>
                        </svg> {{data?.download}}
                    </a>
                </div>
            </div>
            <div class="advertisement">
                <h3 class="advertisement-title">{{data?.message?.title}}</h3>
                <p class="advertisement-text" v-html="data?.message?.content"></p>  
            </div>
            <students-list />
        </div>
    </section>
</template>

<script setup>
import {PhTrayArrowDown} from '@phosphor-icons/vue'
const props = defineProps({
    data: null,
})

</script>

<style>


.app-wrapper.dark #memo .title__bold,
.app-wrapper.dark #memo .title__slim,
.app-wrapper.dark #memo .title-download a{
    color: var(--bg);
}

.app-wrapper.dark #memo .buttonMore{
    color: var(--bg);
    border: 1px solid var(--bg);
}

.app-wrapper.dark #memo .memo-cards-numer, 
.app-wrapper.dark #memo .memo-cards-text{
    color: var(--accent);
}

.app-wrapper.blue #memo,
.app-wrapper.blue #memo .buttonMore{
    background-color: var(--text) !important;
}
.app-wrapper.blue #memo .memo-cards{
    background-color: var(--lock);
    border: 1px solid var(--lock);
}
.app-wrapper.blue #memo .memo-cards-numer,
.app-wrapper.blue #memo .memo-cards-text{
    color: var(--text);
}

.app-wrapper.blue #memo .title__bold,
.app-wrapper.blue #memo .title__slim,
.app-wrapper.blue #memo .title-download a,
.app-wrapper.blue #memo .buttonMore{
    color: var(--bg);
}
.app-wrapper.blue #memo .title-download-text svg path{ 
    fill: var(--bg) !important;
}
.app-wrapper.blue #memo .advertisement{
    color: var(--text);
}
.app-wrapper.blue #memo .buttonMore{
    border: 1px solid var(--bg);
}

#memo { 
    width: 100%; 
    height: 100%; 
    background-color: var(--lock); 
    border-radius: 20px 20px 0 0;
    position: relative;
    z-index: 2;
} 

#memo .title__bold{
    color: var(--text);
}

#memo .title__slim{
    color: var(--text);
}

.memo-title {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.title-download-text {
    font-size: var(--text_size);
    font-weight: 600;
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    text-decoration: underline;
    color:var(--text);
    display: flex;
    align-items: center;
    gap: 10px;
}

.normal .title-download:hover {
    color:var(--accent)
}

.advertisement {
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    border: 1px solid var(--accent);
    background-color: var(--accent);
    color: var(--bg);
    padding: 40px;
}

.advertisement-title {
    font-size: var(--h3);
    font-weight: 700;
    line-height: var(--h3_lh);
    letter-spacing: 0.045em;
    margin-bottom: 20px;
}

.advertisement-text {
    font-size: var(--text_size);
    font-weight: 400;
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    margin-bottom: 10px;
}

.advertisement-text:last-child {
    margin-bottom: 0;
}

.memo {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 20px;
    width: 100%;
    margin-top: 20px;
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

.normal .memo-cards:hover {
    opacity: 0.9;
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

.reminder.mobile {
    display: none;
}

@media screen and (max-width: 1200px) {
    .title {
        display: flex;
        flex-direction: column;
    }
    .title-download-text{
        margin-bottom: 20px;
    }
    .advertisement {
        padding: 20px;
    }
    .advertisement-title{
        line-height: var(--text_size_lh);
    }
    .advertisement-text {
        font-weight: 400;
        letter-spacing: 0.045em;
        margin-bottom: 10px;
    }
    .memo {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 10px;
        margin-top: 10px;
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