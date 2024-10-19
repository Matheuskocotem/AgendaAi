<template>
    <div class="sidebar">
      <div class="sidebar-header">
        <span class="sidebar-title">Meeting Dashboard</span>
      </div>
      <ul>
        <li>
          <router-link to="/agendar" class="sidebar-item">
            <span class="icon">📅</span>
            Agendar Reunião
          </router-link>
        </li>
        <li>
          <router-link to="/visualizar" class="sidebar-item">
            <span class="icon">📊</span>
            Visualizar Reuniões
          </router-link>
        </li>
        <li v-if="isAdminOrModerator">
          <router-link to="/gerenciar-salas" class="sidebar-item">
            <span class="icon">🏢</span>
            Gerenciar Salas
          </router-link>
        </li>
        <li v-if="isAdmin">
          <router-link to="/gerenciar-usuarios" class="sidebar-item">
            <span class="icon">👥</span>
            Gerenciar Usuários
          </router-link>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      isAdmin: Boolean,
      isAdminOrModerator: Boolean,
    },
  };
  </script>
  
  <style scoped>
  /* Estilizando a Sidebar */
  .sidebar {
    width: 250px;
    background-color: #343a40;
    color: #fff;
    position: fixed;
    height: 100%;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    padding-top: 20px;
    box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
  }
  
  .sidebar-header {
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    text-align: center;
    background-color: #495057;
  }
  
  .sidebar-title {
    color: #ffffff;
  }
  
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  li {
    margin: 0;
  }
  
  .sidebar-item {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    text-decoration: none;
    color: #f8f9fa;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.2s ease;
  }
  
  .sidebar-item:hover {
    background-color: #495057;
  }
  
  .sidebar-item .icon {
    margin-right: 15px;
    font-size: 18px;
  }
  
  .sidebar-item.active {
    background-color: #007bff;
    color: #fff;
  }
  
  .sidebar-item.active .icon {
    color: #fff;
  }
  
  .sidebar-item:focus {
    outline: none;
  }
  </style>
  