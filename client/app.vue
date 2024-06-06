<template>
    <div class="app-wrapper" :class="[theme, size, !theme && !size && image ? 'normal' : '']">
        <BasePreloader/>
        <n-config-provider
            :theme-overrides="themeOverrides"
            :locale="ruRU"
            :date-locale="dateRuRU"
        >
            <n-message-provider placement="bottom-right">
                <n-notification-provider placement="bottom-right">
                    <n-dialog-provider>
                        <NuxtLayout>
                            <NuxtPage />
                        </NuxtLayout>
                    </n-dialog-provider>
                </n-notification-provider>
            </n-message-provider>
        </n-config-provider>
    </div>
</template>

<script setup>
import {
    ruRU,
    dateRuRU,
    darkTheme,
    NConfigProvider,
    NMessageProvider,
    NNotificationProvider,
    NDialogProvider,
} from "naive-ui";

const themeOverrides = {
    common: {
        primaryColor: "blue",
        primaryColorHover: "#BEC1EB",
        primaryColorPressed: "#3947F4",
        primaryColorSuppl: "blue",
    },
    Input: {
        // paddingMedium: "0 16px",
        fontSizeMedium: "16px",
        borderRadius: "5px",
        placeholderColor: "var(--lock-text)",
        color: "var(--bg)",
        colorDisabled: "var(--lock)",
        textColor: "var(--text)",
        border: "1px solid var(--lock)",
        borderHover: "1px solid var(--light-accent)",
        borderDisabled: "1px solid var(--lock)",
        borderFocus: "1px solid var(--accent)",
        boxShadowFocus: "none",
        paddingMedium: "16px",
        heightMedium: "56px",
        colorFocus: "var(--bg)",
        colorFocusError: "var(--bg)"
    },
    Collapse: {
        titleFontSize: "var(--h3)",
        titleFontWeight: "700",
        fontSize: "var(--text_size)",
        titleTextColor: "var(--text)",
        textColor: "var(--text)",
        itemMargin: "20px",
        titlePadding: "40px",
    },
    Message: {
        fontSize: "var(--h4)",
        iconMargin: "0 10px 0 0 ",
        padding: "10px 20px",
        iconSize: "var(--h4)",
        textColor: "rgba(42, 38, 38, 1)",
        textColorInfo: "var(--text)",
        textColorSuccess: "var(--text)",
        textColorError: "var(--text)",
        color: "var(--bg)",
        colorInfo: "var(--bg)",
        colorSuccess: "var(--bg)",
        colorError: "var(--bg)",
        iconColorInfo: "var(--accent)",
        iconColorSuccess: "var(--accent)",
        iconColorError: "var(--accent)"
    },
};
const theme = useCookie("theme");
const size = useCookie("size", "low_size");
const image = useCookie("image", true);

if (image?.value == undefined) {
    image.value = true
}

const icon_size = useCookie("icon_size", 24);

const loading = useState("loading");

loading.value = true;

function set_icon_size() {
    if (window.innerWidth > 1200){
        if (size.value == low_size){
            icon_size.value = 24
        }
        else if(size.value == medium_size){
            icon_size.value = 32
        }
        else{
            icon_size.value = 40
        }
    }
    else{
        icon_size.value = 16
    }
}

onMounted(() => {
    loading.value = false;
    const anchors = document.querySelectorAll('a[href*="#"]');
    let offset = 0;
    if (window.screenWidth > 1200) {
        offset = 120;
    } else {
        offset = 80;
    }
    for (let anchor of anchors) {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const blockID = anchor.getAttribute("href").substr(1);
            if (blockID) {
                window.scrollTo({
                    behavior: "smooth",
                    top:
                        document
                            .querySelector("#" + blockID)
                            .getBoundingClientRect().top -
                        document.body.getBoundingClientRect().top -
                        offset,
                });
            } else {
                document.getElementById("main").scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    }
});
</script>

<style>
@font-face {
    font-family: "Montserrat";
    src: url("/assets/fonts/Montserrat/Montserrat.ttf");
}

@font-face {
    font-family: "Montserrat-Light";
    src: url("/assets/fonts/Montserrat/static/Montserrat-Light.ttf");
}
@font-face {
    font-family: "Montserrat-Regular";
    src: url("/assets/fonts/Montserrat/static/Montserrat-Regular.ttf");
}
:root {
    /* colors */
    --text: #2e2e2e;
    --accent: #3947F4;
    --light-accent: #646FF4;
    --lock: #ededed;
    --lock-text: #a1a1a1;
    --error: #e32e2e;
    --bg: #fff;

    /* sizes */
    --h1: 64px;
    --h1_lh: 72px;

    --h2: 48px;
    --h2_lh: 56px;

    --h3: 32px;
    --h3_lh: 40px;

    --h4: 24px;
    --h4_lh: 32px;

    --h5: 18px;
    --h5_lh: 24px;

    --text_size: 16px;
    --text_size_lh: 24px;

    --text_size_min: 12px;
    --text_size_min_lh: 16px;

    --icon_size: 24px;
}

:root .app-wrapper.monochrome {
    --text: #1F1F1F;
    --accent: #727272;
    --light-accent: #C2C2C2;
    --lock: #E1E1E1;
    --lock-text: #CACACA;
    --error: #2e2e2e;
    --bg: #FFFFFF;
}

:root .app-wrapper.dark {
    --text: #c5c5c5;
    --accent: #FFFFFF;
    --light-accent: #C2C2C2;
    --lock:  #EDEDED;
    --lock-text: #727272;
    --error: #e32e2e;
    --bg: #1b1b1b;
}

:root .app-wrapper.blue {
    --text: #FFFFFF;
    --accent: #172648;
    --light-accent: #646FF4;
    --lock: #1C3F84;
    --lock-text: #7495D8;
    --error: #CC4E4E;
    --bg: #2E4E91;
}

:root .app-wrapper.large_size {
    --h1: 88px;
    --h1_lh: 96px;

    --h2: 64px;
    --h2_lh: 72px;

    --h3: 48px;
    --h3_lh: 64px;

    --h4: 40px;
    --h4_lh: 48px;

    --h5: 32px;
    --h5_lh: 40px;

    --text_size: 20px;
    --text_size_lh: 30px;

    --text_size_med: 18px;
    --text_size_med_lh: 24px;

    --text_size_min: 16px;
    --text_size_min_lh: 24px;

    --icon_size: 40px;
}

:root .app-wrapper.medium_size {
    --h1: 72px;
    --h1_lh: 80px;

    --h2: 56px;
    --h2_lh: 64px;

    --h3: 40px;
    --h3_lh: 48px;

    --h4: 32px;
    --h4_lh: 40px;

    --h5: 24px;
    --h5_lh: 32px;

    --text_size: 18px;
    --text_size_lh: 24px;

    --text_size_med: 16px;
    --text_size_med_lh: 24px;

    --text_size_min: 14px;
    --text_size_min_lh: 18px;

    --icon_size: 32px;
}

:root .app-wrapper.low_size {
    --h1: 64px;
    --h1_lh: 72px;

    --h2: 48px;
    --h2_lh: 56px;

    --h3: 32px;
    --h3_lh: 40px;

    --h4: 24px;
    --h4_lh: 32px;

    --h5: 18px;
    --h5_lh: 24px;

    --text_size: 16px;
    --text_size_lh: 24px;

    --text_size_med: 14px;
    --text_size_med_lh: 18px;

    --text_size_min: 12px;
    --text_size_min_lh: 16px;

    --icon_size: 24px;
}

.app-wrapper {
    background-color: var(--bg);
    min-height: 100vh;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    padding: 0;
    margin: 0;
    font-family: "Montserrat";
    font-size: 30px;
    color: var(--text);
}

h1,
.h1 {
    font-size: var(--h1);
    line-height: var(--h1_lh);
    text-transform: uppercase;
    font-weight: 700;
}

h1 > span,
.h1 > span {
    font-weight: 400;
}

.container {
    width: 100%;
    max-width: 1920px;
    margin: 0 auto;
    padding: 0 20px;
}

.wrapper-padding {
    padding: 120px 70px 150px 70px;
}

section {
    border-radius: 20px 20px 0 0;
}

.first-section {
    height: calc(100vh - 80px);
}

.first-section .container {
    height: 100%;
}

main section:not(:first-of-type) {
    margin-top: -20px;
}

a {
    text-decoration: none;
    color: var(--text);
    transition: 0.5s;
}

.normal a:hover {
    color: var(--accent);
}

@media screen and (max-width: 1200px) {
    .wrapper-padding {
        padding: 80px 20px 100px 20px;
    }

    :root {
    /* sizes */
        --h1: 32px;
        --h1_lh: 40px;

        --h2: 24px;
        --h2_lh: 32px;

        --h3: 18px;
        --h3_lh: 24px;

        --h4: 16px;
        --h4_lh: 24px;

        --h5: 16px;
        --h5_lh: 24px;

        --text_size: 16px;
        --text_size_lh: 24px;

        --icon_size: 16;
    }


    :root .app-wrapper.large_size{
        /* sizes */
        --h1: 32px;
        --h1_lh: 40px;

        --h2: 24px;
        --h2_lh: 32px;

        --h3: 18px;
        --h3_lh: 24px;

        --h4: 16px;
        --h4_lh: 24px;

        --h5: 16px;
        --h5_lh: 24px;

        --text_size: 16px;
        --text_size_lh: 24px;
    }
    :root .app-wrapper.medium_size{
        /* sizes */
        --h1: 32px;
        --h1_lh: 40px;

        --h2: 24px;
        --h2_lh: 32px;

        --h3: 18px;
        --h3_lh: 24px;

        --h4: 16px;
        --h4_lh: 24px;

        --h5: 16px;
        --h5_lh: 24px;

        --text_size: 16px;
        --text_size_lh: 24px;
    }
    :root .app-wrapper.low_size{
        /* sizes */
        --h1: 32px;
        --h1_lh: 40px;

        --h2: 24px;
        --h2_lh: 32px;

        --h3: 18px;
        --h3_lh: 24px;

        --h4: 16px;
        --h4_lh: 24px;

        --h5: 16px;
        --h5_lh: 24px;

        --text_size: 16px;
        --text_size_lh: 24px;
    }
}
</style>
