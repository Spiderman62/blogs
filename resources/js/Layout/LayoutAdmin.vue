<template>
    <div class="">
        <header class="py-3 bg-slate-700">
            <nav class="max-w-screen-xl mx-auto text-lg text-white flex justify-between">
                <div class="space-x-6 flex items-center">
                    <Link :href="route('admin')">
                        Dashboard
                    </Link>
                    <Link :href="route('adminCategory')">
                        Category
                    </Link>
                    <Link :href="route('adminBlog')">
                        Blog
                    </Link>
                </div>
                <div class="flex items-center gap-x-4">
                    <div class="h-16 w-16 rounded-full overflow-hidden mr-2">
                        <img class="size-full object-cover" :src="`/storage/${$page.props.auth.user.avatar}`" alt="">
                    </div>
                    <p>{{ $page.props.auth.user.name }}</p>
                    <Link href="/logout" method="post"
                          as="button"
                          type="button"
                    >
                        Logout
                    </Link>
                </div>
            </nav>
        </header>
        <main class="max-w-screen-xl mx-auto h-full">
            <slot></slot>
        </main>
    </div>
</template>
<script setup>
</script>
