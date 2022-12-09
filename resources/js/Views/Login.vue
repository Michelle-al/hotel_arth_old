<template>
    <div>
        <h1>{{ $t("login.title")}}</h1>
        <div class="bg-red-100 mt-16 border border-red-400 w-3/6 mx-auto text-center text-red-700 px-4 py-3 rounded relative" role="alert" v-if="errorMessage">
            <span class="block sm:inline">{{ errorMessage }}</span>
        </div>
        <form  v-on:submit.prevent="checkUser">
            <div class="form-control w-full max-w-xs mx-auto mt-5">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" placeholder="Email" v-model="email" id="email" autocomplete="off"/>

                <label class="label">
                    <span class="label-text">{{ $t("login.password") }}</span>
                </label>
                <input type="password" placeholder="Password" v-model="password" id="password" autocomplete="off"/>
                <span class="text-red-500 text-sm">{{ message_password}}</span>
                <p class="mt-6 text-arth-green text-center"><router-link :to="{ name: 'signUp'}">{{
                        $t('login.dontHaveAccount')
                    }}</router-link></p>
            </div>

            <div class="flex mx-auto mt-6">
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
                errorMessage: ''
            }
        },
        methods: {
                async checkUser() {
                    try {
                    const response = await axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                        console.log(response)
                    }catch (error) {
                        // this.message_password = response.data.message.password.join()
                        console.log(error)
                    }
                }
        }
    }
</script>
