<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const reporte = ref([])
onMounted(async () => {
  reporte.value = (await axios.get('http://localhost/pasteleria/backend/reporte.php')).data
})
</script>

<template>
  <h2>Reporte de Pasteles e Ingredientes</h2>
  <div v-for="p in reporte" :key="p.id_pastel" class="card">
    <h3>{{ p.nombre }}</h3>
    <p>{{ p.descripcion }} | <strong>Por:</strong> {{ p.preparado_por }}</p>
    <ul>
      <li v-for="ing in p.ingredientes">{{ ing.nombre }} - {{ parseFloat(ing.cantidad) }} {{ ing.unidad }}</li>
    </ul>
  </div>
</template>