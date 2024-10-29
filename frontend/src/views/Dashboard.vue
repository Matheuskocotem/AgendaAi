<template>
  <div class="dashboard">
    <!-- Sidebar/Menu Lateral -->
    <Sidebar :isAdmin="isAdmin" :isAdminOrModerator="isAdminOrModerator" />

    <!-- Conteúdo principal -->
    <div class="main-content">
      <!-- Exibindo o calendário -->
      <div class="calendar-section">
        <Calendar />
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "@/components/Sidebar.vue"; // Componente do Menu Lateral
import Calendar from "@/components/Calendar.vue"; // Componente de Calendário

export default {
  components: {
    Sidebar,
    Calendar,
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
.dashboard {
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

.calendar-section {
  flex: 3; /* O calendário ocupa a maior parte da tela */
  padding: 10px;
}
</style>
