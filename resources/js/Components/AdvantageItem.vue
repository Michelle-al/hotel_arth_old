<template>
    <div class="p-10 h-96">
        <div class="mb-4 h-1/4"><img alt class="m-auto" :src=advantage.icon_url></div>
        <div class="text-center  h-1/4">{{ advantage.title_french }}</div>
        <div class="text-center">{{ advantage.description_french }}</div>
    </div>

</template>


<script>
    export default{
        props:{
            advantage: {
                type: Object,
                default: () => {}
            }
        }
    }
</script>
