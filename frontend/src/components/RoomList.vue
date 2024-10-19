<template>
    <div class="room-list">
      <h3>Salas Disponíveis</h3>
      <div class="room-card" v-for="room in rooms" :key="room.id">
        <h4>{{ room.name }}</h4>
        <p>Capacidade: {{ room.capacity }}</p>
        <button @click="selectRoom(room)">Selecionar Sala</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        rooms: [
          { id: 1, name: "Sala 1", capacity: 10 },
          { id: 2, name: "Sala 2", capacity: 15 },
          { id: 3, name: "Sala 3", capacity: 5 },
        ],
      };
    },
    methods: {
      selectRoom(room) {
        console.log("Sala Selecionada:", room);
      },
    },
  };
  </script>
  
  <style scoped>
  .room-list {
    margin-left: 300px; /* Ajustar o espaço para o menu lateral */
  }
  
  .room-card {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #fff;
  }
  </style>
  