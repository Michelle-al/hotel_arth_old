<template>
    <p>{{hero}}</p>
    <p>{{hero.media_url}}</p>
    <div class="bg-[url({{hero.media_url}})]">
        <h2>{{hero.title}}</h2>
        <h4>{{hero.subtitle}}</h4>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                hero: {}
            }
        },
        mounted() {
            axios.get('api/home/hero')
                .then(response => this.hero = {...response.data})
        }
    }
</script>
