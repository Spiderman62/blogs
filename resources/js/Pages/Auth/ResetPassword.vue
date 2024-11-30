<script setup>
import {useForm} from "@inertiajs/vue3";
import TextInput from '../../Components/TextInput.vue';
const props = defineProps({
    token:String,
    email:String,
})
console.log(props.email)
const form = useForm({
    token: props.token,
    email: props.email,
    password: null,
    password_confirmation:null
})
const submit = () => {
    form.post(route('password.update'))
}
</script>
<template>
    <div class="my-40">
        <h1 class="title">Create a new password</h1>
        <div class="w-2/6 mx-auto">
            <form @submit.prevent="submit">
                <TextInput label="Email" type="text" name="password" :message="form.errors.email"
                           v-model="form.email"/>
                <TextInput label="Password" type="password" name="password" :message="form.errors.password"
                           v-model="form.password"/>
                <TextInput label="Confirm password" type="password" name="password" :message="form.errors.password_confirmation"
                           v-model="form.password_confirmation"/>
                <div>
                    <button class="primary-btn" :disabled="form.processing">Update</button>
                </div>
            </form>
        </div>
    </div>

</template>


