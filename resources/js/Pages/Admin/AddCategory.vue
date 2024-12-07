<script setup>
import LayoutAdmin from "../../Layout/LayoutAdmin.vue";
import TextInput from "../../Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
defineOptions({
    layout: LayoutAdmin,
})
const form = useForm({
    name: null,
    description: null,
})
const submit = () => {
    form.post(route('adminHandleAddCategory'));
}
</script>
<template>
    <div class="w-2/6 mx-auto py-10">
        <h1 class="text-center text-3xl font-bold mb-6">Add category</h1>
        <form @submit.prevent="submit">
            <TextInput
            label="Name category"
            :message="form.errors.name"
             v-model="form.name"/>
            <div>
                <label>Description</label>
                <textarea
                    :class="{'ring-red-500':form.errors.description}"
                    class="resize-none mb-4" rows="4" v-model.trim="form.description"></textarea>
                <p class="text-red-500 mb-4 text-xs">{{form.errors.description}}</p>
            </div>
            <div>
                <button class="bg-slate-500 w-full rounded py-1 text-white hover:bg-slate-600 transition">ADD</button>
            </div>
        </form>
    </div>
</template>
