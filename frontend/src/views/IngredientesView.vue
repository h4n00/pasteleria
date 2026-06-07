<script setup>
import { useCrud } from '../composables/useCrud'

const { lista: ingredientes, form, guardar, editar, eliminar, limpiar } = useCrud(
  'http://localhost/pasteleria/backend/ingredientes.php',
  'id_ingrediente'
)
</script>

<template>
  <h2>{{ form.id_ingrediente ? 'Editar' : 'Nuevo' }} Ingrediente</h2>
  <div class="form">
  <input v-model="form.nombre" placeholder="Nombre">
  <input v-model="form.descripcion" placeholder="Descripción">
  <label>Ingreso: <input type="date" v-model="form.fecha_ingreso"></label>
  <label>Vencimiento: <input type="date" v-model="form.fecha_vencimiento"></label>
  <button @click="guardar">{{ form.id_ingrediente ? 'Actualizar' : 'Agregar' }}</button>
  <button v-if="form.id_ingrediente" @click="limpiar">Cancelar</button>
</div>

  <h2>Lista</h2>
  <table>
    <thead>
      <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Ingreso</th><th>Vencimiento</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <tr v-for="i in ingredientes" :key="i.id_ingrediente">
        <td>{{ i.id_ingrediente }}</td>
        <td>{{ i.nombre }}</td>
        <td>{{ i.descripcion }}</td>
        <td>{{ i.fecha_ingreso }}</td>
        <td>{{ i.fecha_vencimiento }}</td>
        <td>
          <button @click="editar(i)">Editar</button>
          <button @click="eliminar(i.id_ingrediente)">Eliminar</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>