<template>
    <div class="flex flex-col min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 font-sans">
        <h1>Hello world</h1>
    </div>
</template>

<script setup>
import {ref, onMounted, onBeforeUnmount, nextTick} from 'vue';
import {useRouter} from 'vue-router';
//import {useAuthStore} from '../Stores/auth';

const router = useRouter();
//const authStore = useAuthStore();
const initializing = ref(true);
const isScrolled = ref(false);

// Обработчик прокрутки страницы
// const handleScroll = () => {
//     isScrolled.value = window.scrollY > 50;
// };

// Обработчик выхода из системы
// const handleLogout = async () => {
//     await authStore.logout();
//     router.push({name: 'login'});
// };

// const redirectIfNeeded = async () => {
//     const currentRoute = router.currentRoute.value;
//
//     if (authStore.isAuthenticated &&
//         (currentRoute.name === 'login' || currentRoute.name === 'register')) {
//         router.push({name: 'get'});
//     }
//
//     // Если пользователь не авторизован и пытается получить доступ к защищенным маршрутам
//     if (!authStore.isAuthenticated && currentRoute.meta?.requiresAuth) {
//         router.push({name: 'login'});
//     }
//
//     if (authStore.isAuthenticated && currentRoute.meta?.requiresVerification) {
//         try {
//             const verificationStatus = await authStore.checkVerificationStatus();
//             if (verificationStatus && !verificationStatus.verified) {
//                 router.push({name: 'emailVerification'});
//             }
//         } catch (error) {
//             console.error('Error checking verification status:', error);
//         }
//     }
// };

// const unsubscribe = authStore.$subscribe((mutation, state) => {
//     if (mutation.events.key === 'token' || mutation.events.key === 'user') {
//         redirectIfNeeded();
//     }
// });

// onBeforeUnmount(() => {
//     unsubscribe();
//     window.removeEventListener('scroll', handleScroll);
// });
</script>
