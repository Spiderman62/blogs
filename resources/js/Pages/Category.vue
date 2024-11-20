<script setup>
    defineProps({
        blogs:Object,
        category_name:String,
    })
</script>
<template>
    <div class="grid grid-cols-3 max-w-screen-xl mx-auto py-10 gap-x-10">
        <div class="col-span-2">
            <h1 class="text-2xl font-bold mb-4">Category: {{category_name}}</h1>
            <div class="h-[.5px] bg-zinc-400"></div>
            <div
                v-for="blog in blogs.data"
                :key="blog.id"
                class="py-10 border-b border-gray-400 grid grid-cols-2 gap-x-10">
                <div class="max-h-64">
                    <img class="size-full object-cover" :src="`/storage/${blog.image}`" alt="">
                </div>
                <Link
                    :href="route('blogDetail',{blog: blog.id})"
                >
                    <span class="py-1 px-3 bg-slate-500 rounded text-white">{{blog.category_name}}</span>
                    <h1 class="mt-2 mb-2 leading-5 text-xl font-bold">{{blog.blog_name}}</h1>
                    <p><span class="font-bold">Ngày đăng: </span>{{blog.created_at}}</p>
                    <p><span class="font-bold">Lượt xem: </span>{{blog.view}}</p>
                </Link>
            </div>
        </div>
        <div class="col-span-1 flex items-center justify-center bg-slate-500"></div>
    </div>
</template>
