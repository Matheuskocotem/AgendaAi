import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Home from '../views/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      meta: {
        title: 'Home'
      }
    },
    {
      path: "/dashboard/escolher-sala",
      name: "escolher-sala",
      component: () => import('../views/EscolherSala.vue'),
    },
    {
      path: "/dashboard/escolher-sala2",
      name: "escolher-sala",
      component: () => import('../views/MeetingRoomDashboard.vue'),
    },
    {
      path: "/dashboard/agendar-reuniao/:roomId", 
      name: "agendar-reuniao",
      component: () => import('../views/AgendarReuniao.vue'),
    },
    {
      path: "/dashboard/visualizar-reunioes",  
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
