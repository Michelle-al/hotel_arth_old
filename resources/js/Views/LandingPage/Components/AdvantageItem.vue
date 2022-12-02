<template>
    <div class="collapse px-4 py-2">
        <input type="checkbox" class="peer" />
        <div class="collapse-title  pr-9 bg-arth-light-blue md:bg-white text-black-content peer-checked:arth-light-blue peer-checked:text-black-content">
            <div class="flex flex-row md:flex-col">
                <div class="mb-4 w-1/4 md:w-full h-14"><img alt class="m-auto" :src="advantage.icon_url"></div>
                <div class="text-center w-3/4 md:w-full ">{{ advantage.title }}</div>
            </div>

        </div>
        <div class="collapse-content md:max-h-full md:cursor-default bg-white text-black-content peer-checked:bg-white peer-checked:text-black-content">
            <p class="text-center pt-8">{{ advantage.description }}</p>
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
