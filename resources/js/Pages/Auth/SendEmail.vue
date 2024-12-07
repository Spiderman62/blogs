<script setup>
import {useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    email: null,
})
defineProps({
    message: String,
    error:String
})
const resend = () => {
    form.post(route('verification.send'),{
        onSuccess:()=> form.reset()
    })
}
</script>
<template>
    <div>
        <section class="max-w-screen-sm mx-auto shadow p-4 bg-white rounded-sm mt-28">
            <h1>Make sure your email has been register!</h1>
            <p class="text-green-500 mt-4">{{ message }}</p>
            <p class="text-red-500 mt-4">{{ error }}</p>
            <TextInput label="Resend email" v-model="form.email" :message="form.errors.email" />
            <form @submit.prevent="resend">
                <button
                    :disabled="form.processing"
                    class="bg-slate-900 py-2 px-4 text-white inline-block rounded-sm mt-2"
                >Send
                </button>
            </form>
        </section>
    </div>
</template>
