import { ref, onMounted } from 'vue'
import axios from 'axios'

export function useCrud(url, idCampo) {
  const lista = ref([])
  const form = ref({})

  const cargar = async () => lista.value = (await axios.get(url)).data

  const guardar = async () => {
    form.value[idCampo]
      ? await axios.put(url, form.value)
      : await axios.post(url, form.value)
    form.value = {}
    cargar()
  }

  const editar = item => form.value = { ...item }

  const eliminar = async id => {
    if (!confirm('¿Eliminar?')) return
    await axios.delete(`${url}?id=${id}`)
    cargar()
  }

  const limpiar = () => form.value = {}

  onMounted(cargar)

  return { lista, form, cargar, guardar, editar, eliminar, limpiar }
}