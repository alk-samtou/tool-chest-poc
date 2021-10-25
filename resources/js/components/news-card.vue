<template>
    <div class="bg-white rounded-2xl px-6 py-6 shadow-lg">
        <div class="flex justify-between">
            <a :href="'/news?category='+article.category.id" class="inline-block">
                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium" :style="'background-color:'+article.category.color+'; color:'+contrast(article.category.color)">
                      {{article.category.name}}
                    </span>
            </a>

<!--            <drop-down></drop-down>-->
        </div>

        <a :href="'news/article/'+article.slug" class="block mt-4">
            <p class="text-xl font-semibold text-gray-900">
                {{article.title}}
            </p>
            <p class="mt-3 text-base text-gray-500">
                {{article.description}}
            </p>
        </a>
        <div class="mt-6 flex items-center"  v-if="article.author !== null">
            <div class="flex-shrink-0">
                <a href="#">
                    <span class="sr-only">{{article.author.name}}</span>
                    <img v-if="article.author.avatar" class="h-10 w-10 rounded-full" :src="article.author.avatar" alt="">
                </a>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    <a href="#">
                        {{article.author.first_name}} {{article.author.last_name}}
                    </a>
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-16">
                        {{article.updated_at}}
                    </time>
                    <span aria-hidden="true">
                &middot;
              </span>
                    <span>

              </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import color from '../services/color.js';

export default {
    mixins:[color],
    props:{
        article:{
            default(){
                return {
                    title: 'This is the default page title',
                    slug: 'this-is-the-slug',
                    description:'Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu. ',
                    updated_at:'Sep 2, 2021',
                    author:{
                      name: 'Edward Comarzan',
                      avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=gtJXcBMVgo&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                    },
                    category: {
                        title: 'Article',
                        color: '#9400FF',
                    }
                }
            }
        }
    },

}
</script>
