<template>

    <section class="fixed inset-0 overflow-hidden z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">

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
                                            Edit File
                                        </h2>
                                        <div class="ml-3 h-7 flex items-center">
                                            <button v-on:click="$emit('cancel-edit-file')" type="button" class="bg-indigo-700 rounded-md text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                                <span class="sr-only">Close panel</span>
                                                <!-- Heroicon name: outline/x -->
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <p class="text-sm text-indigo-300">
                                            Update this file by completing this form
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-col justify-between">
                                    <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                        <div class="space-y-6 pt-6 pb-5">
                                            <div>
                                                <label for="project_name" class="block text-sm font-medium text-gray-900">
                                                    Title <span class="text-red-700"> *</span>
                                                </label>
                                                <div class="mt-1">
                                                    <input v-model="record.title" type="text" name="project_name" id="project_name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                </div>
                                            </div>

                                            <div v-if="categories">
                                                <label for="category-id" class="block text-sm font-medium text-gray-700">Category <span class="text-red-700"> *</span> </label>
                                                <select v-model="record.document_category_id" id="category-id" name="category"
                                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                    <option value="" selected></option>
                                                    <option v-for="category in categories.data" :value="category.id" v-html="category.name"></option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="description" class="block text-sm font-medium text-gray-900">
                                                    Description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea v-model="record.description" id="description" name="description" rows="4"
                                                              class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"></textarea>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="attachment" class="block text-sm font-medium text-gray-900">
                                                    Replace Existing File
                                                </label>
                                                <div class="mt-1">
                                                    <input type="file" name="file" id="attachment" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                </div>
                                            </div>


                                            <fieldset>
                                                <legend class="text-sm font-medium text-gray-900">
                                                    Document Privacy <span class="text-red-700"> *</span>
                                                </legend>
                                                <div class="mt-2 space-y-5">
                                                    <div class="relative flex items-start">
                                                        <div class="absolute flex items-center h-5">
                                                            <input value="0" v-model="record.document_permission" id="privacy_private" name="privacy" aria-describedby="privacy_private_description" type="radio"
                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" checked>
                                                        </div>
                                                        <div class="pl-7 text-sm">
                                                            <label for="privacy_private" class="font-medium text-gray-900 cursor-pointer">
                                                                Private Access
                                                            </label>
                                                            <p id="privacy_private_description" class="text-gray-500">
                                                                Only logged in users have access to this file.
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex items-center h-5">
                                                                <input value="1" v-model="record.document_permission" id="privacy_protected" name="privacy" aria-describedby="privacy_protected_description" type="radio"
                                                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="privacy_protected" class="font-medium text-gray-900 cursor-pointer">
                                                                    Password Protected
                                                                </label>
                                                                <p id="privacy_protected_description" class="text-gray-500">
                                                                    Anyone with a password can access the file, as well as logged in users.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div v-if="record.document_permission === 1" class="mt-2 py-4">
                                                            <label for="password" class="block text-sm font-medium text-gray-900 cursor-pointer">
                                                                Password <span class="text-red-700"> *</span>
                                                            </label>
                                                            <div class="mt-1">
                                                                <input v-model="record.password" type="text" name="password" id="password"
                                                                       class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex items-center h-5">
                                                                <input value="2" v-model="record.document_permission" id="privacy_public" name="privacy" aria-describedby="privacy_public_description" type="radio"
                                                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="privacy_public" class="font-medium text-gray-900 cursor-pointer">
                                                                    Public
                                                                </label>
                                                                <p id="privacy_public_description" class="text-gray-500">
                                                                    Anyone with the link can access this file without being logged in or with a password.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <legend class="text-sm font-medium text-gray-900">
                                                    Mark as Featured <span class="text-red-700"> *</span>
                                                </legend>
                                                <div class="mt-2 space-y-5">


                                                    <div>
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex items-center h-5">
                                                                <input value="1" v-model="record.is_featured" id="is_featured" name="featured" aria-describedby="is_featured_description" type="radio"
                                                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="is_featured" class="font-medium text-gray-900 cursor-pointer">
                                                                    Feature File
                                                                </label>
                                                                <p id="is_featured_description" class="text-gray-500">
                                                                    Feature this file where applicable
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="relative flex items-start">
                                                            <div class="absolute flex items-center h-5">
                                                                <input value="0" v-model="record.is_featured" id="is_featured_no" name="featured" aria-describedby="is_featured_no_description" type="radio"
                                                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                            </div>
                                                            <div class="pl-7 text-sm">
                                                                <label for="is_featured_no" class="font-medium text-gray-900 cursor-pointer">
                                                                    Not Featured
                                                                </label>
                                                                <p id="is_featured_yes_description" class="text-gray-500">
                                                                    Show file normally
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0 px-4 py-4 flex justify-between">
                                <div>
                                    <button @click="$emit('delete-file', file);$emit('cancel-edit-file')" type="button" class="bg-red-700 py-2 px-4 rounded-md shadow-sm text-sm font-medium text-white hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Delete File
                                    </button>
                                </div>
                                <div>
                                    <button @click="$emit('cancel-edit-file')" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </button>
                                    <button @click="updateDocument()" type="button"
                                            class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </transition>
            </div>
        </div>
    </section>

</template>
<script>
export default {
    props: {
        categories: {
            default() {
                return false;
            }
        },
        file: false
    },
    emits: ['cancel-edit-file', 'edited-file','delete-file'],
    data() {
        return {
            record: {
                title: null,
                description: null,
                document_category_id: null,
                attachment: null,
                document_permission: null,
                is_featured: null,
                password: null,
            }
        };
    },
    watch:{
        file(val){
            this.record.title = val.title;
            this.record.description = val.description;
            this.record.document_category_id = val.document_category_id;
            this.record.document_permission = val.document_permission;
            this.record.is_featured = val.is_featured;
            this.record.password = val.password;
        }
    },
    methods: {

        updateDocument() {
            const vm = this;

            let data = new FormData();
            data.append('title', vm.record.title);
            data.append('description', vm.record.description);
            data.append('document_category_id', vm.record.document_category_id);
            data.append('document_permission', vm.record.document_permission);
            data.append('is_featured', vm.record.is_featured);
            data.append('password', vm.record.password);
            data.append('attachment', document.getElementById('attachment').files[0]);

            console.log(data);
            
            // window.axios.put('/api/documents/'+this.file.id, data).then(function (response) {
            //     vm.$emit('edited-file', response.data);
            //     vm.$emit('cancel-edit-file');
            // });
        }
    }
}
</script>
