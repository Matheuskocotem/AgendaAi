<script setup>
import { ref } from 'vue'
import Calendar from '@/components/Calendar.vue'
import ReservationModal from '@/components/ReservationModal.vue'

const events = ref([
  { title: 'Reunião A - Sala 1', start: '2023-04-10' },
  { title: 'Reunião B - Sala 2', start: '2023-04-15' }
])

const showModal = ref(false)
const selectedDate = ref('')
const availableTimes = ref([])

const handleDateClick = (info) => {
  selectedDate.value = info.dateStr
  // Aqui você deve buscar os horários disponíveis para a data selecionada
  availableTimes.value = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00']
  showModal.value = true
}

const handleEventClick = (info) => {
  // Implementar lógica para editar ou excluir evento
  console.log('Evento clicado:', info.event)
}

const saveReservation = (reservation) => {
  events.value.push({
    title: `${reservation.name} - Sala X`,
    start: `${reservation.date}T${reservation.startTime}`,
    end: `${reservation.date}T${reservation.endTime}`
  })
  showModal.value = false
  // Aqui você deve enviar a reserva para o backend
}
</script>

<template>
  <div class="dashboard">
    <h1>Dashboard</h1>
    <div class="calendar-container">
      <Calendar 
        :events="events"
        height="800px"

        @dateClick="handleDateClick"
        @eventClick="handleEventClick"
      />
    </div>
    <ReservationModal
      :show="showModal"
      :date="selectedDate"
      :availableTimes="availableTimes"
      @close="showModal = false"
      @save="saveReservation"
    />
  </div>
</template>

<style scoped>
.dashboard {
  height: 100%;
}

.calendar-container {
  height: 65vh;
  margin-top: 2rem;
}
</style>