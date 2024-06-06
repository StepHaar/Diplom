<template>
  <div class="card-gradient-number">
    <div class="card-gradient-number-info">
      <h4 class="card-gradient-number-info-title">{{ title }}</h4>
      <p class="card-gradient-number-info-text">{{ content }}</p>
    </div>
    <p class="card-gradient-number-number" v-if="index < 9">0{{ index + 1 }}</p>
    <p class="card-gradient-number-number" v-else>{{ index + 1 }}</p>
  </div>
</template>

<script setup>
const props = defineProps({
  title: String,
  content: String,
  index: Number,
});
</script>

<style>
.app-wrapper.monochrome .card-gradient-number-number{
  color: var(--text);
}


.app-wrapper.monochrome .card-gradient-number-number::before{
  background: none;
}

.app-wrapper.dark .card-gradient-number-number::before{
  background: none;
}

.card-gradient-number {
  background-color: var(--bg);
  border-radius: 20px;
  padding: 40px;
  display: flex;
  gap: 50px;
  transition: all 0.8s ease;
  justify-content: space-between;
}

.card-gradient-number-info {
  display: flex;
  flex-direction: column;
  gap: 20px;
  /* padding: 0 20px 0 0; */
}

.card-gradient-number-info-title {
  margin: 0;
  font-size: var(--h3);
  font-weight: 700;
  color: var(--text);
  line-height: var(--h3_lh);
}

.card-gradient-number-info p {
  margin: 0;
  font-size: var(--text_size);
  font-weight: 400;
  color: var(--text);
  line-height: var(--text_size_lh);
}

.card-gradient-number-number {
  font-size: 130px;
  margin: 0;
  font-weight: 800;
  display: flex;
  align-items: flex-end;
  margin-bottom: -40px;
  color: #c8c8c8;
  position: relative;
  transition: 0.8s;
}

.card-gradient-number-number::before {
  position: absolute;
  content: "";
  background: linear-gradient(0deg, var(--bg) 0.14%, rgba(245, 245, 245, 0) 87.92%);
  z-index: 10;
  height: 100%;
  width: 100%;
  transition: 0.8s;
  top: 0;
  left: 0;
}

.normal .card-gradient-number:hover .card-gradient-number-number {
  color: var(--accent);
}

.normal .card-gradient-number:hover .card-gradient-number-number::before {
  opacity: 0;
}

@media screen and (min-width: 1200px) and (max-width: 1600px) {
  .card-gradient-number{
    gap: 0;
  }

  .card-gradient-number-number{
    padding-left: 0px;
  }
}

@media screen and (max-width: 1200px) {
  .card-gradient-number-info-title{
    font-size: var(--h4);
    line-height: var(--h4_lh);
  }

  .card-gradient-number {
    display: grid;
    padding: 20px;
    gap: 10px;
  }

  .card-gradient-number-number {
    grid-row: 1;
    font-size: 40px;
    padding: 0px 0 10px 0;
    margin-bottom: -20px;
  }

  .app-wrapper.blue #changes-life .card-gradient-number-number::before{
    width: 0;
  }

  .card-gradient-number-number::before{
    height: 50px;
  }

  .card-gradient-number-info {
    gap: 10px;
  }
  .normal .card-gradient-number:hover .card-gradient-number-number::before {
    opacity: 1;
  }
  .normal .card-gradient-number:hover .card-gradient-number-number {
    color: #c8c8c8;
  }
}
</style>
