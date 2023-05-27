import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/lista',
    name: 'lista',
    component: () => import('../views/ListaProdutosView.vue')
  },
  {
    path: '/ver/:id',
    name: 'ver',
    component: () => import('../views/VerProdutoView.vue'),
  },
  {
    path: '/novo/',
    name: 'novo',
    component: () => import('../views/CriarProdutoView.vue'),
  },
  {
    path: '/editar/:id',
    name: 'editar',
    component: () => import('../views/EditarProdutoView.vue'),
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
