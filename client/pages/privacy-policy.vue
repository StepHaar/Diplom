<template>
  <section id="privacy-policy">
    <div class="container">
      <h1>Политика конфиденциальности</h1>
      <div class="privacy-policy" v-html="data?.content"></div>
    </div>
  </section>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      data: null,
    };
  },

  mounted() {
    axios
      .get("http://stud.shubizle11.beget.tech/v1/methods/privacy_request")
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
  },
};
</script>

<style>
#privacy-policy h1 {
  margin-bottom: 100px;
}

#privacy-policy {
  margin: 220px 120px 120px;
  color: var(--text);
}

.privacy-policy h1 {
  font-size: var(--h1);
  line-height: var(--h1_lh);
}
.privacy-policy h2 {
  font-size: var(--h2);
  line-height: var(--h2_lh);
  margin: 40px 0 20px 0;
}
.privacy-policy h3 {
  font-size: var(--h3);
  line-height: var(--h3_lh);
}
.privacy-policy h4 {
  font-size: var(--h4);
  line-height: var(--h4_lh);
}
.privacy-policy h5 {
  font-size: var(--h5);
  line-height: var(--h5_lh);
}
.privacy-policy h6 {
  font-size: var(--h6);
  line-height: var(--h6_lh);
}

.privacy-policy a {
  font-size: var(--text_size);
  line-height: var(--text_size_lh);
  text-decoration: underline;
}
.privacy-policy p {
  font-size: var(--text_size);
  line-height: var(--text_size_lh);
  margin-bottom: 10px;
}

.privacy-policy ul li,
.privacy-policy ol li {
  margin-top: 50px;
}

@media screen and (max-width: 1920px) {
}

@media screen and (max-width: 1720px) {
  #privacy-policy {
    margin: 220px 100px 120px;
  }
  #privacy-policy h1 {
    margin-bottom: 80px;
  }
}

@media screen and (max-width: 1520px) {
  #privacy-policy {
    margin: 220px 100px 120px;
  }
  #privacy-policy h1 {
    margin-bottom: 60px;
  }
}

@media screen and (max-width: 1320px) {
  #privacy-policy {
    margin: 120px 80px 120px;
  }
  #privacy-policy h1 {
    margin-bottom: 60px;
  }
}

@media screen and (max-width: 1200px) {
  #privacy-policy {
    margin: 120px 40px 120px;
  }
  #privacy-policy h1 {
    margin-bottom: 40px;
  }
}
@media screen and (max-width: 700px) {
  #privacy-policy {
    margin: 120px 20px 120px;
  }
  #privacy-policy h1 {
    margin-bottom: 40px;
    word-break: break-all;
  }
  .privacy-policy h2 {
    font-size: var(--h3);
    line-height: var(--h3_lh);
    margin: 20px 0 20px 0;
  }
}
</style>
