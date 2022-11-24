<template>
<!--    <div class="grid md:grid-cols-2 lg:grid-cols-3 md:gap-4 mb-8 bg-arth-dark-blue">-->
<!--        <div>-->
<!--            <h3 class=" text-white">Hôtel ARTH</h3>-->
<!--            <div v-for="link in footer" :key="link.id">{{ link.entry_name }}</div>-->
<!--            <p>Nous contacter</p>-->
<!--        </div>-->

<!--    </div>-->
    <div class=" p-10 bg-arth-dark-blue">
        <h3 class=" text-white text-start">Hôtel ARTH</h3>
        <div class="grid grid-flow-row-dense grid-cols-3">

            <div>
                <p ><a class="link link-hover text-white">Nous contacter</a></p>
                <p class="text-white">Coucou</p>
            </div>

            <div>
                <a class="link link-hover">A propos</a>
            </div>
            <div>
                <p><a class="link link-hover">Social Media</a></p>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            footer: {}
        }
    },
    async mounted() {
        const response = await axios.get('api/home/footer');
        this.footer = {...response.data['data']};
    }
}
</script>

<style scoped>
a{
    @apply text-white;
}
</style>
