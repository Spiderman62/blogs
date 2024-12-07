<script setup>
import TextInput from "../../Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
import {computed, ref, watch} from "vue";
import {debounce} from "lodash";

const props = defineProps({
    user: Object,
    status: String
})
const formUsername = useForm({
    name: props.user.name,
})
const setUsername = () => {
    formUsername.post(route('profile.username'))
}
const formImage = useForm({
    avatar: props.user.avatar,
    preview: null
});
const isChooseImage = ref(false);

const chooseFile = e => {
    isChooseImage.value = !isChooseImage.value;
    const file = e.target.files[0];
    if (formImage.preview) {
        URL.revokeObjectURL(formImage.preview);
    }
    formImage.preview = file ? URL.createObjectURL(file) : null;
    formImage.avatar = file ?? null;
}
const url = computed(() => {
    let getImage = null;
    if (formImage.preview) {
        getImage = formImage.preview;
    } else {
        getImage = formImage.avatar ? `/storage/${formImage.avatar}` : '/storage/test/default.jpg';
    }
    return getImage;
})
watch(isChooseImage, debounce(
    () => formImage.post(route('profile.store'), {
        avatar: formImage.avatar
    }), 100
))
const formPassword = useForm({
    current_password: null,
    password: null,
    password_confirmation: null,
});
const setPassword = () => {
    formPassword.post(route('profile.password'), {
        onSuccess: () => {
            formPassword.reset();
        },
        onError: () => {
            formPassword.reset();
        },
    })
}
</script>
<template>
    <div>
        <section class="max-w-screen-sm mx-auto my-24 space-y-6">
            <div class="shadow p-4 py-6 rounded-lg bg-white">
                <h1 class="text-2xl font-bold mb-5 text-center">Update profile</h1>
                <form class="w-2/4 mx-auto" @submit.prevent="setUsername">
                    <TextInput label="Username" v-model="formUsername.name" :message="formUsername.errors.name"/>
                    <button class="primary-btn" :disabled="formUsername.processing">Update</button>
                </form>
            </div>
            <div class="shadow p-4 rounded-lg bg-white text-center py-6">
                <h1 class="text-2xl font-bold mb-5">Update image</h1>
                <!-- Upload Avatar -->
                <div class="mx-auto">
                    <div
                        class="mx-auto relative w-28 h-28 rounded-full overflow-hidden border border-slate-300"
                    >
                        <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                            <span class="bg-white/70 pb-2 text-center">Image</span>
                        </label>
                        <input type="file" @input="chooseFile" id="avatar" hidden/>
                        <img
                            class="object-cover w-28 h-28"
                            :src="url"
                        />
                    </div>
                </div>
                <p class="mt-4 text-red-500">{{formImage.errors.avatar}}</p>
                <!-- End Upload Avatar -->
            </div>
            <div class="shadow p-4 rounded-lg bg-white py-6">
                <h1 class="text-2xl font-bold mb-5 text-center">Update password</h1>
                <form class="w-2/4 mx-auto" @submit.prevent="setPassword">
                    <p v-if="status" class="text-green-500 text-center mb-3 text-lg">{{ status }}</p>
                    <TextInput label="Current password" type="password" v-model="formPassword.current_password"
                               :message="formPassword.errors.current_password"/>
                    <TextInput label="New password" type="password" v-model="formPassword.password"
                               :message="formPassword.errors.password"/>
                    <TextInput label="Confirm new password" type="password" v-model="formPassword.password_confirmation"
                               :message="formPassword.errors.password_confirmation"/>
                    <button class="primary-btn" :disabled="formPassword.processing">Update</button>
                </form>
            </div>
        </section>
    </div>
</template>
