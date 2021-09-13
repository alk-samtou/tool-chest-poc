<template>
    <ul v-if="files" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
        <li v-for="file in files.data" class="my-2">
            <div class="bg-white rounded-lg shadow divide-y divide-gray-200 mx-2">
                <div class="flex-1 flex flex-col p-8">
                    <h3 class="mb-4 text-gray-900 text-lg font-bold">{{file.title}}</h3>
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        <dd class="text-gray-500 text-sm">{{file.description}}</dd>

                        <dd v-if="file.document_permission == 1" class="mt-6 p-3 bg-yellow-50 text-gray-700 text-xs rounded">
                            This file can be shared externally. <br> Please take note of the password below:  <br> <br>
                            Password: <strong>{{file.password}}</strong> <br>
                            <br>
                            <a href="/help#password-protected-files" class="text-blue-800 hover:text-blue-500 flex align-middle">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="ml-1">
                                Learn more about files with passwords
                            </span>
                            </a>
                        </dd>

                        <dd class="mt-3">
                            <a :href="'/files?category='+file.category.id"><span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{file.category.name}}</span></a>
                        </dd>
                    </dl>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="w-0 flex-1 flex">
                            <a title="Download file" :href="'/download/'+file.id" class="hover:bg-blue-100 relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <svg class="w-6 h-6 text-blue-700 hover:text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </a>
                        </div>
                        <div class="-ml-px w-0 flex-1 flex">
                            <button title="Copy link" @click="copy('download/'+file.id)" class=" relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent hover:bg-gray-200 hover:text-gray-500">
                                <svg class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </button>
                        </div>
                        <div class="-ml-px w-0 flex-1 flex">
                            <button title="Edit file" @click="edit(file)" class=" hover:bg-red-100 relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg class="w-6 h-6 text-red-700 hover:text-red-900 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </li>

    </ul>
</template>
<script>
export default {
    props:['files'],
    emits:['requestEdit'],
    methods:{
        edit(file){
            this.$emit('requestEdit',file);
        },
        getWebsiteUrl(){
            return document.querySelector("meta[name='site']").getAttribute("content");
        },
        copy(path){
            window.copyToClipboard(this.getWebsiteUrl()+'/'+path);
        },
        download(path){
            window.location = this.getWebsiteUrl()+'/'+path;
        },
    }
}
</script>
