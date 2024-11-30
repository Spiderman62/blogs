<script setup>
import {useForm} from "@inertiajs/vue3";
import TextInput from '../../Components/TextInput.vue';
defineProps({
    status:String,
})
const form = useForm({
    email: null,
})
const submit = () => {
    form.post(route("password.email"));
}
</script>
<template>
    <div class="my-40">
        <div class="w-2/6 mx-auto">
            <form @submit.prevent="submit">
                <div>
                    <p class="mb-2 text-center text-2xl font-bold">Please check your email</p>
                </div>
                <p>{{status}}</p>
                <TextInput label="Email" name="email" :message="form.errors.email" v-model="form.email"/>
                <div>
                    <button class="primary-btn" :disabled="form.processing">Send</button>
                </div>
            </form>
        </div>
    </div>

</template>


