<template>
    <div>
        <section class="h-80 flex items-center justify-center bg-zinc-200">
            <div class="text-center">
                <p><span class="text-zinc-400">Home</span> / <span class="font-bold">Contact</span></p>
                <h1 class="text-6xl font-bold mt-4">Contact Us</h1>
            </div>
        </section>
        <section class="max-w-screen-xl mx-auto my-20 grid grid-cols-2 gap-x-10">
            <div>
                <img src="../Images/home-hero-image_optimized.webp" alt="">
            </div>
            <div>
                <h1 class="font-bold text-4xl mb-10">Contact with us</h1>
                <div class="input-box mb-4">
                    <label for="" class="block mb-2">Name</label>
                    <input type="text" class="outline-0 border-[1px] border-zinc-300 w-full pl-1.5 pr-4 h-10">
                </div>
                <div class="input-box mb-4">
                    <label for="" class="block mb-2">Phone</label>
                    <input type="text" class="outline-0 border-[1px] border-zinc-300 w-full pl-1.5 pr-4 h-10">
                </div>
                <div class="input-box mb-4">
                    <label for="" class="block mb-2">Email Address</label>
                    <input type="text" class="outline-0 border-[1px] border-zinc-300 w-full pl-1.5 pr-4 h-10">
                </div>
                <div class="input-box">
                    <label for="" class="block mb-2">Your Message</label>
                    <textarea class="resize-none outline-0 border-[1px] border-zinc-300 w-full pl-1.5 pr-4 h-20"></textarea>
                </div>
                <button class="mt-16 py-4 px-6 text-white bg-red-500">SEND MESSAGE</button>

            </div>
        </section>
    </div>
</template>
<script setup lang="ts">
</script>
