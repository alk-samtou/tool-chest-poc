<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a News Article') }}
        </h2>
    </x-slot>


    <div class="my-12 bg-white">

        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">

            <div class="flex flex-row">
                <div class="w-3/4 pr-8">

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Article Title</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-xl border-gray-300 rounded-md" aria-describedby="article-description">
                        </div>
                    </div>

                </div>
                <div class="w-1/4">

                    <p>slug</p>
                    <p>page status</p>

                    <p>submit btn</p>
                </div>
            </div>


        </div>



    </div>

</x-app-layout>
