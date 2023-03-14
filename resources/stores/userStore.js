import { defineStore } from 'pinia';
import axios from 'axios';
import router from "../js/router";

export const useUserStore = defineStore('user', {
    state: () =>({
        // token: localStorage.getItem('token'),
        isLogged: localStorage.getItem('isLogged'),
        user: {
            email : "",
            password: "",
        },
        errors: [],
    }),
    getters: {
        getErrors: (state) => state.errors,
        // isLogged: (state) => state.isLogged === true,
        // isLogged: (state) => state.token !== null,
    },
    actions: {
        formValidation(response) {
            if(typeof response.data.errors !== 'undefined'){
                this.errors = response.data.errors
                console.log("errors", response.data.errors)
            }else{
                this.user = response.data.user
                localStorage.setItem('isLogged', response.data.isLogged)
                console.log(response.data)
                // this.token = response.data.token
                // await router.push({name: 'landingPage'})
            }
        },

       async registerUser() {
           this.errors = []
           await axios.get('/sanctum/csrf-cookie')
           const response = await axios.post('api/register', this.user)
           this.formValidation(response)

        },
        async submitLogin() {
            this.errors = []
            await axios.get('/sanctum/csrf-cookie')
            const response = await axios.post('api/login', this.user)
            this.formValidation(response)
        },
        // async getUser(){
        //     const config = {
        //         headers: { 'Authorization': `Bearer ${this.token}` }
        //     };
        //      this.errors = []
        //     const response = await axios.get('api/users/me', config)
        //
        //     if (typeof response.data.errors !== 'undefined') {
        //         this.errors = response.data.errors
        //         console.log("errors", response.data.errors)
        //     } else {
        //         console.log('getUser',response)
        //         // this.user = response.data
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
                    this.user = response.data
                    localStorage.setItem('isLogged', response.data.isLogged)
                    this.isLogged = localStorage.getItem('isLogged')
                    console.log('getUser',response.data)
                })
                .catch((error) => {
                    if(error.response.status === 401 ){
                        this.errors.push(error.response.data)
                        localStorage.removeItem("isLogged")
                        this.isLogged = false
                        router.push({name: 'login'})
                        console.log(this.errors)
                    }

                })


        },

        async logout(){
            console.log('Logout')
            const response = await axios.get('api/logout')
            console.log(response.data)
            localStorage.removeItem("isLogged")
            await router.push({name: 'landingPage'});

        }

}
})
