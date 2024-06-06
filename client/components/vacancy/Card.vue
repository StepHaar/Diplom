<template>
    <div class="container wrapper-padding" id="vacancy_card">
        <div class="vac-card">
            <div class="vac-card-holder" v-for="item in data?.card" :class="item.is_open ? '' : 'closed'">
                <div class="vac-card-holder-block-left">
                    <div class="block-left_vacancy" :class="item.is_open ? '' : 'closed'">
                        <!-- <img class="vac_img" src="http://stud.shubizle11.beget.tech/wp-content/uploads/2024/04/check.png" v-if="item.is_open"> -->
                        <svg class="vac_img" v-if="item.is_open" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z" fill="white"/>
                        </svg>

                        <!-- <img class="vac_img" src="http://stud.shubizle11.beget.tech/wp-content/uploads/2024/04/close.png" v-else> -->
                        <svg class="vac_img" v-else width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM15.5306 14.4694C15.6003 14.5391 15.6556 14.6218 15.6933 14.7128C15.731 14.8039 15.7504 14.9015 15.7504 15C15.7504 15.0985 15.731 15.1961 15.6933 15.2872C15.6556 15.3782 15.6003 15.4609 15.5306 15.5306C15.4609 15.6003 15.3782 15.6556 15.2872 15.6933C15.1961 15.731 15.0986 15.7504 15 15.7504C14.9015 15.7504 14.8039 15.731 14.7128 15.6933C14.6218 15.6556 14.5391 15.6003 14.4694 15.5306L12 13.0603L9.53063 15.5306C9.46095 15.6003 9.37822 15.6556 9.28718 15.6933C9.19613 15.731 9.09855 15.7504 9 15.7504C8.90146 15.7504 8.80388 15.731 8.71283 15.6933C8.62179 15.6556 8.53906 15.6003 8.46938 15.5306C8.3997 15.4609 8.34442 15.3782 8.30671 15.2872C8.269 15.1961 8.24959 15.0985 8.24959 15C8.24959 14.9015 8.269 14.8039 8.30671 14.7128C8.34442 14.6218 8.3997 14.5391 8.46938 14.4694L10.9397 12L8.46938 9.53063C8.32865 9.38989 8.24959 9.19902 8.24959 9C8.24959 8.80098 8.32865 8.61011 8.46938 8.46937C8.61011 8.32864 8.80098 8.24958 9 8.24958C9.19903 8.24958 9.3899 8.32864 9.53063 8.46937L12 10.9397L14.4694 8.46937C14.5391 8.39969 14.6218 8.34442 14.7128 8.3067C14.8039 8.26899 14.9015 8.24958 15 8.24958C15.0986 8.24958 15.1961 8.26899 15.2872 8.3067C15.3782 8.34442 15.4609 8.39969 15.5306 8.46937C15.6003 8.53906 15.6556 8.62178 15.6933 8.71283C15.731 8.80387 15.7504 8.90145 15.7504 9C15.7504 9.09855 15.731 9.19613 15.6933 9.28717C15.6556 9.37822 15.6003 9.46094 15.5306 9.53063L13.0603 12L15.5306 14.4694Z" fill="white"/>
                        </svg>

                        <p class="vac_open" v-if="item.is_open">{{ data?.text_open }}</p>
                        <p class="vac_close" v-else>{{ data?.text_closed }}</p>
                    </div>
                    <h1 class="block-left_title" :class="item.is_open ? '' : 'closed'">{{ item?.title }}</h1>
                    <BaseImageWrapper img_class="img" class="block-right_img mobile" :src="item?.img" :class="item.is_open ? '' : 'closed'"/>
                    <UIButton v-if="item.is_open" :link="item?.url_button" :InnerText="data?.button" :type="item.is_open ? 'enabled' : 'disabled'" class="block-left_btn big"/>
                    <UIButton v-else :InnerText="data?.button" :type="item.is_open ? 'enabled' : 'disabled'" class="block-left_btn big"/>
                </div>
                <div class="vac-card-holder-block-right"> 
                    <BaseImageWrapper img_class="img" class="block-right_img desktop" :src="item?.img" :class="item.is_open ? '' : 'closed'"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import UIButton from "@/components/UI/Button.vue";

const props = defineProps({
        data: null
    })

</script>

<style scoped>
.app-wrapper.blue #vacancy .block-left_vacancy.closed .vac_img svg path{
    fill: var(--bg);
}
.app-wrapper.dark .block-left_vacancy{
    background-color: var(--bg);
}
.app-wrapper.dark .vac_open{
    color: var(--accent);
}

.vac-card{
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.vac-card-holder{
    display: flex;
    background-color: var(--text);
    padding: 40px;
    gap: 170px;
    border-radius: 20px;
    justify-content: space-between;
}

.vac-card-holder-block-left {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.vac-card-holder-block-right {
    width: 100%;
    max-width: 690px;
    display: inline-block;
    overflow: hidden;
}



.block-left_title{
    color: var(--bg);
    font-size: var(--h2);
    line-height: var(--h2_lh);
    letter-spacing: 0.045em;
    word-break: break-word;
}

.block-left_btn{
    max-width: max-content;
    margin-top: 20px;
}

.block-left_btn.closed .big span{
    background: var(--lock-text);
}

.block-left_vacancy {
    display: flex;
    max-width: max-content;
    padding: 5px 20px 5px 20px;
    gap: 10px;
    border-radius: 50px;
    background-color: var(--accent);
}

.vac_open {
    font-weight: 600;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    color: var(--bg);
}

.vac_close{
    font-weight: 600;
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    letter-spacing: 0.045em;
    color: var(--bg);
}

.block-right_img.mobile{
    display: none;
}

.vac_img{
    width: 24px;
    height: 24px;
    padding: 2.25px;
}

.block-right_img {
    width: 100%;
    border-radius: 20px;
    object-fit: cover;
    height: 100%;
}

.vac-card-holder-block-right img{
    transition: 1.5s;
    display: block;
    object-fit: cover;
}

.normal .vac-card-holder-block-right img:hover{
    transform: scale(1.1);
    object-fit: cover;
}
.normal .vac-card-holder-block-right:hover{
    border-radius: 20px;
}

.normal .vac-card-holder-block-right:not(:hover){
    border-radius: 20px;
}

.vac-card-holder.closed{
    background: var(--lock-text);
}

.block-right_img.closed{
    opacity: .5;
}

.block-left_vacancy.closed{
    background: var(--text) !important;
}

@media screen and (min-width: 1200px) and (max-width: 1600px){
    .vac-card-holder-block-left{
        min-width: 540px;
    }
    .vac-card-holder{
        gap: 50px;
    }
}

@media screen and (max-width: 1200px){
    .block-left_btn{
        font-size: 15px;
        width: 100% !important;
        max-width: 100vw;
    }
    .block-right_img.mobile {
        display: block;
    }

    .vac-card-holder-block-right {
        display: none;
    }
    
    .vac-card{
        gap: 10px;
    }

    .vac-card-holder{
        padding: 40px 20px;
    }

    .vac-card-holder-block-left { 
        gap: 20px;
    }

    .block-right_img{
        width: 100%;
    } 

    .block-left_title{
        font-size: 23px;
        font-weight: 700;
        letter-spacing: 0.045em;
    }
    .vac_close,
    .vac_open{
        font-size: 12px;
    }
}
@media screen and (max-width: 400px) {
    .block-left_title{
        font-size: 20px;
    }
}
@media screen and (max-width: 360px) {
    .block-left_title{
        font-size: 18px;
    }
}
</style>