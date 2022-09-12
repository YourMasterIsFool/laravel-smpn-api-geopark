<script lang="ts" setup>
import TableComponent from '../../components/common/TableComponent.vue';
import Modal from '../../components/common/Modal.vue';
import { onBeforeMount, onMounted, reactive, ref } from 'vue';
import { useStore } from 'vuex';
import { computed } from '@vue/reactivity';
    
    const columns = [
        {
            selector: 'name',
            label: 'Nama'
        },
        {
            selector: 'nisn',
            label: 'NISN'
        },
        {
            selector: 'kelas',
            label: 'kelas'
        }
    ]

    const rows = [
        {
            nama: 'hahaha', 
            nisn: '03102381038032',
            kelas: 'hahah'
        },
        {
            nama: 'hahaha',
            alamat: 'Jl',
            no_hp: 'hahah'
        }
    ]

    const modalState = ref(false);
    const store = useStore()

    const siswaForm = reactive({
        name: '',
        kelas: '',
        nisn: ''
    }) 

    const input = ref();

    onMounted(() => {
        store.dispatch("userMod/setUserDispatch");
        console.log("hahas")
    })

    function validationForm(forms) {
        for(let key in forms) {
            if(forms[key] == '' ) {
                return false
            }
        }

        return true
    }
    function addSiswa() {
       
        if(validationForm(siswaForm)) {
            store.dispatch('userMod/addUserDispatch', siswaForm)
            .then((resp) => {
                modalState.value = false
            })
        }
        else{
            alert('please check inputan');
        }
    }

    const usersComp = computed(() => {
        return store.getters['userMod/users']
    });







</script>

<template>
    <div id="user-content" class="md:p-8 z-10 w-full p-8">
        <header class="mb-6 text-2xl font-semibold tracking-wide">
            User
        </header>
        <main>
            <div class="flex justify-end mb-4 ">
                <button @click="modalState = true" class="bg-blue-500 text-sm transition-all duration-300 hover:bg-blue-600 text-white px-6 py-2 flex items-center rounded-md">
                    Add User
                </button>
            </div>
            <TableComponent :rows="usersComp"  :columns="columns" :input="input"/>
            <Modal :open="modalState" @close-handler="modalState = false">
                <template v-slot:modal-header>
                    Create new user
                </template>
                <template v-slot:modal-content>
                    <div>
                        <div class="form-group mb-4">
                            <label for="" class="text-gray-800 md:text-base text-sm capitalize">
                                Nama
                            </label>
                            <input type="text" v-model="siswaForm.name" placeholder="Masukkan Nama.." class="w-full border-2 transition-all duration-100 border-gray-200 focus:border-black  mt-2 bg-gray-100 px-4 py-3 rounded-md text-gray-600 outline-none md:text-sm ">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="text-gray-800 md:text-base text-sm capitalize">
                                NISN
                            </label>
                            <input type="text" v-model="siswaForm.nisn" placeholder="Masukkan NISN..." class="w-full border-2 transition-all duration-100 border-gray-200 focus:border-black  mt-2 bg-gray-100 px-4 py-3 rounded-md text-gray-600 outline-none md:text-sm ">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="text-gray-800 md:text-base text-sm capitalize">
                                Masukkan Kelas
                            </label>
                            <input type="text" v-model="siswaForm.kelas" placeholder="Masukkan NISN..." class="w-full border-2 transition-all duration-100 border-gray-200 focus:border-black  mt-2 bg-gray-100 px-4 py-3 rounded-md text-gray-600 outline-none md:text-sm ">
                        </div>
                    </div>
                </template>
                <template v-slot:modal-footer>
                    <div class="flex justify-end ">
                        <button @click="addSiswa" class="bg-black text-white px-4 py-2 text-sm rounded-md ">
                            Submit
                        </button>
                    </div>
                </template>
            </Modal>
        </main>
    </div>
</template>

<style lang="postcss">
    
</style>