<script setup>
import {onMounted} from "vue";

defineProps({
    blog: Object
})
onMounted(()=>{
    window.scrollTo(0, 0);
})
</script>
<template>
    <div class="grid grid-cols-3 max-w-screen-xl mx-auto py-10 gap-x-10">
        <div class="col-span-2">
            <div class="mb-6 flex items-center justify-between">
                <div><span class="text-xl text-zinc-700">Danh mục:</span> <span class="text-xl ">{{blog.category_name}}</span></div>
                <div><span class="text-xl text-zinc-700">Ngày đăng:</span> <span class="text-xl ">{{blog.created_at}}</span></div>
            </div>
            <div class=" h-[500px] mb-6">
                <img class="size-full object-cover" :src="`/storage/${blog.image}`" alt="">
            </div>
            <div>
                <div class="content-data" v-html="blog.content"></div>
            </div>
        </div>

        <div class="col-span-1 flex items-center justify-center bg-slate-500"></div>
    </div>
</template>
<style>

.content-data h2{
    @apply font-bold text-2xl my-2;
}
.content-data h3{
    @apply  my-2 text-lg font-bold;
}
.content-data li{
     @apply  my-2 list-disc;
 }
.content-data p{
    @apply  text-base text-zinc-600 leading-6;
}
</style>
