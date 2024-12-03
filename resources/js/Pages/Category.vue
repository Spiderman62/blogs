<script setup>
import {onMounted, reactive, ref, watch} from "vue";
import {debounce} from "lodash";
import PaginationLinks from "../Components/PaginationLinks.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    blogs: Object,
    category: Object,
    search: String,
})
const search = ref(props.search);
const category_id = ref(props.category.id);
const startDate = reactive({
    isInvalid: false,
    value: null
})
const endDate = reactive({
    isValue: false,
    value: null
})
const catchFilter = ref(false);
const setDate = () => {
    startDate.isInvalid = false;
    endDate.isInvalid = false;
    if (startDate.value == null || startDate.value === "") {
        startDate.isInvalid = true;
        return;
    }
    if (endDate.value == null || endDate.value === "") {
        endDate.isInvalid = true;
        return;
    }
    catchFilter.value = startDate.value;
}
watch([search, catchFilter], debounce(
    ([search, catchFilter]) => router.get(route('category', {
        id: category_id.value,
    }), {
        search: search,
        startDate: startDate.value,
        endDate: endDate.value,
    }, {
        preserveState: true
    }), 1000
))
</script>
<template>
    <div class="grid grid-cols-3 max-w-screen-xl mx-auto py-10 gap-x-10">
        <div class="col-span-2">
            <div>
                <h1 class="text-2xl font-bold mb-4">Category: {{ category.name }}</h1>
                <div class="flex justify-start gap-x-2 items-center mb-4">
                    <div class="w-1/4">
                        <input type="search" placeholder="Search for title" v-model="search"/>
                    </div>
                    <div class="flex items-center gap-x-6">
                        <div class="flex items-center gap-x-2">
                            <label class="font-bold" for="">Start date: </label>

                            <input
                                :class="{'!bg-red-500':startDate.isInvalid}"
                                v-model="startDate.value" class="bg-slate-500 p-1 px-2 text-white cursor-pointer"
                                type="date" name="" id="">


                        </div>
                        <div class="flex items-center gap-x-2">
                            <label class="font-bold" for="">End date: </label>
                            <input
                                :class="{'!bg-red-500':endDate.isInvalid}"
                                v-model="endDate.value" class="bg-slate-500 p-1 px-2 text-white cursor-pointer"
                                type="date" name="" id="">

                        </div>
                        <div @click="setDate"
                             class="bg-slate-500 p-1 px-2 text-white cursor-pointer rounded-md hover:bg-slate-700 transition-all">
                            Filter
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-[.5px] bg-zinc-400"></div>
            <div v-if="blogs.data.length > 0"
                 v-for="blog in blogs.data"
                 :key="blog.id"
                 class="py-10 border-b border-gray-400 grid grid-cols-2 gap-x-10">
                <div class="max-h-64">
                    <img class="size-full object-cover" :src="`/storage/${blog.image}`" alt="">
                </div>
                <Link
                    :href="route('blogDetail',{blog: blog.id})"
                    preserve-scroll
                >
                    <span class="py-1 px-3 bg-slate-500 rounded text-white">{{ blog.category_name }}</span>
                    <h1 class="mt-2 mb-2 leading-5 text-xl font-bold">{{ blog.blog_name }}</h1>
                    <p><span class="font-bold">Ngày đăng: </span>{{ blog.created_at }}</p>
                    <p><span class="font-bold">Lượt xem: </span>{{ blog.view }}</p>
                </Link>
            </div>
            <div v-else
                 class="h-60 flex items-center justify-center bg-slate-500 rounded text-white">
                <h1 class="text-4xl">NOT FOUND!</h1>
            </div>
            <PaginationLinks class="mt-4" :paginator="blogs"></PaginationLinks>
        </div>

        <div class="col-span-1 flex items-center justify-center bg-slate-500"></div>
    </div>
</template>
