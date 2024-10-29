<template>
    <div class="visualizar-reunioes">
      <h1>Visualizar Reuniões</h1>
  
      <!-- Lista de reuniões -->
      <div v-if="reunioes.length > 0" class="reunioes-list">
        <div v-for="reuniao in reunioes" :key="reuniao.id" class="reuniao-card">
          <div class="reuniao-info">
            <h3>{{ reuniao.title }}</h3>
            <p><strong>Sala:</strong> {{ reuniao.room.name }}</p>
            <p><strong>Data e Hora:</strong> {{ new Date(reuniao.time).toLocaleString() }}</p>
          </div>
        </div>
      </div>
  
      <!-- Caso não haja reuniões -->
      <div v-else>
        <p>Não há reuniões agendadas.</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        reunioes: [
          { id: 1, title: "Reunião de Planejamento", room: { name: "Sala de Reuniões" }, time: "2024-10-20T10:00:00" },
          { id: 2, title: "Reunião de Equipe", room: { name: "Sala de Conferências" }, time: "2024-10-21T14:00:00" },
          { id: 3, title: "Reunião Executiva", room: { name: "Sala de Diretoria" }, time: "2024-10-22T09:00:00" },
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .visualizar-reunioes {
    padding: 20px;
  }
  
  .reunioes-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  
  .reuniao-card {
    background-color: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .reuniao-info h3 {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
  }
  
  .reuniao-info p {
    margin: 5px 0;
    color: #666;
  }
  
  .reuniao-info strong {
    color: #333;
  }
  </style>
  