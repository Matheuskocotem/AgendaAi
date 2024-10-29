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

const selectedEventIndex = ref(null)

const handleDateClick = (info) => {
  console.log('Data clicada:', info.dateStr)
  selectedDate.value = info.dateStr
  // Aqui você deve buscar os horários disponíveis para a data selecionada
  availableTimes.value = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00']
  showModal.value = true
  console.log('showModal:', showModal.value)
}

const handleEventClick = (info) => {
  const event = info.event
  selectedEventIndex.value = events.value.findIndex(e => e.start === event.start.toISOString().slice(0, 10))
  selectedDate.value = event.start.toISOString().slice(0, 10)
  availableTimes.value = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00']
  
  showModal.value = true
}

const saveReservation = (reservation) => {
  if (selectedEventIndex.value === null) {
    // Novo evento
    events.value.push({
      title: `${reservation.name} - Sala X`,
      start: `${reservation.date}T${reservation.startTime}`,
      end: `${reservation.date}T${reservation.endTime}`
    })
  } else {
    // Editando evento existente
    const event = events.value[selectedEventIndex.value]
    event.title = `${reservation.name} - Sala X`
    event.start = `${reservation.date}T${reservation.startTime}`
    event.end = `${reservation.date}T${reservation.endTime}`
  }
  
  showModal.value = false
  selectedEventIndex.value = null // Resetar o índice selecionado
}

const deleteEvent = () => {
  if (selectedEventIndex.value !== null) {
    events.value.splice(selectedEventIndex.value, 1)
    showModal.value = false
    selectedEventIndex.value = null
  }
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
      @delete="deleteEvent"
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