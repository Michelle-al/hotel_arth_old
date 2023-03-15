import { defineStore } from 'pinia';
import axios from 'axios';
import router from "../js/router";

export const useUserStore = defineStore('user', {
    state: () =>({
        // token: localStorage.getItem('token'),
        user: null,
    }),
    getters: {
        getErrors: (state) => state.errors,
    },
    actions: {
        async getUser(){
            this.errors = []
            await axios.get('api/users/me')
                .then((response) => {
                    this.user = response.data
                })
                .catch((error) => {
                    if(error.response.status === 401 ){
                        // this.errors = error
                        // console.log(error)

                        // router.push({name: 'login'})
                    }

                })


        },

        async logout(){
            await axios.post('api/logout')
            this.user = null
            await router.push({name: 'landingPage'});
        }

}
})
