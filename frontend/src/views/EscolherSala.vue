<template>
    <div class="choose-room">
      <!-- Sidebar/Menu Lateral -->
      <Sidebar :isAdmin="isAdmin" :isAdminOrModerator="isAdminOrModerator" />
  
      <!-- Conteúdo Principal -->
      <div class="main-content">
        <!-- Exibindo a lista de salas -->
        <div class="room-list-section">
          <RoomList />
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Sidebar from "@/components/Sidebar.vue"; // Componente do Menu Lateral
  import RoomList from "@/components/RoomList.vue"; // Componente da Lista de Salas
  
  export default {
    components: {
      Sidebar,
      RoomList,
    },
    data() {
      return {
        isAdmin: true, // Supondo que o usuário é administrador (você pode ajustar conforme necessário)
        isAdminOrModerator: true, // Supondo que o usuário é moderador ou administrador
      };
    },
  };
  </script>
  
  <style scoped>
  .choose-room {
    display: flex;
    height: 100vh; /* Faz o layout ocupar toda a altura da tela */
  }
  
  .main-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    padding: 20px;
    background-color: #f0f2f5;
  }
  
  .room-list-section {
    flex: 1; /* A lista de salas ocupa toda a área */
    padding: 10px;
    background-color: #fff;
    margin-top: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  </style>
  