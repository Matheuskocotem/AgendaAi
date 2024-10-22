<script setup>
import { ref } from 'vue'
import ReservationModal from '@/components/ReservationModal.vue'

const rooms = ref([
  { id: 1, name: 'Sala 1', capacity: 10 },
  { id: 2, name: 'Sala 2', capacity: 8 },
  { id: 3, name: 'Sala 3', capacity: 15 }
])

const showModal = ref(false)
const selectedRoom = ref(null)
const availableTimes = ref([])

const openReservationModal = (room) => {
  selectedRoom.value = room
  // Aqui você deve buscar os horários disponíveis para a sala selecionada
  availableTimes.value = ['09:00', '10:00', '11:00', '14:00', '15:00', '16:00']
  showModal.value = true
}

const saveReservation = (reservation) => {
  console.log('Reserva salva:', { ...reservation, room: selectedRoom.value })
  showModal.value = false
  // Aqui você deve enviar a reserva para o backend e redirecionar para a página inicial
}
</script>

<template>
  <div class="salas">
    <h1>Salas Disponíveis</h1>
    <div class="room-list">
      <div v-for="room in rooms" :key="room.id" class="room-card">
        <h2>{{ room.name }}</h2>
        <p>Capacidade: {{ room.capacity }} pessoas</p>
        <button @click="openReservationModal(room)">Reservar</button>
      </div>
    </div>
    <ReservationModal
      :show="showModal"
      :date="new Date().toISOString().split('T')[0]"
      :availableTimes="availableTimes"
      @close="showModal = false"
      @save="saveReservation"
    />
  </div>
</template>

<style scoped>
.salas {
  padding: 2rem;
}

.room-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

.room-card {
  background-color: #f3f4f6;
  padding: 1.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

button {
  margin-top: 1rem;
  padding: 0.5rem 1rem;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
}
</style>