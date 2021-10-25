<template>
    <div class="my-12">

        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">

            <div class="flex flex-row">
                <div class="w-3/4 pr-8">

                    <div class="shadow p-8 bg-white rounded-lg">

                        <div v-if="error.exists" class="mb-8 bg-red-50 text-red-800 p-4">
                            <h5 class="text-lg font-bold block">Validation Errors</h5>
                            <ul class="ml-9 mt-1" v-for="errorItems in errors">
                                <li class="list-disc" v-for="error in errorItems">{{error}}</li>
                            </ul>
                        </div>

                        <div class="mb-8">
                            <label for="title" class="block text-sm font-medium text-gray-700">Article Title <span class="text-red-600 ml-1">*</span></label>
                            <div class="mt-1">
                                <input v-model="record.title" type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-xl font-bold border-gray-300 rounded-md"
                                       aria-describedby="article-description">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="description" class="block text-sm font-medium text-gray-700">Preview Description<span class="text-red-600 ml-1">*</span></label>
                            <div class="mt-1">
                                <textarea v-model="record.description" id="description" name="description" rows="3" class="shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                <p class="mt-2 text-sm text-gray-500">Write a brief description about this article.</p>
                            </div>
                        </div>


                        <div class="q">
                            <label class="block text-sm font-medium text-gray-700">Article Details<span class="text-red-600 ml-1">*</span></label>
                            <QuillEditor theme="snow" toolbar="full" class="focus:ring-indigo-500 focus:border-indigo-500" v-model:content="record.details" contentType="html"></QuillEditor>
                            <p class="mt-2 text-sm text-gray-500">Write your article here.</p>
                        </div>


                        <!--                    <hr>-->
                        <!--                    output was:-->
                        <!--                    <div class="p-8 bg-gray-200">-->
                        <!--                        {{record.details}}-->
                        <!--                    </div>-->
                    </div>

                </div>
                <div class="w-1/4">

                    <div class="shadow p-8 bg-white rounded-lg">
                        <div class="mb-8">
                            <label for="alias" class="block text-sm font-medium text-gray-700">Link Slug<span class="text-red-600 ml-1">*</span></label>
                            <div class="mt-1">
                                <input v-model="record.slug" type="text" name="alias" id="alias" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category<span class="text-red-600 ml-1">*</span></label>
                            <select v-model="record.news_category_id" id="category" name="category"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option :value="0" selected>Uncategorized</option>
                                <option v-for="cat in categories" :value="cat.id">{{ cat.name }}</option>
                            </select>
                        </div>


                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                            <div class="flex items-center">
                                  <span v-if="!featuredImage.previewUrl" class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                      <svg class="h-full w-full text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                  </span>

                                <button v-if="!featuredImage.label" type="button" @click="openFileDialog()"
                                        class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Select Image
                                </button>

                                <input type="file" id="uploadFile" ref="uploadFile" @change="changed" style="display: none;"/>
                            </div>

                            <img class="w-full" v-if="featuredImage.previewUrl" :src="featuredImage.previewUrl" alt="Uploaded Document Preview">
                            <p><small>{{ fileLabel }}</small></p>
                            <button v-if="featuredImage.label" type="button" @click="removeFeaturedImage()"
                                    class=" mt-2 text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>

                        <div class="mb-12">

                            <p class="text-sm text-gray-500 mb-2">Hidden</p>
                            <toggle v-model:is-active="record.is_hidden"></toggle>

                        </div>

                        <div>

                            <button type="button"
                                    @click="save"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            categories: [],
            featuredImage: {
                file: null,
                label: null,
                previewUrl: null,
            },
            record: {
                'news_category_id': null,
                'title': null,
                'slug': '',
                'description': null,
                'details': null,
                'is_hidden': false,
            },
            error: {
                exists: false,
                message: null,
                errors : null
            }
        }
    },
    computed:{
      errors(){
          if(this.error.errors){
              let e = [];
            for( const property in this.error.errors){
                e.push(this.error.errors[property])
            }
            return e;
          }
          return [];
      }
    },
    watch: {
        'record.title': function (val) {
            this.record.slug = window.slugify(val);
        },
        'record.slug': function (val) {
            this.record.slug = window.slugify(val);
        },
    },
    methods: {
        getAllCategories(){
            const vm = this;
            window.axios.get('/api/news-categories/').then(function (response) {
                vm.categories = response.data.data;
            });
        },
        save(){
            const vm = this;

            let data = new FormData();
            data.append('news_category_id',vm.record.news_category_id);
            data.append('title',vm.record.title);
            data.append('slug',vm.record.slug);
            data.append('description',vm.record.description);
            data.append('details',vm.record.details);
            data.append('is_hidden',vm.record.is_hidden ? 1:0);
            if(vm.featuredImage.file){
                data.append('featured_image', vm.featuredImage.file);
            }
            console.log('submitting article...');
            window.axios.post('/api/news',data).then(function (response) {
                window.location = '/news';
            }).catch(function(error){
                vm.error.exists = true;
                vm.error.message = error.response.data.message;
                vm.error.errors = error.response.data.errors;
                console.log(error.toJSON());

            });
        },
        changed() {
            this.featuredImage.file = this.$refs.uploadFile.files[0];
            this.featuredImage.label = this.featuredImage.file.name;
            this.featuredImage.previewUrl = URL.createObjectURL(this.featuredImage.file);
        },
        openFileDialog() {
            document.getElementById('uploadFile').click();
        },
        removeFeaturedImage() {
            this.featuredImage.file = null;
            this.featuredImage.label = null;
            this.featuredImage.previewUrl = null;
        },
        isImage(attachment) {
            let parts = attachment.original_file_name.split(".");
            let extension = parts[parts.length - 1];
            let images = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];
            return images.includes(extension.toLowerCase());
        },
        upload() {
            let data = new FormData();
            data.append('issue_id', this.issue.id);
            data.append('description', this.description);
            data.append('attachment', this.featuredImage.file);

        }
    },
    mounted(){
        this.getAllCategories();
    },
}
</script>
