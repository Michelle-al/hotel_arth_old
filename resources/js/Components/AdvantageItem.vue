<template>
    <div class="flex ">
        <div><img alt :src=advantage.icon_url></div>
        <div>{{ advantage.title_french }}</div>
        <div>{{ advantage.description_french }}</div>
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
