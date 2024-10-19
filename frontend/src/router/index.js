import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/dashboard",
      name: "dashboard",
      component: () => import('../views/Dashboard.vue'),
    },
    {
      path: "/dashboard/escolher-sala",
      name: "escolher-sala",
      component: () => import('../views/EscolherSala.vue'),
    },
    {
      path: "/dashboard/agendar-reuniao/:roomId",  // Rota para agendar reunião, com parâmetro da sala
      name: "agendar-reuniao",
      component: () => import('../views/AgendarReuniao.vue'),
    },
    {
      path: "/dashboard/visualizar-reunioes",  // Rota para visualizar reuniões
      name: "visualizar-reunioes",
      component: () => import('../views/VisualizarReunioes.vue'),
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Login.vue'),
      meta: {
        title: 'Login'
      }
    }
  ]
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title;
  next();
});

export default router
