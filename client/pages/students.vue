<template>
    <base-page-title :title="data?.banner.title" :img="data?.banner.img" class="students_photo"/>
    <!-- {{ schedule[0] }} -->
    <students-schedule 
    :data="schedule?.[0]"
    class="students_section"/>
    <!-- <students-schedule :data="schedule"/> -->
    <students-memo :data="data?.memo"/>
    <students-plan :data="data?.plan"/>
    <students-plus :data="data?.plus"/>
</template>

<script>

// const { data, error } = await useFetch('http://stud.shubizle11.beget.tech/v1/methods/students_request');

// // console.log(data);

// nextTick(); 
//     const { schedule, schedule_error } = useFetch('http://stud.shubizle11.beget.tech/v1/methods/getScheduleFromPlatform');
//     // .then(response => { data = response.data; });
//     // props?.data = data;
//     // console.log(schedule);


// let config = { 
//         method: 'get', 
//         headers: { 
//             "Content-type": 'application/json' 
//         }, 
//     };

// nextTick(() => {
//     //   console.log('DOM updated!')
    
//     const { schedule, schedule_error } = useFetch('http://stud.shubizle11.beget.tech/v1/methods/getScheduleFromPlatform', config);
        
//     console.log(schedule);
// })



import axios from 'axios'

// const axios = require('axios');
export default {


    data() {
        return {
            data: null,
            schedule: null,
        }
    },

    mounted() {
        axios.get("http://stud.shubizle11.beget.tech/v1/methods/students_request")
            .then(response => {
                this.data = response.data;
                console.log("students", this.data);
                useSeoMeta({
                    title: response.data?.seo.meta_title,
                    ogDescription: response.data?.seo.meta_description,
                    description:  response.data?.seo.meta_description,
                    keywords: response.data?.seo.meta_keywords,
                    imgSrc: response.data?.seo.og_image
                });
            })
            .catch(error => {
                console.log(error);
            });


        // axios.get("http://stud.shubizle11.beget.tech/v1/methods/getScheduleFromPlatform")
        //     .then(response => {
        //         this.schedule = response.data;
        //         useSeoMeta({
        //             title: response.data?.seo.meta_title,
        //             ogDescription: response.data?.seo.meta_description,
        //             description:  response.data?.seo.meta_description,
        //             keywords: response.data?.seo.meta_keywords,
        //             imgSrc: response.data?.seo.og_image
        //         });
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });






    async function getSchedule() {
        try {

            const authResponse = await axios.post('http://45.80.69.32:1337/api/auth/local', {
                identifier: 'penev1y@yandex.ru',
                password: 'MQX-jgN-eV5-B5Q'
            });

            const token = authResponse.data.jwt;

            const scheduleResponse = await axios.get('http://45.80.69.32:1337/api/schedule_apparel', {
                headers: {
                    'Authorization': `Bearer ${token}` 
                }
            });

            return scheduleResponse.data;
        } catch (error) {
            console.error('Error fetching schedule:', error);
            throw error;
        }
    }

    getSchedule()
        .then(response => {
                this.schedule = response;
                console.log('This Schedule data:', this.schedule);
                console.log('Schedule data:', response)
            })
        // .then(schedule => console.log('Schedule data:', schedule))
        .catch(error => console.error('Error:', error));
        }
    
}
</script>

<style>
.students_photo .image-wrapper img{
    border-radius: 20px 20px 0 0 !important;
}
@media screen and (max-width: 1200px){
    .students_section{
        border-radius: 0;
    }

    .students_photo{
        z-index: 20 !important;
    }
    .students_photo .page-title__text-title{
        font-size: 30px !important;
    }
    .students_photo .gradient::before{
        border-radius: 20px !important;
    }
    .students_photo .page-title__text-title{
        font-size: 26px !important;
    }
    .students_photo .image-wrapper img{
        border-radius: 20px !important;
    }
    /* .students_photo .students_photo .page-title__text-title{
        margin-bottom: 60px;
    } */
}
</style>