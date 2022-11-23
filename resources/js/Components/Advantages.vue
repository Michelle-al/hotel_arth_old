<template>
    <div class="md:mt-24 md:px-12" id="advantages">
        <h2>Ce que l'Hôtel Arth vous propose</h2>
        <div  class="grid md:grid-cols-2 lg:grid-cols-3 md:gap-4">
            <div v-for="advantage in advantages" :key="advantage.id">
                <AdvantageItem :advantage="advantage" />
            </div>
        </div>
        <div class="flex">
            <button class="border-arth-dark-blue justify-center font-tinos">Réserver</button>
        </div>
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
        this.advantages.push(...response.data['data']) ;
        console.log(this.advantages);
    }
}
</script>
