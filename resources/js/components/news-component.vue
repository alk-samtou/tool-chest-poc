<template>
    <manage-news-categories v-if="show.manageCategories" @cancel-manage-news-categories="show.manageCategories = false"></manage-news-categories>

    <div class="flex items-center justify-center my-12">
        <span class="relative z-0 inline-flex shadow-sm rounded-md">
            <button @click="show.manageCategories = !show.manageCategories" title="Manage Categories"
               class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-red-600 bg-red-50 text-sm font-medium text-red-700 hover:bg-red-100 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
            <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                     d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
              <span>Manage Categories</span>
            </button>
            <a href="/news/create" title="Add News"
               class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-red-600 bg-red-50 text-sm font-medium text-red-700 hover:bg-red-100 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
              <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                       d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
              <span>Add News</span>
            </a>
        </span>
    </div>


    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class=" pb-20 px-4 sm:px-6  lg:pb-28 lg:px-8">
            <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
                <div class="bg-white px-12 py-20 shadow-lg rounded-2xl">
                    <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                        Recent News & Information
                    </h2>
                    <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                        Official Elks DAP communication for State Chairs. Be sure to login often to stay up to date!
                    </p>

                </div>
                <div v-if="news" class="mt-6 grid gap-16 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">

                    <news-card v-for="article in news.data" :article="article"></news-card>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    methods:{
        getNews(){
            const vm = this;
            window.axios.get('/api/news/').then(function (response) {
                vm.news = response.data;
            });
        },
    },
    mounted(){
        this.getNews();
    },
    data(){
        return {
            news: false,
            show: {
                manageCategories: false,
            }
        }
    }
}
</script>
