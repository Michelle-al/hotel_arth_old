<template>
    <div  class="flex flex-wrap" id="advantages">
        <div v-for="advantage in advantages" :key="advantage.id" class="w-1/3">
            <AdvantageItem :advantage="advantage" />
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
