<script lang="ts" setup>
    import {
        Icon
    } from '@iconify/vue'
import { computed } from '@vue/reactivity';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';

    const store = useStore()
    const sidebarOpen = computed(() => store.getters['sidebarMod/getOpen'])

    const router = useRouter();
</script>

<template>
    <div id="sidebar" :class="['fixed z-100 transition-all duration-300 h-screen w-64 py-6 px-3 bg-black',  sidebarOpen ? 'sidebar-hide' : '']">
        <ul class="flex flex-col">
            <li @click="router.push({
                name: 'user-index'  
            })">
                <Icon class="icon " icon="clarity:users-line" />
                <span>
                    User  
                </span>
            </li>
        </ul>
    </div>
</template>


<style lang="postcss" scoped>
    ul li {
        @apply delay-300 px-4 cursor-pointer flex items-center   transition-all capitalize duration-300 rounded-xl py-3 text-gray-400;
    }

    ul li:hover {
        @apply bg-white bg-opacity-10  text-white;
    }
    
    li .icon {
        @apply mr-4 text-xl
    }

    li span {
        @apply delay-300;
    }
   
    .sidebar-hide {
        @apply !w-20;
    }

    

    .sidebar-hide  li {
        @apply px-0
    }
    .sidebar-hide ul li span {
        @apply  !hidden;
    }

    .sidebar-hide ul li {
        @apply flex !flex-row !items-center !justify-center; 
    }

    .sidebar-hide .icon {
        @apply mr-0;
    }
   
   .sidebar-hide {
    @apply text-xl;
   }
</style>

