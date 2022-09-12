const SET_FORM = 'SET_FORM'
const SET_USER = 'SET_USER'
const ADD_USER = 'ADD_USER'

import axios from 'axios';
import client from '../../client';

interface User {
    kelas?: String,
    nisn?: String,
    nama?: String,
}

interface UserDetail extends User {
     id? : String,
}

const user = {
    namespaced: true,
    state:{
        form: null,
        isLoading: false,
        users: []
    },
    actions: {
        setForm({
            commit
        }, payload) {
            commit(SET_FORM, payload)
        },
         setUserDispatch({
            commit
        }, payload) {
            return new Promise(async (resolve, reject) => {
                client.get('/siswa')
                .then((resp) => {
                    commit(SET_USER, resp.data?.result)
                    resolve(resp)
                })
                .catch((e) => {
                    console.log(e);
                })
                
            })
        },
        addUserDispatch({
            commit
        }, payload) {
           return new Promise(async (resolve, reject) => {
            try{
                let response = await client.post('/siswa', payload);
                if(response.status == 201) {
                    resolve(response)
                    commit(ADD_USER, response.data?.result)
                }
            }
            catch(e:any) {
                console.log(e.toString());
            }
           }) 
        }
    },
    mutations: {
        [SET_FORM](state, payload){
            state.form = payload;
        },
        [SET_USER](state, payload){
            console.log(payload)
            state.users = payload
        },
        [ADD_USER](state, payload) {
            state.users.push(payload)
        }
    },
    getters: {
        users(state) {
            return state.users
        }
    }
}

export default user