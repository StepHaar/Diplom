<template>
  <section id="schedule">
    <div class="container wrapper-padding">
      <div class="mounth mobile">
        <h2 class="m-title">Расписание</h2>
        <button class="month-btn">{{ data?.group }}</button>
      </div>
      <div class="month">
        <h3 class="month-title">{{ cur_month }}</h3>  
        <button class="month-btn">{{ data?.group }}</button>
      </div>
      <!-- {{ data?.group }} -->
      <!-- {{ json_data }} -->
      <!-- {{ data[0]?.group }} -->
      <div class="cards">
        <div
          class="cards-calendar"
          :class="{ current_day: item?.now, weekend: item?.is_weekend, out_month: !(getMonth(item?.date) != cur_month_num)}"
          v-for="item in data?.schedules"
        >
          <div class="cards-calendar-date">
            <p class="cards-calendar-date-week" >{{ curWeekDay(item?.date) }}</p>
            <p class="cards-calendar-date-day">{{ item?.date.slice(-2) }}</p>
          </div>
          <a :href="item?.lesson?.slug" class="cards-calendar-text">{{ item?.lesson?.type }}</a>
        </div>
      </div>

      <div class="cal-card" >
        <div class="card-calendar">
          <div class="card-calendar-header">
            <span>
              <ph-arrow-left :size="14" color="var(--lock-text)"/>
              <ph-caret-left :size="14" color="var(--lock-text)" />
            </span>
            <p class="card-navig-year">{{ cur_month }} {{ cur_year }}</p>
            <span>
              <ph-caret-right :size="14" color="var(--lock-text)" />
              <ph-arrow-right :size="14" color="var(--lock-text)" />
            </span>
          </div>
          <div class="card-week">
            <p class="card-week-wday">пн</p>
            <p class="card-week-wday">вт</p>
            <p class="card-week-wday">ср</p>
            <p class="card-week-wday">чт</p>
            <p class="card-week-wday">пт</p>
            <p class="card-week-wday">сб</p>
            <p class="card-week-wday">вс</p>
          </div>
          <div class="card-day">
            <p
              v-for="(item, index) in data?.schedules"
              :key="item?.date.slice(-2)"
              class="card-day-day"
              :class="[is_day == index ? 'current-day':'', !(getMonth(item?.date) != cur_month_num) ? 'out_month':'']"
              @click= "changeDate(index);"
            >
              {{ item?.date.slice(-2) }}
            </p>
          </div>
        </div>
        <div class="card-info" >
          <div class="card-info-title" >
            <svg
              width="10"
              height="11"
              viewBox="0 0 10 11"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M4.89642 3.1647C3.75416 3.1647 2.82486 4.09401 2.82486 5.23626C2.82486 6.37852 3.75417 7.30782 4.89642 7.30782C6.03868 7.30782 6.96798 6.37851 6.96798 5.23626C6.96798 4.094 6.03867 3.1647 4.89642 3.1647ZM4.89642 0.339844C7.60064 0.339844 9.79284 2.53205 9.79284 5.23626C9.79284 7.94048 7.60063 10.1327 4.89642 10.1327C2.19221 10.1327 0 7.94047 0 5.23626C0 2.53205 2.19221 0.339844 4.89642 0.339844Z"
                fill="#3947F4"
              />
            </svg>
            <div>
              <p id="current-date" class="card-info-title-text">
              {{ is_event_day }}
              </p>
            </div>  
          </div>
          <div class="card-info-class" >
            <a :href="item?.lesson?.slug" class="card-info-class-text">{{ is_selected_event }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>

const props = defineProps({
  data: null,
});

import {PhArrowLeft,PhArrowRight,PhCaretLeft, PhCaretRight} from '@phosphor-icons/vue'
import { format } from "date-fns";
import {ru} from "date-fns/locale";

const is_day = ref(new Date().getDay() - 1)
const is_event_day = ref(null)
const is_selected_event = ref(null)

watch(props,(new_value) => {
  if (new_value?.data){
    let selected_day = new Date(props?.data?.schedules[is_day.value].date)
    is_event_day.value = format(selected_day, "dd MMMM, EEEE", {locale:ru});
    is_selected_event.value = props?.data?.schedules[is_day.value].lesson?.type
  }
});


function getMonth(date) {
  var dt = new Date(date);
  return dt.getMonth();
}

const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

const cur_month_num = new Date().getMonth() + 1;

const cur_month = ref(months[new Date().getMonth()]);


function curWeekDay(date) {
  const this_day = new Date(date);
  const day = this_day.getDay();
  const day_names = ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"];
  return day_names[day];
}

const cur_year = new Date().getFullYear();

function changeDate(index) {
  is_day.value = index;
  let selected_day = new Date(props?.data?.schedules[is_day.value].date)
  is_event_day.value = format(selected_day, "dd MMMM, EEEE", {locale:ru});
  is_selected_event.value = props?.data?.schedules[is_day.value].lesson?.type
}

const formatDate = (day) => {
  return format(new Date(parseInt(day) * 1000), "dd");
};

const currentDay = (day) => {
  let current_day = new Date().getTime();
  if (current_day >= day * 1000 && current_day < day * 1000 + 86400000) {
    return true;
  } else {
    return false;
  }
};

const currentMonth = (day) => {
  return new Date(day * 1000).getMonth() == new Date().getMonth()
}

const isWeekend = (day) => {
  return new Date(day * 1000).getDay() === 0 || new Date(day * 1000).getDay() === 6;
};

</script>

<style scoped>
/* .app-wrapper.blue #schedule{
  background-color: var(--text);
} */

.card-calendar-header span{
  display: flex;
  gap:5px;
}

.card-calendar-header{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 10px;
}

.app-wrapper.monochrome #schedule .card-info-title svg path,
.app-wrapper.dark #schedule .card-info-title svg path,
.app-wrapper.blue #schedule .card-info-title svg path{
  fill: var(--text);
}


.app-wrapper.blue #schedule .cards-calendar.out_month.weekend .cards-calendar-date-day {
  color: var(--lock-text);
}

.app-wrapper.dark #schedule .current_day .cards-calendar-date-day,
.app-wrapper.monochrome #schedule .current_day .cards-calendar-date-day {
  background-color: var(--text);
}

.app-wrapper.dark #schedule .cards-calendar.out_month,
.app-wrapper.dark #schedule .cards-calendar.out_month .cards-calendar-text,
.app-wrapper.monochrome #schedule .cards-calendar.out_month,
.app-wrapper.monochrome #schedule .cards-calendar.out_month .cards-calendar-text{
  color: var(--bg);
  background-color: var(--lock-text);
  border: 1px solid var(--lock-text);
}
.app-wrapper.dark #schedule .cards-calendar,
.app-wrapper.monochrome #schedule .cards-calendar{
  border: 1px solid var(--lock-text);
  color: var(--text);
}
.app-wrapper.dark #schedule .cards-calendar-text,
.app-wrapper.monochrome #schedule .cards-calendar-text{
  color: var(--text);
}
.app-wrapper.dark #schedule .m-title,
.app-wrapper.dark #schedule .month-title{
  color: var(--accent);
}

.app-wrapper.dark #schedule .current_day .cards-calendar-text,
.app-wrapper.monochrome #schedule .current_day .cards-calendar-text{
  border: 1px solid var(--text);
  background-color: var(--text);
  color: var(--bg);
}
.app-wrapper.dark #schedule .month-btn,
.app-wrapper.monochrome #schedule .month-btn{
  border: 1px solid var(--text);
  background-color: var(--text);
  color: var(--bg);
}


.app-wrapper.blue #schedule .current_day .cards-calendar-date-day {
  background-color: var(--text);
}

.app-wrapper.blue #schedule .cards-calendar.out_month,
.app-wrapper.blue #schedule .cards-calendar.out_month .cards-calendar-text{
  color: var(--lock-text);
  background-color: var(--lock);
  border: 1px solid var(--lock);
}
.app-wrapper.blue #schedule .cards-calendar{
  border: 1px solid var(--lock-text);
  color: var(--text);
}
.app-wrapper.blue #schedule .cards-calendar-text{
  color: var(--text);
}
.app-wrapper.blue #schedule .m-title,
.app-wrapper.blue #schedule .month-title{
  color: var(--text);
}

.app-wrapper.blue #schedule .current_day .cards-calendar-text{
  border: 1px solid var(--text);
  background-color: var(--text);
  color: var(--bg);
}
.app-wrapper.blue #schedule .month-btn{
  border: 1px solid var(--text);
  background-color: var(--text);
  color: var(--bg);
}

.app-wrapper.large_size #schedule .current_day .cards-calendar-date-day,
.app-wrapper.large_size #schedule .cards-calendar-date-day {
  width: 80px;
  height: 80px;
}
.app-wrapper.medium_size #schedule .current_day .cards-calendar-date-day,
.app-wrapper.medium_size #schedule .cards-calendar-date-day{
  width: 70px;
  height: 70px;
}

.highlighted {
  background-color: var(--accent);
}
#schedule {
  position: relative;
  width: 100%;
  height: 100%;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  background-color: var(--bg);
  z-index: 1;
}

.m-title {
  margin-bottom: 40px;
  color: var(--text);
  text-transform: uppercase;
  font-size: var(--h2);
  line-height: var(--h2_lh);
}

.mounth.mobile button.month-btn {
  display: none;
}

.month {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.card-info-class-text {
  font-size: var(--text_size);
  font-weight: 400;
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
}

.month-title {
  color: var(--text);
  font-size: var(--h3);
  font-weight: 700;
  line-height: var(--h3_lh);
  letter-spacing: 0.045em;
  margin: 0 0 20px 0;
}

.month-btn {
  font-size: var(--text_size_min);
  font-weight: 600;
  line-height: var(--text_size_min_lh);
  letter-spacing: 0.045em;
  color: var(--accent);
  background-color: var(--bg);
  border: 1px solid var(--accent);
  border-radius: 50px;
  width: 97px;
  height: 26px;
}

.cards {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 20px;
  width: 100%;
}

.cards-calendar {
  display: flex;
  flex-direction: column;
  border-radius: 20px;
  border: 1px solid var(--lock);
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  width: 100%;
  height: 237px;
  color: var(--text);
}

.cards-calendar-date-week {
  font-size: var(--text_size);
  font-weight: 400;
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
  text-align: center;
  text-transform: uppercase;
  margin-bottom: 5px;
}

.cards-calendar-date-day {
  font-size: var(--h3);
  font-weight: 700;
  line-height: var(--h3_lh);
  letter-spacing: 0.045em;
  text-align: center;
  margin-top: 0;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.current_day .cards-calendar-date-day {
  color: var(--bg);
  background-color: #3947f4;
  border-radius: 50%;
}

.cards-calendar.out_month {
  color: var(--lock-text);
  background-color: var(--lock);
}

.cards-calendar-text {
   font-size: var(--text_size);
  font-weight: 400;
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
  text-align: center;
}

.current_day .cards-calendar-text {
   font-size: var(--text_size);
  font-weight: 400;
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
  border: 1px solid #3947f4;
  border-radius: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
}

.normal .cards-calendar-text:hover {
  color: var(--text);
}

.weekend .cards-calendar-date-day {
  color: var(--lock-text);
}

.cards-calendar.out_month.weekend .cards-calendar-date-day {
  color: var(--bg);
}

.current-day {
  background-color: var(--accent);
	color: white !important;
  height: 100%;
  width: 100%;
	padding: 4px 6px 4px 6px;
	gap: 8px;
	border-radius: 30px;
}
.cal-card {
  display: none;
}

.card-day-day {
  padding: 8px 13px;
  font-size: var(--text_size_min);
  font-weight: 600;
  line-height: var(--text_size_min_lh);
  letter-spacing: 0.045em;
  text-align: center;
}
.card-day-day.out_month {
  color: var(--lock-text);
}
.card-calendar {
  display: flex;
  flex-direction: column;
  border-radius: 20px;
  border: 1px solid var(--lock);
  padding: 10px 20px 20px 20px;
}

.card-navig-year {
  font-size: var(--text_size);
  font-weight: 600;
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
  text-align: center;
  color: var(--accent);
}

.card-week {
  display: flex;
  justify-content: space-around;
  gap: 15px;
  border-bottom: 1px solid var(--lock);
}

.card-week-wday {
  font-size: var(--text_size_min);
  font-weight: 700;
  line-height: var(--text_size_min_lh);
  letter-spacing: 0.045em;
  text-align: center;
  color: var(--lock-text);
}

.card-day {
  display: grid;
  row-gap: 4px;
  grid-template-columns: repeat(7, 1fr);
  padding-top: 4px;
}

.card-info {
  border-radius: 20px;
  border: 1px solid var(--accent);
  padding: 20px;
}

.card-info-title {
  display: flex;
  align-items: center;
  gap: 10px;
}

.card-info-title-text {
  font-size: var(--text_size_min);
  font-weight: 600;
  line-height: var(--text_size_min_lh);
  letter-spacing: 0.045em;
  text-align: center;
  color:var(--lock-text);
}

.card-info-class p {
  font-size: var(--text_size);
  font-weight: 400;
  line-height: var(--text_size_lh);
  letter-spacing: 0.045em;
  margin-top: 10px;
  color: var(--text);
}

.normal .card-info-class-text:hover {
  color:var(--text);
}

@media screen and (max-width: 1550px) {
  .cards {
    gap:15px;
  }
  .cards-calendar {
    padding: 15px;
  }

  #schedule .wrapper-padding {
    padding: 120px 60px;
  }
  
}
@media screen and (max-width: 1480px) {
  .cards {
    gap:10px;
  }
  .cards-calendar {
    padding: 10px;
    height: 215px;
  }
  .current_day .cards-calendar-text {
    padding: 5px;
  }
  #schedule .wrapper-padding {
    padding: 120px 50px;
  }
}

@media screen and (max-width: 1380px) {
  .cards-calendar {
    padding: 5px;
    height: 200px;
  }
  #schedule .wrapper-padding {
    padding: 80px 20px;
  }
  
}

@media screen and (max-width: 1200px) {
  .card-day-day{
    color: var(--text);
  }
  /* .app-wrapper.dark .card-day-day{
    color: var(--lock);
  } */
  .app-wrapper.dark .current-day{
    color: var(--bg) !important;
  }

  .app-wrapper.dark .card-calendar{
    border: 1px solid var(--lock-text);
  }
  
  .app-wrapper.dark .card-week{
    border-bottom: 1px solid var(--lock-text);
  }
  
  .card-week{
    padding-bottom: 8px;
  }

  .app-wrapper.monochrome .card-navig-year{
    color: var(--text);
  }

  .app-wrapper.blue .card-navig-year{
    color: var(--text);
  }

  #schedule h2 {
    font-size: var(--h2);
    line-height: 32px;
  }
  .mounth.mobile {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 20px;
  }
  .mounth.mobile button.month-btn {
    display: block;
  }
  .month-btn {
    display: none;
  }
  .month-title {
    display: none;
  }
  .cards {
    display: none;
  }

  .cal-card {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  .m-title {
    margin-bottom: 0px;
  }
}
@media screen and (max-width: 440px) {
  .card-day-day{
    padding: 8px 8px;
  }
}
@media screen and (max-width: 380px) {
  /* .card-day-day{
    padding: 4px 4px;
  } */
}
</style>
