<template>
    <div class="min-h-screen bg-gray-100 p-4 md:p-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Salas de Reunião</h1>
      
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Lista de Salas -->
        <div class="md:col-span-3">
          <RoomList 
            :rooms="filteredRooms" 
            @open-reservation="openReservationModal"
          />
        </div>
      </div>
  
      <!-- Modal de Reserva -->
      <ReservationModal 
        v-if="showReservationModal"
        :room="selectedRoom"
        @close="closeReservationModal"
        @submit="submitReservation"
      />
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue'
  import RoomList from '../components/RoomList.vue'
  import ReservationModal from '../components/ReservationModal.vue'
  
  // Dados mockados
  const rooms = ref([
    { id: 1, name: 'Sala Executiva', capacity: 10, resources: ['Projetor', 'Quadro Branco'], availableSlots: ['09:00', '11:00', '14:00'] },
    { id: 2, name: 'Sala de Brainstorming', capacity: 6, resources: ['Quadro Branco'], availableSlots: ['10:00', '13:00', '15:00'] },
    { id: 3, name: 'Sala de Conferência', capacity: 20, resources: ['Projetor', 'Videoconferência'], availableSlots: ['09:00', '14:00', '16:00'] },
    { id: 4, name: 'Sala Pequena', capacity: 4, resources: ['TV'], availableSlots: ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00'] },
  ])
  
  const capacities = [4, 6, 10, 20]
  const resources = ['Projetor', 'Quadro Branco', 'Videoconferência', 'TV']
  
  
  // Lógica do modal de reserva
  const showReservationModal = ref(false)
  const selectedRoom = ref(null)
  
  const openReservationModal = (room) => {
    selectedRoom.value = room
    showReservationModal.value = true
  }
  
  const closeReservationModal = () => {
    showReservationModal.value = false
    selectedRoom.value = null
  }
  
  const submitReservation = (reservationData) => {
    console.log('Reserva submetida:', reservationData)
    // Aqui você implementaria a lógica para enviar a reserva para o backend
    closeReservationModal()
  }
  </script>