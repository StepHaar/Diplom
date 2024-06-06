<template>
  <div id="trus-card" class="gradient trus-card">
    <BaseImageWrapper class="trus-img" :src="img" />
    <div class="title">
      <h1 class="card-title">{{ title }}</h1>
      <h2 class="card-subtitle">{{ subtitle }}</h2>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  title: String,
  subtitle: String,
  img: String,
});

const image = useCookie("image");
if (image?.value == undefined) {
    image.value = true
}
</script>

<style>

.trus-card:first-of-type img{
  object-position: left;
}

.app-wrapper.dark #trus-card .card-title,
.app-wrapper.dark #trus-card .card-subtitle{
  color: var(--accent);
}

.app-wrapper.blue #trus-card .card-title,
.app-wrapper.blue #trus-card .card-subtitle{
  color: var(--text);
}
.app-wrapper.blue #trus-card .image-wrapper{
  background-color: var(--bg) !important;
}

.trus-card {
  overflow: hidden;
  height: 500px;
  align-items: flex-start;
  gap: 8px;
  border-radius: 20px;
  position: relative;
  z-index: 0;
  width: 100%;
  object-fit: cover;
  transition: 1s;
}

.trus-img{
  transition: 1s;
}

.normal .trus-card:hover .trus-img {
  transform: scale(1.1);
}

.gradient::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 2;
  background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));
}

#trus-card .title{
  z-index: 4;
  position: absolute;
  display: flex;
  flex-direction: column;
  bottom: 40px;
  left: 40px;
  align-items: flex-start;
}
.trus-card img{
  gap: 8px;
  z-index: 1;
  width: 100%;
  height: 100%;
  border-radius: 20px;
  position: relative;
  object-fit: cover;
}


.trus-card:first-of-type {
  grid-row: 1 / span 2;
  width: 100%;
  height: 1021px;
}

/* .trus-card:first-of-type .gradient img {
  height: 100%;
  object-position: left;
} */

.card-title {
  font-weight: 700;
  font-size: var(--h4);
  line-height: var(--h4_lh);
  letter-spacing: 0.045em;
  color: var(--bg);
  text-transform: none;
  margin-bottom: 8px;
}

.trus-card .image-wrapper{
  background-color: var(--text);
  height: 100%;
}

.card-subtitle {
  font-weight: 600;
  font-size: var(--text_size);
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
  color: var(--lock-text);
}

.app-wrapper.dark .card-title{
    color: var(--text);
}
@media screen and (max-width: 1200px) {

  .trus-card:first-of-type {
    grid-row:auto;
    width: 100%;
    height: 330px;
  }
  .trus-card img{
    border-radius: 20px;
    width: 100%;
    height: 330px;
    gap: 8px;
  }
  #trus-card .gradient{
    width: 100%;
    height: 330px;
  }
  .trus-card{
    height: 330px;
    width: 100%;
    border-radius: 20px;
    padding: 0px;
  }
  .trus_img img{
    border-radius: 20px;
  }
  .title{
    left: 20px;
    align-items: flex-start;
  }
  .normal .trus-card:hover .trus-img {
    transform: none;
  }

}
</style>
