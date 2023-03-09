import { defineStore } from 'pinia';
import axios from 'axios';
import router from "../js/router";

export const useUserStore = defineStore('user', {
    state: () =>({
        token: false,
        loggedIn: false,
        user: {
            email : "",
            password: "",
        },
        errors: [],
    }),
    getters: {
        getToken: (state) => state.token,
        getUser: (state) => state.user,
        getErrors: (state) => state.errors,
        getLoggedIn: (state) => state.loggedIn,
        // getTest: (state) => state.test
    },
    actions: {
       async registerUser() {
            //const response = await axios.get('api/user')
            console.log(this.user)
        },
        async submitLogin() {
            this.errors = []
            await axios.get('/sanctum/csrf-cookie')

            const response = await axios.post('api/login', this.user)

            if(typeof response.data.errors !== 'undefined'){
                this.errors = response.data.errors
                console.log("errors", response.data.errors)
            }else{
                this.user = response.data.user
                this.token = response.data.token
                this.loggedIn = this.token
                // await router.push({name: 'landingPage'})
            }

        }


    }
})
