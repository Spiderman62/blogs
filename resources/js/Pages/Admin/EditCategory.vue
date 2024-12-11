<script setup>
import LayoutAdmin from "../../Layout/LayoutAdmin.vue";
import TextInput from "../../Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
defineOptions({
    layout: LayoutAdmin,
})
const props = defineProps({
    category: Object
})
const form = useForm({
    id:props.category.id,
    name: props.category.name,
    description:props.category.description,
})
const submit = () => {
    form.patch(route('adminHandleEditCategory'));
}
</script>
<template>
    <div class="w-2/6 mx-auto py-10">
        <h1 class="text-center text-3xl font-bold mb-6">Edit category</h1>
        <form @submit.prevent="submit">
            <TextInput
                label="Name category"
                :message="form.errors.name"
                v-model="form.name"/>
            <div class="mb-4">
                <label>Content</label>
                <textarea v-model.trim="form.description" class="resize-none" rows="5"></textarea>
                <p class="mt-2 text-red-400">{{form.errors.description}}</p>
            </div>
            <div>
                <button class="bg-slate-500 w-full rounded py-1 text-white hover:bg-slate-600 transition">ADD</button>
            </div>
        </form>
    </div>
</template>
