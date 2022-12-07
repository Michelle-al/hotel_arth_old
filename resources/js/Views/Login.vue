<template>
    <div>
        <h1>{{ $t("login.title")}}</h1>

        <div class="form-control w-full max-w-xs mx-auto mt-12">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="text" placeholder="Type here"/>

            <label class="label">
                <span class="label-text">{{ $t("login.password") }}</span>
            </label>
            <input type="password" placeholder="Type here" />
            <p class="mt-6 text-arth-green text-center"><router-link :to="{ name: 'signUp'}">{{
                     $t('login.dontHaveAccount')
                }}</router-link></p>
        </div>

        <div class="flex mx-auto mt-6">
            <button class="bg-arth-green">{{ $t("login.title") }}</button>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'login',
        data() {
            return {

            }
        },
        methods: {
        }
    }
</script>
