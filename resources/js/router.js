import { createRouter, createWebHistory } from 'vue-router';
import Welcome from './pages/Welcome.vue';
import Play from './pages/Play.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'Welcome',
      component: Welcome
    },
    {
      path: '/play',
      name: 'Play',
      component: Play
    }
  ]
});

export default router;