import { defineStore } from 'pinia';
import axios from 'axios';

export const useUserStore = defineStore('user', {
    state: () =>({
        token: localStorage.getItem('token'),
        user: {
            email : "",
            password: "",
        },
        errors: [],
    }),
    getters: {
        getErrors: (state) => state.errors,
        isLogged: (state) => state.token !== null,
    },
    actions: {
       async registerUser() {
            const response = await axios.get('api/user')
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
                localStorage.setItem('token', response.data.token)
                this.token = response.data.token
                this.loggedIn = this.token
                // await router.push({name: 'landingPage'})
            }
        },
        // async getUser(){
        //     // const config = {
        //     //     headers: { Authorization: `Bearer ${this.token}` }
        //     // };
        //      this.errors = []
        //     const response = await axios.get('api/users/me')
        //
        //     if (typeof response.data.errors !== 'undefined') {
        //         this.errors = response.data.errors
        //         console.log("errors", response.data.errors)
        //     } else {
        //         this.user = response.data
        //         // await router.push({name: 'landingPage'})
        //     }
        // },
        async getUser(){
            // const config = {
            //     headers: { Authorization: `Bearer ${this.token}` }
            // };
            this.errors = []
            await axios.get('api/users/me')
                .then((response) => {
                    console.log('response',response.data)

                })
                .catch((error) => {
                    if(error.response.status === 401 ){
                        console.log("test")
                    }

                })
                // this.user = response.data


        },

        async logout(){
            const response = await axios.get('api/login', this.user)
            localStorage.removeItem("token");

        }

    }
})
