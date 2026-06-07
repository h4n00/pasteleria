import { createRouter, createWebHistory } from 'vue-router'
import IngredientesView from '../views/IngredientesView.vue'
import PastelesView from '../views/PastelesView.vue'
import PastelDetalleView from '../views/PastelDetalleView.vue'
import ReporteView from '../views/ReporteView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: '/ingredientes'
    },
    {
      path: '/ingredientes',
      name: 'ingredientes',
      component: IngredientesView
    },
    {
      path: '/pasteles',
      name: 'pasteles',
      component: PastelesView
    },
    {
      path: '/pastel/:id',
      name: 'pastel-detalle',
      component: PastelDetalleView
    },
    {
      path: '/reporte',
      name: 'reporte',
      component: ReporteView
    }
  ]
})

export default router