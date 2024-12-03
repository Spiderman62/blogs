<script setup>
import {computed, onMounted, reactive, ref, watch} from "vue";
import TextInput from "@/Components/TextInput.vue";
import Comment from "@/Components/Comment.vue";
import PaginationLinks from "@/Components/PaginationLinks.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    blog: Object,
    comments: Object,
    comment_status: String,
})
const formComment = useForm({
    comment: null,
    blog_id: props.blog.id,
});
const sendComment = () => {
    formComment.post(route('comment.store'), {
        onSuccess: () => formComment.reset()
    })
}

onMounted(() => {
    window.scrollTo(0, 0);
})
</script>
<template>
    <div class="grid grid-cols-3 max-w-screen-xl mx-auto py-10 gap-x-10">


        <div class="col-span-2 row-span-2">
            <div class="mb-6 flex items-center justify-between">
                <div><span class="text-xl text-zinc-700">Danh mục:</span> <span
                    class="text-xl ">{{ blog.category_name }}</span></div>
                <div><span class="text-xl text-zinc-700">Ngày đăng:</span> <span
                    class="text-xl ">{{ blog.created_at }}</span></div>
            </div>
            <div class=" h-[500px] mb-6">
                <img class="size-full object-cover" :src="`/storage/${blog.image}`" alt="">
            </div>
            <div>
                <div class="content-data" v-html="blog.content"></div>
            </div>
        </div>
        <div class="col-span-1 shadow-xl px-4 py-6 rounded-md">
            <h1 class="text-xl">Comments</h1>
            <div class="border-b my-2"></div>
            <div>
                <form @submit.prevent="sendComment">
                    <TextInput v-model="formComment.comment" :message="formComment.errors.comment"
                               label="Enter your comment"/>
                    <p class="mb-2 text-center text-green-500" v-if="comment_status">{{ comment_status }}</p>
                    <button class="primary-btn">Send</button>
                </form>
            </div>
            <div v-if="comments.data.length > 0">
                <div class="border-b my-8"></div>
                <div v-for="comment in comments.data" :key="comment.id">
                    <Comment :comment="comment"></Comment>
                </div>
                <div class="border-b"></div>
                <PaginationLinks  :paginator="comments" class="flex flex-col gap-y-4 mt-4" />
            </div>

        </div>
    </div>
</template>
<style>

.content-data h2 {
    @apply font-bold text-2xl my-2;
}

.content-data h3 {
    @apply my-2 text-lg font-bold;
}

.content-data li {
    @apply my-2 list-disc;
}

.content-data p {
    @apply text-base text-zinc-600 leading-6;
}
</style>
