<template>

    <div :style="{backgroundImage: `url(${hero.media_url}`}" class="bg-cover bg-center h-screen p-24">
        <div>
            <h1 class="text-white text-6xl font-playfair font-bold">{{hero.title}}</h1>
            <h2 class="text-white text-3xl font-semibold mt-4 font-montserrat mb-12">{{hero.subtitle}}</h2>
        </div>

        <button class="bg-white mt-8 px-4 py-2 border-arth-light-blue border-2">Découvrir</button>
    </div>

<!--    <img :src="hero.media_url" />-->


</template>

<script>
    export default {
        data() {
            return {
                hero: {}
            }
        },
        async mounted() {
            const response = await axios.get('api/home/hero');
            this.hero = {...response.data};
        }
    }
</script>
