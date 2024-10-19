<template>
  <div class="calendar-container">
    <vue-cal
      :events="events"
      :time="true"
      :disable-prev="true"
      :disable-next="true"
      event-color="#007bff"
    />
  </div>
</template>

<script>
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";

export default {
  components: {
    VueCal,
  },
  data() {
    return {
      events: [
        { start: "2024-10-21T09:00:00", end: "2024-10-21T10:00:00", title: "Reunião A" },
        { start: "2024-10-21T14:00:00", end: "2024-10-21T15:00:00", title: "Reunião B" },
      ],
    };
  },
};
</script>

<style scoped>
.calendar-container {
  margin-left: 300px; /* Ajustar o espaço para o menu lateral */
  padding: 20px;
}
</style>
