<template>
    <div :style="{backgroundImage: `url(${hero.media_url})`}" class="flex flex-col bg-cover bg-center h-screen p-24 justify-evenly items-center">
        <div>
            <h1 class="text-white lg:text-6xl">{{hero.title}}</h1>
            <h2 class="text-white mt-4 font-semibold  lg:text-3xl">{{hero.subtitle}}</h2>
        </div>
        <button class="border-arth-light-blue justify-center font-tinos mb-16">Découvrir</button>

    </div>

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
            console.log(response.data);
            this.hero = {...response.data['data']};
            console.log(this.hero);
        }
    }
</script>
