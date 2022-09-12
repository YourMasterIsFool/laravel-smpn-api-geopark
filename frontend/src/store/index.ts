import { def } from '@vue/shared'
import {
    createStore
} from 'vuex'

import sidebarMod from './modules/sidebar'
import userMod from './modules/user'
const store = createStore({
    modules: {
        sidebarMod:sidebarMod,
        userMod 
    }
})

export default store