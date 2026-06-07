<script setup>
import { useCrud } from '../composables/useCrud'
import { useRouter } from 'vue-router'

const router = useRouter()
const { lista: pasteles, form, guardar, editar, eliminar, limpiar } = useCrud(
  'http://localhost/pasteleria/backend/pasteles.php',
  'id_pastel'
)
</script>

<template>
  <h2>{{ form.id_pastel ? 'Editar' : 'Nuevo' }} Pastel</h2>
  <div class="form">
  <input v-model="form.nombre" placeholder="Nombre">
  <input v-model="form.descripcion" placeholder="Descripción">
  <input v-model="form.preparado_por" placeholder="Preparado por">
  <label>Creación: <input type="date" v-model="form.fecha_creacion"></label>
  <label>Vencimiento: <input type="date" v-model="form.fecha_vencimiento"></label>
  <button @click="guardar">{{ form.id_pastel ? 'Actualizar' : 'Agregar' }}</button>
  <button v-if="form.id_pastel" @click="limpiar">Cancelar</button>
</div>

  <h2>Lista</h2>
  <table>
    <thead>
      <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Preparado por</th><th>Creación</th><th>Vencimiento</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <tr v-for="p in pasteles" :key="p.id_pastel">
        <td>{{ p.id_pastel }}</td>
        <td>{{ p.nombre }}</td>
        <td>{{ p.descripcion }}</td>
        <td>{{ p.preparado_por }}</td>
        <td>{{ p.fecha_creacion }}</td>
        <td>{{ p.fecha_vencimiento }}</td>
        <td>
          <button @click="router.push(`/pastel/${p.id_pastel}`)">Ingredientes</button>
          <button @click="editar(p)">Editar</button>
          <button @click="eliminar(p.id_pastel)">Eliminar</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>