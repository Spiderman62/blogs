<template>
    <div class="">
        <header class="py-6 bg-slate-700">
            <nav class="max-w-screen-xl mx-auto text-lg text-white flex justify-between">
                <div class="space-x-6">
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
                <div class="flex items-center gap-x-8">
                    <p>Admin: {{ $page.props.auth.user.name }}</p>
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
