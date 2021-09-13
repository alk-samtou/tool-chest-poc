<template>

    <div>
        <label id="listbox-label" class="sr-only">
            Change published status
        </label>
        <div class="relative">
            <div class="inline-flex shadow-sm rounded-md divide-x divide-indigo-600">
                <div class="relative z-0 inline-flex shadow-sm rounded-md divide-x divide-indigo-600">
                    <div class="relative inline-flex items-center bg-indigo-500 py-2 pl-3 pr-4 border border-transparent rounded-l-md shadow-sm text-white">
                        <!-- Heroicon name: solid/check -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-2.5 text-sm font-medium">
                            {{activeCategory.name}}
                        </p>
                    </div>
                    <button v-click-away="onClickAway" @click="isMenuOpen = !isMenuOpen" type="button" class="relative inline-flex items-center bg-indigo-500 p-2 rounded-l-none rounded-r-md text-sm font-medium text-white hover:bg-indigo-600 focus:outline-none focus:z-10 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                        <span class="sr-only">Change published status</span>
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>


            <transition
                enter-active-class=""
                enter-from-class=""
                enter-to-class=""
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
            <ul v-if="isMenuOpen" class="origin-top-right absolute z-10 right-0 mt-2 w-72 rounded-md shadow-lg overflow-hidden bg-white divide-y divide-gray-200 ring-1 ring-black ring-opacity-5 focus:outline-none" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0">
                <!--
                  Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                  Highlighted: "text-white bg-indigo-500", Not Highlighted: "text-gray-900"
                -->

                <li @click="changeFilter({id:0,name:'All Categories'})" class="text-gray-900 cursor-pointer select-none relative p-4 text-sm hover:bg-indigo-200" role="option">
                    <div class="flex flex-col">
                        <div class="flex justify-between">
                            <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                            <p :class="{'font-normal':activeCategory.id !== 0, 'font-bold':activeCategory.id === 0}">
                                All Categories
                            </p>
                            <!--
                              Checkmark, only display for selected option.

                              Highlighted: "text-white", Not Highlighted: "text-indigo-500"
                            -->
                            <span class="text-indigo-500" v-if="activeCategory.id ===0">
                              <!-- Heroicon name: solid/check -->
                              <svg class="h-5 w-5 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                              </svg>
                            </span>
                        </div>
                        <!-- Highlighted: "text-indigo-200", Not Highlighted: "text-gray-500" -->
                        <p class="text-gray-500 mt-2">

                        </p>
                    </div>
                </li>


                <li @click="changeFilter(category)" v-for="category in categories.data" class="text-gray-900 cursor-pointer select-none relative p-4 text-sm hover:bg-indigo-200" id="listbox-option-0" role="option">
                    <div class="flex flex-col">
                        <div class="flex justify-between">
                            <!-- Selected: "font-bold", Not Selected: "font-normal" -->
                            <p :class="{'font-bold': category.id === activeCategory.id, 'font-normal': category.id !== activeCategory.id}">
                                {{category.name}}
                            </p>
                            <!--
                              Checkmark, only display for selected option.

                              Highlighted: "text-white", Not Highlighted: "text-indigo-500"
                            -->
                            <span class="text-indigo-500" v-if="category.id === activeCategory.id">
                              <!-- Heroicon name: solid/check -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                              </svg>
                            </span>
                        </div>
                        <!-- Highlighted: "text-indigo-200", Not Highlighted: "text-gray-500" -->
                        <p class="text-gray-500 mt-2">
                            {{category.description}}
                        </p>
                    </div>
                </li>

                <!-- More items... -->
            </ul>
            </transition>
        </div>
    </div>

</template>
<script>
export default {
    emits:['updatedActiveCategory'],
    methods: {
        onClickAway(event) {
            this.isMenuOpen = false;
        },
        changeFilter(category){
            this.$emit('updatedActiveCategory',category)
        }
    },


    props:['categories','activeCategory'],

    data(){
       return {
           isMenuOpen: false,
       }
    }
}
</script>
