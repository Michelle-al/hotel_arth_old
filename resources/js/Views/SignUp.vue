<template>
    <div>
        <h1 @click="createUser">{{ $t("signUp.title")}}</h1>
        <form v-on:submit.prevent="createUser">
            <div class="form-control w-full max-w-xs mx-auto mt-12">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" placeholder="Type here" v-model="email" id="email" />
                <span class="text-red-500 text-sm" >{{ message_email }}</span>

                <label class="label">
                    <span class="label-text">{{ $t("signUp.password") }}</span>
                </label>
                <input type="password" placeholder="Type here" v-model="password" id="password" autocomplete="off"/>
                <span class="text-red-500 text-sm">{{ message_password }}</span>
                <label class="label">
                    <span class="label-text">{{ $t("signUp.confirmPassword") }}</span>
                </label>
                <input type="password" placeholder="Type here" v-model="password_confirmation" id="password_confirmation" autocomplete="off"/>

                <p class="mt-6 text-center text-arth-green"><router-link :to="{ name: 'login'}">{{  $t('signUp.haveAccount') }}</router-link></p>
            </div>

            <div class="flex mx-auto mt-12">
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
            message_password: ''
        }
    },
    methods: {
        async createUser(){

            const response = await axios.post('api/register', {
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            })
            this.message_email = response.data.message.email.join((' '))
            this.message_password = response.data.message.password.join((' '))
        }
    }
}
</script>
