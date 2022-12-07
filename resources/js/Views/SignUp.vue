<template>
    <div>
        <h1>{{ $t("signUp.title")}}</h1>

        <div class="form-control w-full max-w-xs mx-auto mt-12">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="text" placeholder="Type here"/>

            <label class="label">
                <span class="label-text">{{ $t("signUp.password") }}</span>
            </label>
            <input type="password" placeholder="Type here"/>

            <label class="label">
                <span class="label-text">{{ $t("signUp.confirmPassword") }}</span>
            </label>
            <input type="password" placeholder="Type here" />
            <p class="mt-6 text-center text-arth-green"><router-link :to="{ name: 'login'}">{{  $t('signUp.haveAccount') }}</router-link></p>
        </div>

        <div class="flex mx-auto mt-12">
            <button class="bg-arth-green">{{ $t("signUp.button") }}</button>
        </div>

    </div>
</template>

<script>

</script>
