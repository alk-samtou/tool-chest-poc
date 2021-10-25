<template>
    <div class="mb-5">
        <div class="p-4 rounded bg-gray-200">
            <div class="mb-5">
                <label for="project_name" class="block text-sm font-medium text-gray-900">
                    Category Name
                </label>
                <div class="mt-1">
                    <input v-model="name" type="text" name="project_name" id="project_name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                </div>
            </div>

            <div class="mb-5">
                <label for="project_name" class="block text-sm font-medium text-gray-900">
                    Color
                </label>
                <div class="mt-1">
                    <input v-model="color" type="color" name="color" id="color" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                </div>
            </div>

            <div class="mb-5">
                <label for="description" class="block text-sm font-medium text-gray-900">
                    Description
                </label>
                <div class="mt-1">
                    <textarea v-model="description" id="description" name="description" rows="4" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"></textarea>
                </div>
            </div>
            <div class="flex justify-between">
                <button type="button" @click="save()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Category
                </button>
                <button v-on:click="$emit('cancel-add-category')" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    emits:['cancel-add-news-category','added-news-category'],
    data(){
        return {
            name: null,
            color: null,
            description: null,
        }
    },
    methods:{
        save(){
            const vm = this;
            window.axios.post('/api/news-categories',{
                name: vm.name,
                color: vm.color,
                description: vm.description,
            }).then(function(response){
                vm.$emit('added-news-category',response.data);
            });
        }
    }
}
</script>
