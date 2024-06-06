export default defineNuxtRouteMiddleware(async (to, from) => {
    const path = to.path == '/' ? '/home' : to.path;

    try {
        const { data: page } = useNuxtData('page' + path);

        if (page.value) {
            useSeoMeta({
                title:         page.value.seo?.title,
                ogTitle:       page.value.seo?.title,
                description:   page.value.seo?.description,
                ogDescription: page.value.seo?.description,
                ogImage:       page.value.seo?.img,
                twitterCard:   'summary_large_image',
            });

            return;
        }
        const res = await useFetch('http://ystheme.your-startup.space/v1/methods/page?path=' + path, { key: 'page' + path });
        console.log(res);
        useSeoMeta({
            title:         page.value.seo?.title,
            ogTitle:       page.value.seo?.title,
            description:   page.value.seo?.description,
            ogDescription: page.value.seo?.description,
            ogImage:       page.value.seo?.img,
            twitterCard:   'summary_large_image',
        });
    } catch (error) {
        console.log(error);
    }
})