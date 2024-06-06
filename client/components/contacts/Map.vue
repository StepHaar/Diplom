<template>
  <div class="contact-maps">
    <yandex-map
      :settings="{
        location: {
          center,
          zoom,
        },
      }"
    >
      <YandexMapMarker :coords="center" :settings="markerIcon" :icon="markerIcon">
        <div class="marker">
          <svg
            width="30"
            height="46"
            viewBox="0 0 53 69"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M26.5 0.8125C19.4825 0.820461 12.7547 3.61168 7.79256 8.57381C2.83043 13.5359 0.0392109 20.2637 0.03125 27.2812C0.03125 49.9301 24.0938 67.0355 25.1194 67.7514C25.524 68.0348 26.006 68.1868 26.5 68.1868C26.994 68.1868 27.476 68.0348 27.8806 67.7514C28.9062 67.0355 52.9688 49.9301 52.9688 27.2812C52.9608 20.2637 50.1696 13.5359 45.2074 8.57381C40.2453 3.61168 33.5175 0.820461 26.5 0.8125ZM26.5 17.6562C28.4036 17.6562 30.2645 18.2207 31.8474 19.2784C33.4302 20.336 34.6638 21.8392 35.3923 23.5979C36.1208 25.3567 36.3114 27.2919 35.9401 29.159C35.5687 31.0261 34.652 32.7411 33.3059 34.0872C31.9598 35.4332 30.2448 36.3499 28.3777 36.7213C26.5107 37.0927 24.5754 36.9021 22.8167 36.1736C21.0579 35.4451 19.5547 34.2114 18.4971 32.6286C17.4395 31.0458 16.875 29.1849 16.875 27.2812C16.875 24.7285 17.8891 22.2804 19.6941 20.4753C21.4991 18.6703 23.9473 17.6563 26.5 17.6562Z"
              fill="#E32E2E"
            />
          </svg>
        </div>
      </YandexMapMarker>
      <yandex-map-default-scheme-layer />
      <yandex-map-default-features-layer />
    </yandex-map>
  </div>
</template>

<script setup>
import { YandexMap, YandexMapDefaultSchemeLayer, YandexMapMarker, YandexMapDefaultFeaturesLayer} from "vue-yandex-maps";
const center = [39.774697, 57.70908];
const zoom = 17;
const markerIcon = {
    layout: 'default#image',
    coordinates: [39.774697, 57.70908],
  }
</script>

<style scoped>
.contact-maps {
  border-radius: 10px;
  margin: 40px 0 0 0;
  width: 100%;
  /* height: calc(100vh - (120px * 2) - 40px - 172px); */
  height: 830px;
  border-radius: 20px;
  overflow: hidden;
}

.__ymap-marker_wrapper {
  position: relative;
}

.marker {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
}

@media screen and (max-width: 1550px) {
  .contact-maps {
    height: 530px;
  }
}

@media screen and (max-width: 1200px) {
  .contact-maps {
    height: 230px;
    margin: 20px 0 0 0;
  }
}
</style>
