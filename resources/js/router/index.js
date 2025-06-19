import { createRouter, createWebHistory } from 'vue-router';
import App from "../components/App.vue";

const routes = [
    {
        path: '/',
        name: 'personalOffice',
        component: App,
        meta: {
            requiresAuth: true,
            requiresVerification: true
        }
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});


export default router;
