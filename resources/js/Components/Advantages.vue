<template>
    <div v-for="advantage in advantages" :key="advantage.id">
        <AdvantageItem :advantage="advantage" />
    </div>

</template>

<script>
import AdvantageItem from "./AdvantageItem";
export default {
    components: {
        AdvantageItem
    },
    data() {
        return {
            advantages: []
        }
    },
    async mounted() {
        const response = await axios.get('api/home/advantages');
        this.advantages.push(...response.data) ;
    }
}
</script>
