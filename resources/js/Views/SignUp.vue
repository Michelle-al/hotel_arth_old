<template>
    <div>
        <h1 class="mt-8" @click="createUser">{{ $t("signUp.title")}}</h1>
        <form v-on:submit.prevent="createUser" action="/signup" method="post">
            <div class="form-control w-full max-w-xs mx-auto mt-12 flex flex-col space-y-5">
                <div>
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email" v-model="email" id="email" />
                    <span class="text-red-500 text-sm" v-for="email in message_email">{{ email }}</span>
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">{{ $t("signUp.password") }}</span>
                    </label>
                    <input type="password" placeholder="Password" v-model="password" id="password" autocomplete="off"/>
                    <span class="text-red-500 text-sm" v-for="password in message_password">{{ password }}</span>
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">{{ $t("signUp.confirmPassword") }}</span>
                    </label>
                    <input type="password" placeholder="Password confirmation" v-model="password_confirmation" id="password_confirmation" autocomplete="off"/>
                </div>
                <div class=" flex space-x-4 mt-4">
                    <div>
                        <span class="label-text">{{ $t("signUp.rememberToken") }}</span>
                    </div>
                    <div>
                        <input type="checkbox" class="w-4 h-4" v-model="remember_token" id="remember_token" />
                    </div>
                </div>




                <p class="mt-6 text-center text-arth-green"><router-link :to="{ name: 'login'}">{{  $t('signUp.haveAccount') }}</router-link></p>
            </div>

            <div class="flex mx-auto mt-12 mb-8">
                <button class="bg-arth-green hover:scale-105" >{{ $t("signUp.button") }}</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'signUp',
    data() {
        return {
            email: '',
            password: '',
            password_confirmation: '',
            message_email:'',
            message_password: '',
            remember_token: '',
            token:''
        }
    },
    methods: {
        async createUser(){

            const response = await axios.post('api/register', {
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            })
            if(typeof response.data.message !== 'undefined'){
                this.message_email = response.data.message.email
                this.message_password = response.data.message.password
            }
            if(response.data.token){
                this.token = response.data.token
                localStorage.setItem("token", this.token)
            }

            // this.$router.push('/');
            console.log(response)
            console.log(this.token)
        }
    }
}
</script>

