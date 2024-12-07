<script setup>
import {ref} from "vue";
import TextInput from "../Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    comment: {
        type: Object,
        required: true
    },
})
const form = useForm({
    id:props.comment.id,
    comment: props.comment.comment,
})
const isDot = ref(false);
const isEdit = ref(false);
const setDot = () => {
    isDot.value = !isDot.value;
}
const setEdit = () => {
    isDot.value = false;
    isEdit.value = !isEdit.value;
}
const sendUpdateComment = () => {
    isEdit.value = false;
    form.post(route('comment.update'))
}
const getDate = date =>
    new Date(date).toLocaleDateString("vi-VN", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
</script>
<template>
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-x-3">
                <div>
                    <img class="h-12 w-12 rounded-full object-cover" :src=" comment.avatar ? `/storage/${comment.avatar}` : '/storage/test/default.jpg'"
                         alt="">
                </div>
                <div>
                    <h1>{{ comment.name }}</h1>
                    <p class="text-sm text-gray-400">{{getDate(comment.created_at) }}</p>
                </div>
            </div>
            <div class="relative">
                <div v-if="isDot" @click="setDot" class="fixed top-0 left-0 right-0 bottom-0 z-[51]"></div>
                <div v-if="comment.action">
                    <font-awesome-icon v-if="!isDot" @click="setDot" class="text-xl cursor-pointer"
                                       :icon="['fas', 'ellipsis-vertical']"/>
                    <div v-else class="absolute top-[-20px] right-0 bg-white shadow rounded-sm z-[51] flex">
                        <div @click="setEdit"
                             class="p-2 block hover:bg-slate-700 hover:text-white transition-all cursor-pointer">Update
                        </div>
                        <Link :href="route('comment.delete',{id:comment.id})"
                              class="p-2 block hover:bg-red-400 hover:text-white transition-all">Delete
                        </Link>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-4">
            <form v-if="isEdit" @submit.prevent="sendUpdateComment">
                <TextInput label="Edit" v-model="form.comment"/>
                <div class="flex items-center justify-between gap-x-2">
                    <div @click="isEdit = false" class="primary-btn cursor-pointer bg-red-400 hover:bg-red-600">Cancel</div>
                    <button class="primary-btn">Update</button>
                </div>
            </form>
            <p v-else class="leading-5 text-gray-600">{{ comment.comment }}</p>
        </div>
    </div>
</template>
