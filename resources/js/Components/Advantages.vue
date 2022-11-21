<template>

</template>

<script>
export default {
    data() {
        return {
            advantage: {}
        }
    },
    async mounted() {
        const response = await axios.get('api/home/advantages');
        this.advantage = {...response.data};
    }
}
</script>
