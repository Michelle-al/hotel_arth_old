<template>

    <div class="mt-20" id="advantages">
        <h2 class="uppercase mb-0 pb-0">Ce que l'Hôtel Arth vous propose</h2>
        <div  class="lg:flex lg:flex-wrap">
            <div v-for="advantage in advantages" :key="advantage.id" class="lg:w-1/3">
                <AdvantageItem :advantage="advantage" />
            </div>
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
        this.advantages.push(...response.data) ;
    }
}
</script>
