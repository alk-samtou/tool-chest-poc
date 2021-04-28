<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-50">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex mx-auto sm:px-6 lg:px-8">
            <div class="w-2/3 px-12">
                <div class=" dark:bg-gray-700 bg-white rounded-lg shadow pb-20 px-4 sm:px-6 lg:pb-28 lg:px-8  pt-6">
                    <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 dark:divide-gray-800 lg:max-w-7xl">
                        <div>
                            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">
                                Recent News & Information
                            </h2>

                            <p class="mt-4 text-xl text-gray-500 dark:text-gray-400">
                                Any official communication that is sent out, can also be found here. Please login often to stay up to date on the latest happenings!
                            </p>

                        </div>
                        <div class="mt-6 pt-10 grid gap-16 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-white">
                                    <time datetime="2020-03-16">Mar 16, 2020</time>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="text-xl font-semibold text-gray-900  dark:text-white dark:font-extrabold">
                                        Boost your conversion rate
                                    </p>
                                    <p class="mt-3 text-base text-gray-500  dark:text-white">
                                        Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.
                                    </p>
                                </a>
                                <div class="mt-3">
                                    <a href="#" class="text-base font-semibold text-indigo-600 hover:text-indigo-500  dark:text-blue-600">
                                        Read full story
                                    </a>
                                </div>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    <time datetime="2020-03-10">Mar 10, 2020</time>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="text-xl font-semibold text-gray-900">
                                        How to use search engine optimization to drive sales
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        Optio cum necessitatibus dolor voluptatum provident commodi et. Qui aperiam fugiat nemo cumque.
                                    </p>
                                </a>
                                <div class="mt-3">
                                    <a href="#" class="text-base font-semibold text-indigo-600 hover:text-indigo-500">
                                        Read full story
                                    </a>
                                </div>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    <time datetime="2020-02-12">Feb 12, 2020</time>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="text-xl font-semibold text-gray-900">
                                        Improve your customer experience
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        Cupiditate maiores ullam eveniet adipisci in doloribus nulla minus. Voluptas iusto libero adipisci rem et corporis.
                                    </p>
                                </a>
                                <div class="mt-3">
                                    <a href="#" class="text-base font-semibold text-indigo-600 hover:text-indigo-500">
                                        Read full story
                                    </a>
                                </div>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    <time datetime="2020-01-29">Jan 29, 2020</time>
                                </p>
                                <a href="#" class="mt-2 block">
                                    <p class="text-xl font-semibold text-gray-900">
                                        Writing effective landing page copy
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        Ipsum voluptates quia doloremque culpa qui eius. Id qui id officia molestias quaerat deleniti. Qui facere numquam autem libero quae cupiditate asperiores vitae cupiditate. Cumque id deleniti explicabo.
                                    </p>
                                </a>
                                <div class="mt-3">
                                    <a href="#" class="text-base font-semibold text-indigo-600 hover:text-indigo-500">
                                        Read full story
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/3 px-6">
                <div class="inner dark:bg-gray-700 bg-white rounded-lg shadow  px-6 pt-6">
                    <h2 class="mb-4 text-xl dark:text-white font-extrabold">Featured Documents</h2>
                    <div>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-900">
                            @foreach(\App\Models\Document::where('is_featured',1)->with('category')->get() as $doc)
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <div class="flex-1 space-y-3">
                                            <div class="flex items-center justify-between">
                                                <h3 class=" dark:text-white font-bold">{{$doc->title}}</h3>
                                                <div><span class="px-2 py-1 dark:bg-green-800 dark:text-green-100 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{$doc->category->name}}</span></div>
                                            </div>
                                            <div>
                                                <p class="text-sm dark:text-white text-gray-500">{{$doc->description}}</p>
                                                <p><a class=" dark:text-white text-sm text-blue-700 dark:text-blue-600" href="/download/{{$doc->id}}">Download →</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
