import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/invoices',
      name: 'Invoices'
    },
    {
      path: '/companies',
      name: 'Companies',
    },
    {
      path: '/contacts',
      name: 'Contacts',
    }
  ],
})

export default router
