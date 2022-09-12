<script setup lang="ts">
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
// import HelloWorld from './components/HelloWorld.vue'
import Sidebar from './components/common/Sidebar.vue';
import Navigation from './components/common/Navigation.vue';
import { computed } from '@vue/reactivity';
import { useStore } from 'vuex';


const store = useStore()
const sidebarOpen = computed(() => store.getters['sidebarMod/getOpen'])

</script>

<template>
  <div id="app" class="relative">
      <div class="flex">
          <Sidebar />
          <Navigation />
          <div class="fixed  top-0 left-0 w-screen h-screen bg-white -z-10">

          </div>
          <main :class="['mt-16 relative z-100 transition-all w-full duration-300', sidebarOpen ? 'ml-20' : 'ml-64']">
            <router-view>
            </router-view>
          </main>
      </div>
  </div>
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
