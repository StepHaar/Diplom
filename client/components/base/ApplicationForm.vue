<template>
    <section id="application-form" ref="targetBlock">
        <div class="container wrapper-padding">
            <div class="application-form">
                <div class="application-form__text">
                    <h2 class="application-form__text-title"><span class="application-form__text-title-slim">{{
                        data?.title }} </span> {{ data?.subtitle }} </h2>
                    <div class="application-form__text-links">
                        <a class="application-form__text-links-mail" :href="data?.info.link_email">{{ data?.info.email
                            }}</a>
                        <a :href="data?.info.link_number">{{ data?.info.number }}</a>
                        <a class="application-form__text-links-vk" target="_blank" :href="data?.info.url_social">{{
                        data?.info.social }}<ph-arrow-circle-right class="arrow" :size="24" weight="fill" /></a>
                    </div>
                </div>
                <div class="application-form__form">
                    <n-form ref="form_ref" :model="form_data" :rules="rules" :show-label="false">
                        <p class="application-form__form-title">{{ data?.application.text }}</p>
                        <n-form-item class="application-form__form-input" path="name">
                            <n-input v-model:value="form_data.name" placeholder="Имя" id="name" />
                        </n-form-item>
                        <n-form-item class="application-form__form-input" path="phone">
                            <n-input v-model:value="form_data.phone" placeholder="Телефон" id="phone" />
                        </n-form-item>
                        <n-form-item class="application-form__form-input" path="message">
                            <n-input v-model:value="form_data.message" placeholder="Сообщение" type="textarea"
                                :autosize="{
                        minRows: 3,
                    }" id="message" />
                        </n-form-item>
                        <n-form-item style="display: none;" class="application-form__form-input" path="type_application">
                            <input type="hidden" v-model="type_application">
                        </n-form-item>
                        <p class="application-form__form-approval">{{ data?.application.sub_assent }}<a
                                class="application-form__form-approval-bold" v-html="data?.application.assent"
                                :href="data?.application.link_assent" target="_blank"></a></p>
                            </n-form>
                    <div class="application-form__form-btn">
                        <UIButton :InnerText="data?.application.btnText" type="big enabled" @click="create()" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRouter } from "vue-router";
import { PhArrowCircleRight } from '@phosphor-icons/vue';
import {
    NForm,
    NInput,
    NFormItem,
    useMessage
} from "naive-ui";
import { replaceNumberForPaste, replaceToLatters } from "@/assets/js/helper.js";

const message = useMessage()

const state_type = useState('state_type')
const state_redirect = useState('state_redirect')

const props = defineProps({
    data: null,
})

const form_ref = ref(null);
const form_data = ref({
    name: "",
    phone: "",
    message: "",
});
// const type_application = ref(null)
// type_application.value = state_type.value;



const rules = {
    name: {
        required: true,
        trigger: ["input", "blur"],
        validator(rule, value) {
            if (!value) {
                return new Error("Обязательное поле");
            } else {
                form_data.value.name = replaceToLatters(value);
            }
        },
    },
    phone: {
        required: true,
        trigger: ["input", "blur"],
        validator(rule, value) {
            if (!value) {
                return new Error("Обязательное поле");
            } else {
                form_data.value.phone = replaceNumberForPaste(value);
                if (value.length < 18) {
                    return new Error("Введите существующий телефон");
                }
            }
        },
    },
    message: {
        required: false,
        trigger: ["input", "blur"],
    }
};

function resetForm() {
    form_data.value.name = "";
    form_data.value.phone = "";
    form_data.value.message = "";
}
const router = useRouter();
async function create() {
    await form_ref.value.validate(async (errors) => {
        if (!errors) {
            const formdata = new FormData();
            formdata.append("name", form_data.value.name);
            formdata.append("phone", form_data.value.phone);
            // formdata.append("content", form_data.value.message ?? 'Нет сообщения');
            if (form_data.value.message == '' || form_data.value.message == null){
                formdata.append("content", 'Нет сообщения');
            }else{
                formdata.append("content", form_data.value.message);
            }
            formdata.append("type_application", state_type.value ?? 'обычная заявка');

            // console.log("type_application.value: ", type_application.value);
            console.log("state_type.value: ", state_type.value);

            const requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow"
            };

            fetch("http://stud.shubizle11.beget.tech/v1/methods/createOrder", requestOptions)
                .then((response) => response.text())
                .then((result) => console.log(result))
                .catch((error) => console.error(error));
            message.info('Заявка успешно отправлена')
            resetForm();
        }
    })
}

import { ref, onMounted, onBeforeUnmount, onUpdated } from 'vue';

const targetBlock = ref(null);
// var x = document.getElementById('application-form');

const scrollToBlock = () => {
    // targetBlock.scrollIntoView({ behavior: 'smooth' });
    const element = document.getElementById('application-form');
    element.scrollIntoView({behavior: "smooth"});
    
    //x.scrollIntoView();
};


onUpdated(() => {
    console.log("state_redirect now: ", state_redirect.value)
    try {
        if (state_redirect.value === true){
            if (window.innerWidth > 1200) {
                window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
            } else {
                scrollToBlock();
            }
            state_redirect.value = false;
            console.log("state_redirect after: ", state_redirect.value);
        } 

    }
    catch {

    }
    // targetBlock.scrollIntoView({ behavior: 'smooth' });
});
// import { onMounted, onBeforeUnmount } from 'vue';

// let observer;

// onMounted(() => {
//     observer = new IntersectionObserver((entries) => {
//         if (entries[0].isIntersecting) {
//         observer.disconnect();
//         scrollToBlock();
//         }
//     });

//     observer.observe(targetBlock);
// });

// onBeforeUnmount(() => {
//     if (observer) {
//         observer.disconnect();
//     }
// });


</script>

<style>
#application-form {
    background-color: var(--lock);
    position: relative;
    z-index: 3;
}

.n-input .n-input__placeholder span::after {
  content: "*"; 
  color: var(--error); 
} 

.app-wrapper.blue #application-form .application-form__form-approval,
.app-wrapper.blue #application-form .application-form__form-approval-bold,
.normal .app-wrapper.blue #application-form .application-form__text-links a:hover,
.app-wrapper.blue #application-form .application-form__form-title{
    color: var(--text);
}
.app-wrapper.blue #application-form .n-input,
.app-wrapper.blue #application-form{
    background-color: var(--text);
}
.app-wrapper.blue #application-form .application-form__form{
    background-color: var(--accent);
}

.application-form__form-input .n-form-item-feedback-wrapper {
    position: absolute;
    bottom: -21px;
}

.n-form-item {
    position: relative;
}

.application-form {
    display: grid;
    grid-template-columns: 3fr 2fr;
    background-color: var(--bg);
    border-radius: 20px;
}

.application-form__form {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: var(--text);
    border-radius: 20px;
    padding: 40px;
}

.application-form__text {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 40px;
    color: var(--text);
}

.application-form__text-title {
    font-size: var(--h2);
    font-weight: 700;
    text-transform: uppercase;
    margin: 0;
    color: var(--text);
}

.application-form__text-title-slim {
    font-family: "Montserrat-Light";
    font-weight: 400;
    color: var(--text);
}

.application-form__form-btn{
    margin-top: 60px;
}

.application-form__text-links {
    display: flex;
    flex-direction: column;
    gap: 8px;
    color: var(--text);
}

.application-form__text-links a {
    font-size: var(--text_size);
    font-weight: 600;
    margin: 0;
}

.application-form__form-title {
    color: var(--bg);
    font-size: var(--text_size);
    line-height: var(--text_size_lh);
    margin: 0 0 4px 0;
    font-family: 'Montserrat-Light';
}

.application-form__text-links-vk {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.application-form__form-approval {
    font-size: var(--text_size);
    color: var(--bg);
    font-weight: 400;
    font-family: 'Montserrat-Light';
}

.application-form__form-approval-bold {
    font-weight: 600;
    font-size: var(--text_size);
    color: var(--bg);
    cursor: pointer;
}

.n-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.application-form__text-links-mail {
    text-transform: uppercase;
}

@media screen and (max-width: 1200px) {
    .n-input .n-input__placeholder span, 
    .n-input.n-input--textarea .n-input__placeholder{
        font-size: 14px;
    }

    .application-form {
        grid-template-columns: 1fr;
    }

    .application-form__text-title {
        font-weight: 700;
        text-transform: uppercase;
        margin: 0;
        /* color: var(--text); */
    }

    .application-form__form {
        padding: 20px;
        /* color: var(--text); */
        max-width: calc(100vw - 40px);
        border-radius:0 0 20px 20px;
    }

    .application-form__text-links {
        margin-top: 40px;
    }

    #application-form .arrow {
        transform: rotate(90deg);
    }

    .application-form__text-links a {
        font-size: var(--text_size_min);
        font-weight: 600;
        margin: 0;
        /* color: var(--text); */
    }

    .application-form__form-approval {
        /* font-size: var(--text_size); */
        /* color: var(--text); */
        font-size: 14px;
    }

    .application-form__form-approval-bold {
        font-weight: 600;
        /* color: var(--text); */
        font-size: 14px;
    }

    .application-form__text {
        padding: 20px;
        /* color: var(--text); */
    }
}
</style>