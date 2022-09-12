<script lang="ts" setup>
    import {
        Icon
    } from '@iconify/vue'

    const {
        open,

    } = defineProps({
        open: {
            default: false
        },
    })

    const emits = defineEmits(['closeHandler'])

</script>

<template
>
    <div id="modal"  :class="['w-screen h-screen transition-all bg-black bg-opacity-40 duration-100 flex d justify-center  fixed left-0 top-0', open ? 'z-10' : ' -z-10 opacity-0 ']">
        
       <div :class="['modal-wrapper z-10 flex flex-col justify-between bg-white rounded-md m-6  transition-all duration-300 md:my-10 lg:w-1/3 md:w-1/3 w-full md:p-6 ', open ? 'scale-100' : 'scale-0'] ">
        <div>
            <header :class="['flex  items-center  justify-between']">
            <div class="modal-header text-gray-800 font-bold md:text-xl text-lg">
                <slot name="modal-header">
               
                </slot>
            </div>

            <button @click="emits('closeHandler')" class="text-gray-600 hover:text-gray-800 transition-all duration-300">
                <Icon class="text-xl" icon="ic:baseline-close"/>
            </button>
        </header>

        <main class="mt-4 w-full">
            <slot name="modal-content"></slot>
        </main>

        </div>
        <footer class="mt-5 w-full">
            <slot name="modal-footer"></slot>
        </footer>
       </div>
    </div>
</template>
