<template>
    <div class="agendar-reuniao">
      <h1>Agendar Reunião - Sala: {{ room.name }}</h1>
  
      <!-- Formulário para agendar reunião -->
      <form @submit.prevent="handleSchedule">
        <div class="form-group">
          <label for="meetingTitle">Título da Reunião</label>
          <input type="text" id="meetingTitle" v-model="meetingTitle" required placeholder="Insira o título da reunião" />
        </div>
        <div class="form-group">
          <label for="meetingTime">Horário</label>
          <input type="datetime-local" id="meetingTime" v-model="meetingTime" required />
        </div>
        <button type="submit">Agendar Reunião</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        room: {}, // Sala atual
        meetingTitle: "", // Título da reunião
        meetingTime: "", // Data e hora da reunião
      };
    },
    created() {
      const roomId = this.$route.params.roomId; // Obtém o ID da sala da URL
      this.room = this.getRoomById(roomId); // Simula a recuperação da sala
    },
    methods: {
      getRoomById(id) {
        const rooms = [
          { id: 1, name: "Sala de Conferências" },
          { id: 2, name: "Sala de Reuniões" },
          { id: 3, name: "Sala de Diretoria" },
        ];
        return rooms.find(room => room.id === parseInt(id));
      },
      handleSchedule() {
        // Aqui você integraria com a API para agendar a reunião
        alert(`Reunião agendada para ${this.meetingTime} na ${this.room.name} com o título: ${this.meetingTitle}`);
        this.$router.push('/dashboard'); // Redireciona para a dashboard após o agendamento
      },
    },
  };
  </script>
  
  <style scoped>
  .agendar-reuniao {
    padding: 20px;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  input {
    padding: 10px;
    font-size: 16px;
    width: 100%;
    margin-top: 5px;
  }
  
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  </style>
  