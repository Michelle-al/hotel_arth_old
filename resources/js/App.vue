<template>
    <div>
        <h1 class="text-gray-500">Hello Vue</h1>

    </div>
</template>

<script>
export default {
    name: "App.vue",
    mounted() {
        console.log("coucou vue test");
    },
    beforeCreate() {
        console.log('je suis un hook beforeCreate');
    },
    beforeMount() {
        console.log('je suis un hook beforeMount');
    }
}
</script>


