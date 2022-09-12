<script lang="ts" setup>
import { computed,ref } from 'vue';
import { onBeforeMount, onMounted, watch, watchEffect } from 'vue';


const props  = defineProps({
    columns: null,
    rows:{
        required: true,
        default: []
    },
    input : {
        default: ''
    }
})


const rowsComp = computed(() => {
    const rowsMap = props.rows.map((item:any) => {
       
        let selectors:any[] =[]

        props.columns.forEach((col:any) => {
            if(col.selector in item) {
               selectors.push(item[col.selector])
            }
        })

        return {
            'selectors' : selectors
        }
    })

    return rowsMap
})

const inputComp = computed(() => {
    return props.input
})

// onMounted(() => {
//     if(rowsComp.value.length == 0) {
//         rowsFuct()
//     }
// })


</script>

<template>

 
    <div id="table-component" class="w-full relative ">
        <div class="table-header w-full bg-black bg-opacity-90 text-white">  
            <ul class="flex items-center"> 
                <li v-for="col in columns" class="flex-1 font-semibold capitalize py-4 px-4"> 
                    {{col.label}}
                </li>
            </ul>
        </div>
        <div class="table-body w-full">  
           <div v-for="(row, index) in rowsComp"  :class="['flex flex-col', index % 2 == 0 ? '' : 'bg-gray-100' ]">
                <ul class="flex items-center">
                    <li class="flex-1 z-0 text-sm py-4 px-4"  v-for="rowSel in row.selectors">
                        {{
                            rowSel
                        }}
                        
                    </li>
                </ul>
           </div>
        </div>
    </div>
</template>