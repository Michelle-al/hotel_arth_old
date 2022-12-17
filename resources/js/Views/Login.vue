<template>
    <div>
        <h1 class="mt-8 md:mt-0">{{ $t("login.title")}}</h1>

        <form  v-on:submit.prevent="checkUser">
            <div class="form-control w-full max-w-xs mx-auto mt-5">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" placeholder="Email" v-model="email" id="email" autocomplete="off"/>
                <span class="text-red-500 text-sm" v-for="email in message_email">{{ email }}</span>
                <label class="label">
                    <span class="label-text">{{ $t("login.password") }}</span>
                </label>
                <input type="password" placeholder="Password" v-model="password" id="password" autocomplete="off"/>
                <span class="text-red-500 text-sm" v-for="password in message_password">{{ password }}</span>
                <p class="mt-6 text-arth-green text-center"><router-link :to="{ name: 'signUp'}">{{
                        $t('login.dontHaveAccount')
                    }}</router-link></p>
            </div>

            <div class="flex mx-auto mt-6 mb-8">
                <button class="bg-arth-green hover:scale-105">{{ $t("login.title") }}</button>
            </div>
        </form>


    </div>
</template>

<script>
    export default {
        name: 'login',
        data() {
            return {
                email: '',
                password: '',
                message_password: '',
                message_email: '',
            }
        },
        methods: {
                async checkUser() {
                    const response = await axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })

                    if(typeof response.data.message !== 'undefined'){
                        this.message_email = response.data.message.email
                        this.message_password = response.data.message.password
                    }
                    if(response.data.token){
                        this.token = response.data.token
                        localStorage.setItem("token", this.token)
                    }
                   // console.log(response.data)



                }
        }
    }
</script>
<!--try {-->
<!--const response = await axios.post('api/login', {-->
<!--email: this.email,-->
<!--password: this.password-->
<!--})-->
<!--console.log(response)-->
<!--}catch (error) {-->
<!--// this.message_password = response.data.message.password.join()-->
<!--console.log(error.message)-->
<!--}-->
<!--}-->
