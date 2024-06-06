<template>
  <div class="error-page">
    <BaseHeader :data="add_data" :is_close="to_close"/>
    <main @click="close">
      <section id="not-found">
        <div class="container not-found__wrapper wrapper-padding">
          <div class="not-found__content">
            <div class="not-found__img mobile">
              <BaseImageWrapper :src="data?.info.img" alt="" class="img-404" />
            </div>
            <base-title-content
              :title="data?.info.title"
              :sub_title="data?.info.subtitle"
              color="--bg"
              class="found"
              type="light"
            />
            <p class="not-found__content-error">
              {{ data?.info.details }}
            </p>
            <UIButton
              class="not-found__content-btn"
              :InnerText="data?.info.button"
              type="big glow"
              link="/"
            />
            <UIButton
              class="not-found__content-btn mobile"
              :InnerText="data?.info.button"
              link="/"
            />
          </div>
          <div class="not-found__img">
            <img :src="data?.info.img" alt="" />
          </div>
        </div>
      </section>
    </main>
    <base-footer :data="add_data"/>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      data: null,
      add_data: null,
      to_close: {
                type: Boolean, default: ()=> false
            },
    };
  },
  mounted() {
    axios
      .get("http://stud.shubizle11.beget.tech/v1/methods/404_request")
      .then((response) => {
        this.data = response.data;
        useSeoMeta({
          title: response.data?.seo.meta_title,
          ogDescription: response.data?.seo.meta_description,
          description: response.data?.seo.meta_description,
          keywords: response.data?.seo.meta_keywords,
          imgSrc: response.data?.seo.og_image,
        });
      })
      .catch((error) => {
        console.log(error);
      });
      axios
        .get("http://stud.shubizle11.beget.tech/v1/methods/site_info")
            .then(response => {
                this.add_data = response.data;
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
            
  },
  methods:{
        close(){
            this.to_close = !this.to_close
        },
    }
};
</script>

<style>
#not-found {
  background-color: var(--accent);
  min-height: 810px;
  height: calc(100vh - 103px - 365px);
  display: flex;
  align-items: center;
}
.img-404 {
  background-color: var(--accent);
}
.not-found__wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.not-found__content-error {
  font-family: "Montserrat-light";
  font-size: var(--text_size);
  line-height: var(--text_size_lh);
  font-weight: 400;
  line-height: 24px;
  letter-spacing: 0.045em;
  text-align: left;
  color: var(--bg);
}

.not-found__content-btn {
  margin-top: 60px;
  width: max-content;
}

.not-found__img.mobile {
  display: none;
}

.not-found__img {
  pointer-events: none;
}
.not-found__content-btn.mobile {
  display: none;
}

.found .title__bold{
  margin-bottom: 20px;
}

#not-found .title{
  grid-template-columns: 1fr
}

#not-found .title__bold{
  font-size: var(--h1) !important
}

@media screen and (max-width: 1250px) {
  .not-found__img.mobile {
    display: flex;
    justify-content: center
  }
  .img-404 img{
    object-fit: contain;
  }

  .not-found__wrapper{
    justify-content: center;
  }

  .not-found__img {
    display: none;
  }

  .not-found__content-btn {
    display: none !important;
    margin-top: 0;
  }

  .not-found__content-btn.mobile {
    display: flex !important;
    visibility: visible;
    width: 100%;
    margin-top: 40px;
  }
  .img-404 {
    background-color: var(--accent);
    max-height: 340px;
    margin-bottom: 20px;
  }
}
</style>
