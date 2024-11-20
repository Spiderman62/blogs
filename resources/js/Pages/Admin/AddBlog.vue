<script setup>
import LayoutAdmin from "../../Layout/LayoutAdmin.vue";
import TextInput from "../../Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";

defineOptions({
    layout: LayoutAdmin,
});
defineProps({
    categories: Object
})
const form = useForm({
    name: null,
    content: null,
    categories_id: null,
    image: null,
    preview: null
});
const submit = () => {
    form.post(route('adminHandleAddBlog'));
}
const chooseFile = e=>{
    if (form.preview) {
        URL.revokeObjectURL(form.preview);
    }
    let file = e.target.files[0];
    form.preview = file ? URL.createObjectURL(e.target.files[0]) : null;
    form.image = file ??  null;
}
</script>
<template>
    <div class="w-2/6 mx-auto py-10">
        <h1 class="text-center text-3xl font-bold mb-6">Add blog</h1>
        <form @submit.prevent="submit">
            <!-- Upload Avatar -->
                        <div class="grid place-items-center">
                            <div
                                class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300"
                            >
                                <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                                    <span class="bg-white/70 pb-2 text-center">Image</span>
                                </label>
                                <input type="file" @input="chooseFile" id="avatar" hidden/>

                                <img
                                    class="object-cover w-28 h-28"
                                    :src="form.preview ?? 'storage/test/default.jpg'"
                                />
                            </div>

                            <p class="error mt-2">{{ form.errors.image }}</p>
                        </div>
            <!-- End Upload Avatar -->
            <TextInput
                label="Name blog"
                :message="form.errors.name"
                v-model="form.name"/>
            <TextInput
                label="Content blog"
                :message="form.errors.content"
                v-model="form.content"/>


            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select an
                option</label>
            <select
                v-model="form.categories_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4">
                <option selected :value="null">Choose a country</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}
                </option>
            </select>
            <p class="error mt-2">{{ form.errors.categories_id }}</p>
            <div>
                <button class="bg-slate-500 w-full rounded py-1 text-white hover:bg-slate-600 transition" :disabled="form.processing">ADD</button>
            </div>
        </form>
    </div>
</template>
