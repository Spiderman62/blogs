<template>

    <div class="my-40">
        <Head>
            <title>Login</title>
        </Head>
        <h1 class="title">Login to your account</h1>
        <div class="w-2/6 mx-auto">
            <form @submit.prevent="submit">
                <TextInput label="Email" name="email" type="email" :message="form.errors.email" v-model="form.email"/>
                <TextInput label="Password" type="password" name="password" :message="form.errors.password"
                           v-model="form.password"/>
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <label class="mr-1.5">Remember me</label>
                        <TextInput type="checkbox" class="mb-0" name="remember" v-model="form.remember"/>
                    </div>
                    <p class="text-slate-600">Already a user?
                        <Link :href="route('register')" class="text-link">Login</Link>
                    </p>
                </div>
                <div>
                    <button class="primary-btn" :disabled="form.processing">Login</button>
                </div>
            </form>
        </div>
    </div>

</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
    email: null,
    password: null,
    remember: null
})
const submit = () => {
    form.post('/login', {
        onError: () => {
            form.reset('password');
        }
    })
}
</script>
