import {
    createRouter, createWebHistory
}
from 'vue-router'



const routes = [
   {
    path: '/users',
    name: "user-index",
    component:  () => import('./pages/user/index.vue')
   }
]

const router =createRouter({
    routes,
    history: createWebHistory()
})

export default router