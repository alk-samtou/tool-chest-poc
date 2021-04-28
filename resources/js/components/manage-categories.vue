<template>
    <section class="fixed inset-0 overflow-hidden z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background overlay, show/hide based on slide-over state. -->
            <div class="absolute inset-0" aria-hidden="true"></div>

            <div class="absolute inset-y-0 pl-16 max-w-full right-0 flex">
                <transition
                    enter-active-class="transform transition ease-in-out duration-500 sm:duration-700"
                    enter-from-class="translate-x-full"
                    enter-to-class="translate-x-0"
                    leave-active-class="transform transition ease-in-out duration-500 sm:duration-700"
                    leave-from-class="translate-x-0"
                    leave-to-class="translate-x-full"
                >
                <div class="w-screen max-w-md">
                    <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
                        <div class="flex-1 h-0 overflow-y-auto">
                            <div class="py-6 px-4 bg-indigo-700 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-medium text-white" id="slide-over-title">
                                        Manage Categories
                                    </h2>
                                    <div class="ml-3 h-7 flex items-center">
                                        <button  v-on:click="$emit('cancel-manage-categories')" type="button" class="bg-indigo-700 rounded-md text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                            <span class="sr-only">Close panel</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <p class="text-sm text-indigo-300">
                                        Add additional categories or manage existing categories. In order to delete a category, you must re-assign documents to another category. Once file count reaches 0, you can delete a category.
                                    </p>
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col justify-between">
                                <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                    <div class="space-y-6 pt-6 pb-5">
                                        <div>

                                            <button
                                                @click="show.add = !show.add"
                                                v-if="show.add === false"
                                                type="button"
                                                class=" mb-5 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            >
                                                Add New Category
                                            </button>

                                            <add-document-category v-if="show.add" @cancel-add-category="show.add = false" @added-category="getCategories(); show.add = false;"></add-document-category>
                                            <edit-document-category v-if="show.edit === true && editCategory" :category="editCategory" @cancel-update-category="show.edit = false; editCategory = null;" @updated-category="getCategories()"></edit-document-category>


                                        </div>
                                        <div>
                                            <ul v-if="categories">
                                                <li class="mb-9 p-2" v-for="category in categories.data">
                                                    <div class="rounded bg-gray-200 p-3">
                                                        <div class="flex justify-between">
                                                            <div>{{category.name}}</div>
                                                            <div>
                                                                <button type="button" @click="getEditCategory(category)" class="mr-5">
                                                                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                                </button>
                                                                <button type="button" @click="deleteCategory(category.id)"><svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="text-sm border-t border-gray-300 mt-2 pt-2" v-html="category.description"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div>
                                            <nav class="dark:bg-gray-500 bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-500 sm:px-6" aria-label="Pagination">
                                                <div class="hidden sm:block">
                                                    <p class="text-sm text-gray-700">
                                                        Showing
                                                        <span class="font-medium">{{categories.from}}</span>
                                                        to
                                                        <span class="font-medium">{{categories.to}}</span>
                                                        of
                                                        <span class="font-medium">{{categories.total}}</span>
                                                        results
                                                    </p>
                                                </div>
                                                <div class="flex-1 flex justify-between sm:justify-end">
                                                    <button type="button" v-if="categories.prev_page_url" @click="getCategories(categories.prev_page_url)" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                        Previous
                                                    </button>
                                                    <button type="button" v-if="categories.next_page_url" @click="getCategories(categories.next_page_url)" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                        Next
                                                    </button>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                            <button v-on:click="$emit('cancel-manage-categories')" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
                </transition>
            </div>
        </div>
    </section>
</template>
<script>
import AddDocumentCategory from "./add-document-category";
export default {
    components: {AddDocumentCategory},
    emits:['cancel-manage-categories'],
    data(){
        return {
            show:{
                add: false,
                edit: false,
            },
            editCategory: null,
            categories: false,
        }
    },
    methods:{
        getCategories(url='/api/document-categories'){
            const vm = this;
            window.axios.get(url).then(function(response){
                vm.categories = response.data;
            });
        },
        getEditCategory(cat){
            this.editCategory = cat;
            this.show.edit = true;
        },
        editCategory(category){
            console.log('editing the category');
            console.log(category);
        },
        deleteCategory(id){
            const vm = this;
            window.axios.delete('/api/document-categories/'+id).then(function(){
                vm.getCategories();
            });
        }
    },
    mounted(){
        this.getCategories();
    }
}
</script>
