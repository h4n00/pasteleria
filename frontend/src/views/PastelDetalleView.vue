<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

const route = useRoute()
const router = useRouter()
const id = route.params.id

const pastel = ref({})
const ingredientes = ref([])
const form = ref({ unidad: 'gramos' })

const cargar = async () => {
  pastel.value = (await axios.get(`http://localhost/pasteleria/backend/pasteles.php?id=${id}`)).data
  ingredientes.value = (await axios.get('http://localhost/pasteleria/backend/ingredientes.php')).data
}

const agregar = async () => {
  if (!form.value.id_ingrediente || !form.value.cantidad) return alert('Datos incompletos')
  await axios.post('http://localhost/pasteleria/backend/pastel_ingredientes.php', {
    ...form.value,
    id_pastel: id
  })
  form.value = { unidad: 'gramos' }
  cargar()
}

const quitar = async idRel => {
  if (!confirm('¿Quitar?')) return
  await axios.delete(`http://localhost/pasteleria/backend/pastel_ingredientes.php?id=${idRel}`)
  cargar()
}

onMounted(cargar)
</script>

<template>
  <button @click="router.push('/pasteles')">← Volver</button>
  <h2>{{ pastel.nombre }}</h2>
  <p>{{ pastel.descripcion }}</p>

  <h3>Agregar Ingrediente</h3>
  <div class="form">
    <select v-model="form.id_ingrediente">
      <option value="">-- Seleccionar --</option>
      <option v-for="i in ingredientes" :key="i.id_ingrediente" :value="i.id_ingrediente">{{ i.nombre }}</option>
    </select>
    <input type="number" v-model="form.cantidad" placeholder="Cantidad" step="0.01">
    <select v-model="form.unidad">
      <option value="gramos">gramos</option>
      <option value="ml">ml</option>
      <option value="unidades">unidades</option>
    </select>
    <button @click="agregar">Agregar</button>
  </div>

  <h3>Ingredientes</h3>
  <table>
    <thead><tr><th>Ingrediente</th><th>Cantidad</th><th>Unidad</th><th>Acción</th></tr></thead>
    <tbody>
      <tr v-for="ing in pastel.ingredientes" :key="ing.id_pastel_ingrediente">
        <td>{{ ing.nombre }}</td>
        <td>{{ parseFloat(ing.cantidad) }}</td>
        <td>{{ ing.unidad }}</td>
        <td><button @click="quitar(ing.id_pastel_ingrediente)">Quitar</button></td>
      </tr>
    </tbody>
  </table>
</template>