import Home from './pages/Home.vue';
import Login from './pages/auth/Login.vue';

export default [
    {
      path: '/',
      component: Home
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
    }
]
