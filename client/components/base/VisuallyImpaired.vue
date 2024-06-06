<template>
  <div class="visually-grid">
    <div class="visually-impaired">
      <div class="visually-impaired-group size">
        <div class="visually-impaired-label">Размер шрифта:</div>
        <div class="visually-impaired-size-group">
          <div
            class="visually-impaired-size"
            :class="is_active_size == 'low_size' ? 'active' : ''"
            @click="switchSize('low_size')"
          >
            А
          </div>
          <div
            class="visually-impaired-size"
            :class="is_active_size == 'medium_size' ? 'active' : ''"
            @click="switchSize('medium_size')"
          >
            А
          </div>
          <div
            class="visually-impaired-size"
            :class="is_active_size == 'large_size' ? 'active' : ''"
            @click="switchSize('large_size')"
          >
            А
          </div>
        </div>
      </div>
      <div class="visually-impaired-group color">
        <div class="visually-impaired-label">Цвет сайта:</div>
        <div class="visually-impaired-color-group">
          <div
            class="visually-impaired-color"
            :class="is_active_theme == 'monochrome' ? 'active' : ''"
            @click="switchTheme('monochrome')"
          >
            А
          </div>
          <div
            class="visually-impaired-color"
            :class="is_active_theme == 'dark' ? 'active' : ''"
            @click="switchTheme('dark')"
          >
            А
          </div>
          <div
            class="visually-impaired-color"
            :class="is_active_theme == 'blue' ? 'active' : ''"
            @click="switchTheme('blue')"
          >
            А
          </div>
        </div>
      </div>
      <div class="visually-impaired-group visually-impaired-img">
        <div class="visually-impaired-label">Изображения</div>
        <n-switch
        :default-value="true"
          v-model:value="is_active_image"
          @update:value="switchImage(is_active_image)"

        />
      </div>
    </div>
    <div class="visually-impaired-reset-wrapper">
      <base-button @click="reset" class="visually-impaired-reset">
        Обычная версия сайта
      </base-button>
    </div>
  </div>
</template>

<script setup>
import { NSwitch } from "naive-ui";

const theme = useCookie("theme");
const size = useCookie("size");
const image = useCookie("image");

const is_active_size = ref(null);
is_active_size.value = size.value;

const is_active_theme = ref(null);
is_active_theme.value = theme.value;

const is_active_image = ref(null);
is_active_image.value = image.value;

function switchTheme(variant) {
  theme.value = variant;
  is_active_theme.value = variant;
}

function switchSize(variant) {
  size.value = variant;
  is_active_size.value = variant;
}

function switchImage(variant) {
  image.value = variant;
  is_active_image.value = variant;
}

function reset() {
	theme.value           = '';
	is_active_theme.value = '';
	size.value            = '';
	is_active_size.value  = '';
	image.value           = true;
	is_active_image.value = true;
}
</script>

<style>
.visually-grid{
  background-color: #ededed;
  display: grid;
  grid-template-columns: 5fr 1fr;
}

.visually-impaired-reset{
  display: flex;
  font-weight: 700;
  font-size: 18px;
  line-height: 24px;
  color: #2e2e2e;
  cursor: pointer;
  padding: 20px;
  border: 1px solid #2e2e2e;
  border-radius: 50px;

  position: absolute;
  width: max-content;
  right: 70px;
  top: 10px;

  justify-content: center;
}

/* .app-wrapper.dark .visually-impaired-size.active{
  border: 1px solid var(--bg);  
} */

.visually-impaired {
  padding: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  column-gap: 40px;
}

.visually-impaired-group {
  display: flex;
  align-items: flex-end;
  column-gap: 20px;
}

.visually-impaired-label {
  font-size: 16px;
  font-weight: 600;
  line-height: 24px;
  letter-spacing: 0.045em;
  text-align: left;
}

.visually-impaired-size-group,
.visually-impaired-color-group {
  column-gap: 9px;
  display: flex;
  align-items: flex-end;
  height: 50px;
}

.visually-impaired-size,
.visually-impaired-color {
  width: 33px;
  height: 34px;
  border-radius: 5px;
  color: #2e2e2e;
  font-size: 18px;
  font-weight: 700;
  line-height: 24px;
  letter-spacing: 0.045em;
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  position: relative;
  transition: .5s;
}

/* .visually-impaired-size::after,
.visually-impaired-color::after {
  content: "";
  transition: 0.5s;
  position: absolute;
  top: calc(100% + 4px);
  width: 0;
  height: 3px;
  background-color: #2e2e2e;
  border-radius: 5px;
}

.visually-impaired-size.active{ */
  /* width: 100%; */
  /* border: 1px solid var(--accent);
} */

.visually-impaired-size::after,
.visually-impaired-color::after {
	content: "";
	transition: 0.5s;
	position: absolute;
	top: calc(100% + 4px);
	width: 0;
	height: 3px;
	background-color: #2e2e2e;
}

.visually-impaired-size.active::after,
.visually-impaired-color.active::after  {
	width: 100%;
}

.normal .visually-impaired-size:hover:not(.active){
  background-color: var(--accent);
  color: #fff;
  transition: .5s;
}

.visually-impaired-color {
  width: 37px;
  height: 42px;
  font-size: 24px;
}

.visually-impaired-size:nth-of-type(2) {
  width: 37px;
  height: 42px;
  font-size: 24px;
}

.visually-impaired-size:nth-of-type(3) {
  width: 43px;
  height: 50px;
  font-size: 32px;
}

.visually-impaired-color:nth-of-type(2) {
  background-color: #2e2e2e;
  color: #fff;
}

.visually-impaired-color:nth-of-type(3) {
  background-color: #2E4E91;
  color: #fff;
} 

.visually-impaired-img {
  height: 50px;
  opacity: 1;
}

.visually-impaired-img.active {
  opacity: 0;
}

@media  screen and (min-width: 1200px) and (max-width: 1600px){
  .visually-grid{
    grid-template-columns: 3fr 1fr;
  }
}

@media  screen and (max-width: 700px){
  .visually-impaired-reset-wrapper{
    display: flex;
    justify-content: center;
  }

  .visually-grid{
    grid-template-columns: 1fr;
    /* grid-template-rows: 7fr 1fr; */
    grid-template-rows: 100px;
  }

  .visually-impaired-reset{
    /* top: 90px;
    left: 20px; */
    /* margin-bottom: 15px;   */
    font-size: 14px;
    line-height: 24px;
    padding: 15px;
    position: sticky;
    width: 100%;
    margin: 0 20px 15px 20px;
  }
  
  .visually-impaired {
    display: flex;
    justify-content: space-between !important;
    height: 170px;
    align-items: flex-start;
  }
}

@media screen and (max-width: 1200px) {

  .visually-impaired-reset{
    font-size: 14px;
    line-height: 24px;
  }

  .visually-impaired {
    justify-content: normal;
  }
  .visually-impaired-group.size {
    display: none;
  }
  .visually-impaired-group {
    align-items: center;
    justify-content: center;
    gap: 10px;
  }
  .visually-impaired-group.color {
    flex-direction: column;
    align-items: flex-start;
  }
  .visually-impaired-label {
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0.045em;
  }
  .visually-impaired-size,
  .visually-impaired-color {
    width: 30px;
    height: 30px;
    border-radius: 5px;
    font-size: 14px;
  }
  .visually-impaired-size:nth-of-type(2) {
    width: 30px;
    height: 30px;
    font-size: 14px;
  }

  .visually-impaired-size:nth-of-type(3) {
    width: 30px;
    height: 30px;
    font-size: 14px;
  }

  .visually-impaired-size-group,
  .visually-impaired-color-group {
    height: 30px;
  }
}
</style>
