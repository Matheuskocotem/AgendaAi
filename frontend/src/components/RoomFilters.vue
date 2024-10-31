<template>
    <div class="bg-white p-4 rounded-lg shadow">
      <h2 class="text-xl font-semibold mb-4">Filtros</h2>
      
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Capacidade Mínima</label>
        <select v-model="filters.capacity" @change="emitFilters" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          <option value="">Qualquer</option>
          <option v-for="capacity in capacities" :key="capacity" :value="capacity">
            {{ capacity }} pessoas
          </option>
        </select>
      </div>
      
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Recursos</label>
        <div v-for="resource in resources" :key="resource" class="flex items-center">
          <input 
            type="checkbox" 
            :id="resource" 
            :value="resource" 
            v-model="filters.resources"
            @change="emitFilters"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
          >
          <label :for="resource" class="ml-2 text-sm text-gray-600">{{ resource }}</label>
        </div>
      </div>
      
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Horário Disponível</label>
        <select v-model="filters.availableTime" @change="emitFilters" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          <option value="">Qualquer</option>
          <option v-for="time in availableTimes" :key="time" :value="time">{{ time }}</option>
        </select>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, watch } from 'vue'
  
  const props = defineProps({
    capacities: Array,
    resources: Array
  })
  
  const emit = defineEmits(['update-filters'])
  
  const filters = ref({
    capacity: '',
    resources: [],
    availableTime: ''
  })
  
  const availableTimes = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00']
  
  const emitFilters = () => {
    emit('update-filters', filters.value)
  }
  
  watch(filters, emitFilters, { deep: true })
  </script>