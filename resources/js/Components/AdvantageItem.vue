<template>
    <div class="p-10 lg:h-96">
        <div class="mb-4 h-1/4"><img alt class="m-auto" :src=advantage.icon_url></div>
        <div class="text-center  h-1/4">{{ advantage.title_french }}</div>
        <div class="text-center">{{ advantage.description_french }}</div>
    </div>
    <div class="collapse lg:visible">
        <input type="checkbox" class="peer" />
        <div class="collapse-title pl-0 pr-9 bg-arth-light-blue text-black-content peer-checked:arth-light-blue peer-checked:text-black-content">
            <div class="flex flex-row">
                <div class="mb-4 w-1/3 lg:h-1/4"><img alt class="m-auto" :src=advantage.icon_url></div>
                <div class="text-center w-2/3 lg:h-1/4">{{ advantage.title_french }}</div>
            </div>

        </div>
        <div class="collapse-content bg-white text-black-content peer-checked:bg-white peer-checked:text-black-content">
            <p class="text-center">{{ advantage.description_french }}</p>
        </div>
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
