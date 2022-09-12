<script lang="ts" setup>
    import {
        Icon
    } from '@iconify/vue'
import { computed } from '@vue/reactivity';
import { useStore } from 'vuex';

    const store = useStore()

    function openSidebarHandler() {
        store.dispatch('sidebarMod/setOpen')
    }

    const sidebarOpen = computed(() => store.getters['sidebarMod/getOpen']);

    
</script>

<template>
    <div id="navigation" :class="[' fixed px-4 transition-all duration-300 shadow-md z-100 top-0', sidebarOpen ? 'w-[calc(100%_-_5rem)] ml-20' : 'w-[calc(100%_-_16rem)] ml-64'] "> 
        <div class="flex w-full justify-between items-center p-4 h-16">
            <div class="flex items-center">
                <div class="mobile-icon mr-2">
                    <Icon @click="openSidebarHandler"  v-if="!sidebarOpen" class="text-xl cursor-pointer text-gray-600 hover:text-gray-900 transition-all duration-300" icon="bx:menu-alt-left" />
                    <Icon @click="openSidebarHandler"  v-else class="text-xl cursor-pointer text-gray-600 hover:text-gray-900 transition-all duration-300" icon="eva:close-outline" />
                </div>
            </div>
            <div class="user-action">
                <ul class="flex items-center ">
                    <li>
                        admin
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>