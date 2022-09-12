
const SET_OPEN = 'SET_OPEN';


const sidebar = {
    namespaced: true,
    state: {
        open: false
    },

    mutations : {
        [SET_OPEN](state:any){
            state.open = !state.open
        }
    } ,
    actions: {
        setOpen({ commit }) {
            commit(SET_OPEN)
        }
    },
    getters: {
        getOpen(state:any) {
            return state.open
        }
    }
}

export default sidebar