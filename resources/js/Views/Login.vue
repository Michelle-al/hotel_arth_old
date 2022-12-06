<template>
    <div class="pt-[98px]">
        <h1 class="m-12">{{ $t("login.title")}}</h1>

        <div class="form-control w-full max-w-xs mx-auto">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />

            <label class="label">
                <span class="label-text">{{ $t("login.password") }}</span>
            </label>
            <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
            <p class="label-text-alt text-right"><router-link to="">Pas encore de compte ?</router-link></p>
        </div>

        <div class="flex mx-auto">
            <button>{{ $t("login.title") }}</button>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'login',
        data() {
            return {

            }
        }
    }
</script>
