<template>

    <div class="my-40">
        <Head>
            <title>Register</title>
        </Head>
        <h1 class="title">Register a new account</h1>

        <div class="w-2/6 mx-auto">
            <form @submit.prevent="submit">
                <TextInput label="Name" name="name" :message="form.errors.name" v-model="form.name" />
                <TextInput label="Email" type="email" name="email" :message="form.errors.email" v-model="form.email" />
                <TextInput label="Password" type="password" name="password" :message="form.errors.password" v-model="form.password" />
                <TextInput label="Confirm password" type="password" name="password_confirmation" v-model="form.password_confirmation" />
                <div>
                    <p class="text-slate-600 mb-2">Already a user? <Link :href="route('login')" class="text-link">Login</Link></p>
                    <button class="primary-btn" :disabled="form.processing">Register</button>
                </div>
            </form>
        </div>
    </div>

</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import TextInput from '../../Components/TextInput.vue';
const form = useForm({
    name:null,
    email:null,
    password:null,
    password_confirmation:null,
})
const submit = ()=>{
    form.post('/register',{
        onError:()=>{
            form.reset('password','password_confirmation');
        }
    })
}
</script>

