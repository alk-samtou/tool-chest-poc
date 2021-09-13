<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-center my-12">
        <span class="relative z-0 inline-flex shadow-sm rounded-md">
            <a href="/news-categories" title="Manage Categories"
               class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-red-600 bg-red-50 text-sm font-medium text-red-700 hover:bg-red-100 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500">
            <svg class="w-6 h-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                                                                     d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
              <span>Manage Categories</span>
            </a>
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
        <div class="bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
            <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
                <div>
                    <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                        Recent News & Information
                    </h2>
                    <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                        Official Elks DAP communication for State Chairs. Be sure to login often to stay up to date!
                    </p>
                </div>
                <div class="mt-12 grid gap-16 pt-12 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
                    <div>
                        <div>
                            <a href="#" class="inline-block">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
              Article
            </span>
                            </a>
                        </div>
                        <a href="#" class="block mt-4">
                            <p class="text-xl font-semibold text-gray-900">
                                Boost your conversion rate
                            </p>
                            <p class="mt-3 text-base text-gray-500">
                                Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.
                            </p>
                        </a>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Paul York</span>
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=gtJXcBMVgo&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                         alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#">
                                        Paul York
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        Mar 16, 2020
                                    </time>
                                    <span aria-hidden="true">
                &middot;
              </span>
                                    <span>
                6 min read
              </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <a href="#" class="inline-block">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-pink-100 text-pink-800">
              Video
            </span>
                            </a>
                        </div>
                        <a href="#" class="block mt-4">
                            <p class="text-xl font-semibold text-gray-900">
                                How to use search engine optimization to drive sales
                            </p>
                            <p class="mt-3 text-base text-gray-500">
                                Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.
                            </p>
                        </a>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Dessie Ryan</span>
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixqx=gtJXcBMVgo&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                         alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#">
                                        Dessie Ryan
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-10">
                                        Mar 10, 2020
                                    </time>
                                    <span aria-hidden="true">
                &middot;
              </span>
                                    <span>
                4 min read
              </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <a href="#" class="inline-block">
            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
              Case Study
            </span>
                            </a>
                        </div>
                        <a href="#" class="block mt-4">
                            <p class="text-xl font-semibold text-gray-900">
                                Improve your customer experience
                            </p>
                            <p class="mt-3 text-base text-gray-500">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab iure iusto fugiat commodi sequi.
                            </p>
                        </a>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Easer Collins</span>
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixqx=gtJXcBMVgo&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                         alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#">
                                        Easer Collins
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-02-12">
                                        Feb 12, 2020
                                    </time>
                                    <span aria-hidden="true">
                &middot;
              </span>
                                    <span>
                11 min read
              </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
