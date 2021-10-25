<template>
    <manage-categories :categories="categories" active-cat="activeCategory" v-show="show.manageCategories" @categories-updated="getCategories" @cancel-manage-categories="this.show.manageCategories = false"></manage-categories>
    <add-file :categories="categories" v-show="show.addFile" @added-file="getFiles" @cancel-add-file="this.show.addFile = false"></add-file>
    <edit-file v-show="show.editFile" :categories="categories" :file="file" @delete-file="deleteFile" @edited-file="getFiles" @cancel-edit-file="this.show.editFile = false"></edit-file>

    <div class="py-12 px-12">

        <div class="flex items-center justify-center mb-9">
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <button @click="show.manageCategories = !show.manageCategories" type="button"
                            :class="{'bg-red-100':show.manageCategories}"
                            class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-red-600 bg-red-50 text-sm font-medium text-red-700 hover:bg-red-100 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
                    <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                             d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                      <span>Manage Categories</span>
                    </button>
                    <button @click="show.addFile = !show.addFile" type="button"
                            :class="{'bg-red-100':show.addFile}"
                            class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-red-600 bg-red-50 text-sm font-medium text-red-700 hover:bg-red-100 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
                      <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                               d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                      <span>Add New File</span>
                    </button>
                </span>
        </div>

<div class="flex justify-between">

    <div class="mb-4">
        <button @click="updatePreferredView('grid')" title="Grid View" type="button" :class="{'bg-gray-500':(show.activeView === 'grid'), 'bg-gray-300':(show.activeView !== 'grid')}" class="mr-5 inline-flex items-center p-1.5 border border-transparent rounded-full shadow-sm text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        </button>
        <button @click="updatePreferredView('table');" title="Table View" type="button" :class="{'bg-gray-500':(show.activeView === 'table'), 'bg-gray-300':(show.activeView !== 'table')}" class="inline-flex items-center p-1.5 border border-transparent rounded-full shadow-sm text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        </button>
    </div>
    <div class="flex flex-col mb-3">
        <div class="flex flex-col md:flex-row mb-6 items-end">


            <div class=" md:mt-0 items-baseline px-2">
                <document-category-filter-button @updated-active-category="updatedActiveFileFilter" :active-category="activeCategory" :categories="categories"></document-category-filter-button>
            </div>



        </div>
    </div>
</div>

        <files-grid v-if="show.activeView === 'grid'" :files="files" @request-edit="loadEditFile" />
        <files-table v-if="show.activeView === 'table'" :files="files" @request-edit="loadEditFile" />


        <nav v-if="files" class=" mt-12 shadow bg-white rounded-lg px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
            <div class="hidden sm:block">
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{files.from}}</span>
                    to
                    <span class="font-medium">{{files.to}}</span>
                    of
                    <span class="font-medium">{{files.total}}</span>
                    results
                </p>
            </div>
            <div class="flex-1 flex justify-between sm:justify-end">
                <button v-if="files.prev_page_url" @click="getFiles(files.prev_page_url)" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </button>
                <button v-if="files.next_page_url" @click="getFiles(files.next_page_url)" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </button>
            </div>
        </nav>

    </div>

</template>

<script>

import EditFile from "./edit-file";
export default {
    components: {EditFile},
    watch: {
        'show.addFile': function (val) {
            if (val) this.show.manageCategories = !val;
        },
        'show.manageCategories': function (val) {
            if (val) this.show.addFile = !val;
        },
    },
    mounted() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if(urlParams.has('category')){
            const cat = urlParams.get('category');

            this.getFiles('/api/documents?category='+cat);
            this.setActiveCategory(cat);
        } else {
            this.getFiles();
        }

        this.getCategories();

    },
    methods: {
        updatedActiveFileFilter(category){
            this.activeCategory = category;
            this.getFiles('/api/documents?category='+category.id);
        },

        loadEditFile(file){
            this.file = file;
            this.show.editFile = true;
        },

        getCategories(url='/api/document-categories?per_page=100'){
            const vm = this;
            window.axios.get(url).then(function(response){
                vm.categories = response.data;
            });
        },

        updatePreferredView(view){
            this.show.activeView = view;
            window.updatePreferredFilesView(view);
        },

        setActiveCategory(id){
            const url='/api/document-categories/'+id
            const vm = this;
            window.axios.get(url).then(function(response){
                vm.activeCategory = response.data;
            });
        },

        deleteFile(file){
            const vm = this;
            window.axios.delete('/api/documents/'+file.id).then(function(response){
                vm.getFiles();
            });
        },

        getFiles(url = '/api/documents'){
            const vm = this;
            window.axios.get(url).then(function(response){
                vm.files = response.data;
                vm.show.addFile = false;
            });
        },

        copy(data){
            window.copyToClipboard(data);
        }
    },

    data() {
        let data =  {
            show: {
                activeView: 'grid',
                addFile: false,
                editFile: false,
                manageCategories: false,
            },
            file: false,
            files: false,
            categories: false,
            activeCategory: {
                id:0,
                name:'All Categories'
            }
        };

        data.show.activeView = window.getPreferredFilesView();

        return data;
    }
}
</script>
