<script setup>
import { ref } from 'vue'

const pastMeetings = ref([
  { id: 1, name: 'Reunião A', room: 'Sala 1', date: '2023-04-01', startTime: '09:00', endTime: '10:00' },
  { id: 2, name: 'Reunião B', room: 'Sala 2', date: '2023-04-05', startTime: '14:00', endTime: '15:00' }
])

const upcomingMeetings = ref([
  { id: 3, name: 'Reunião C', room: 'Sala 1', date: '2023-04-20', startTime: '10:00', endTime: '11:00' },
  { id: 4, name: 'Reunião D', room: 'Sala 3', date: '2023-04-25', startTime: '15:00', endTime: '16:00' }
])

const deleteMeeting = (meetingId) => {
  upcomingMeetings.value = upcomingMeetings.value.filter(meeting => meeting.id !== meetingId)
  
  // Aqui você deve enviar a solicitação de exclusão para o backend
}
</script>

<template>
  <div class="reunioes">
    <h1>Minhas Reuniões</h1>
    
    <h2>Próximas Reuniões</h2>
    <div class="meeting-list">
      <div v-for="meeting in upcomingMeetings" :key="meeting.id" class="meeting-card">
        <h3>{{ meeting.name }}</h3>
        <p>{{ meeting.room }}</p>
        <p>{{ meeting.date }} | {{ meeting.startTime }} - {{ meeting.endTime }}</p>
        <button @click="deleteMeeting(meeting.id)" class="delete-button">Excluir</button>
      </div>
    </div>
    
    <h2>Histórico de Reuniões</h2>
    <div class="meeting-list">
      <div v-for="meeting in pastMeetings" :key="meeting.id" class="meeting-card past">
        <h3>{{ meeting.name }}</h3>
        <p>{{ meeting.room }}</p>
        <p>{{ meeting.date }} | {{ meeting.startTime }} - {{ meeting.endTime }}</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
.reunioes {
  padding: 2rem;
}

h2 {
  margin-top: 2rem;
  margin-bottom: 1rem;
}

.meeting-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 2rem;
}

.meeting-card {
  background-color: #f3f4f6;
  padding: 1.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.meeting-card.past {
  opacity: 0.7;
}

.delete-button {
  margin-top: 1rem;
  padding: 0.5rem 1rem;
  background-color: #f44336;
  color: white;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
}
</style>