<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teen Zone Lessons Report') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="bg-indigo-800">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Teen Zone Lessons
                    </h2>
                    <p class="mt-3 text-xl text-indigo-200 sm:mt-4">
                        Quick view of performance metrics on our lessons platform.
                    </p>
                </div>
                <dl class="mt-10 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-3 sm:gap-8">

                    <div class="flex flex-col">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                            # of Students
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-white">
                            {{rand(40,200)}}
                        </dd>
                    </div>

                    <div class="flex flex-col">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                            # of Users
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-white">
                            {{rand(40,200)}}
                        </dd>
                    </div>


                    <div class="flex flex-col mt-10 sm:mt-0">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                           Total Hours Learned
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-white">
                            {{24*rand(12,19)}} Hours
                        </dd>
                    </div>


                    <div class="flex flex-col mt-10 sm:mt-0">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                            Lesson Plans
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-white">
                            {{rand(40,200)}}
                        </dd>
                    </div>

                    <div class="flex flex-col mt-10 sm:mt-0">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                            Public Lessons Completed
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-white">
                            {{rand(40,200)}}
                        </dd>
                    </div>

                    <div class="flex flex-col mt-10 sm:mt-0">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                           2021 Hours Learned
                        </dt>
                        <dd class="order-1 text-5xl font-extrabold text-white">
                            {{24*rand(12,19)}} Hours
                        </dd>
                    </div>

                </dl>
            </div>
        </div>

    </div>
</x-app-layout>
