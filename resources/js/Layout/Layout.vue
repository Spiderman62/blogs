<template>
    <div>
        <header class="shadow-md fixed top-0 w-full opacity-90 z-50 bg-white">
            <div class="h-20 max-w-screen-xl mx-auto flex items-center justify-between ">
                <div class="logo text-xl">
                    EnderIO
                </div>
                <nav class="flex gap-x-6 text-lg text-zinc-800">
                    <Link class=""
                          href="/"
                          as="button"
                          type="button"
                          preserve-scroll
                    >HOME
                    </Link>
                    <ul class="flex relative">
                        <li class="flex gap-x-2 group cursor-pointer">
                            CATEGORY
                            <font-awesome-icon :icon="['fas', 'sort-down']"/>
                            <ul class="absolute bg-white text-black top-[100%] left-0 w-[200%] rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">
                                <Link
                                    v-for="category in $page.props.auth.categories"

                                    :key="category.id"
                                    class="p-4 cursor-pointer hover:bg-zinc-500 hover:text-white transition block"
                                    :href="route('category',{id: category.id})"
                                >{{ category.name }}
                                </Link>
                            </ul>
                        </li>
                    </ul>
                    <Link
                        href="/about"
                        as="button"
                        type="button"
                        preserve-scroll
                    >ABOUT US
                    </Link>
                    <Link
                        href="/contact"
                        as="button"
                        type="button"
                        preserve-scroll
                    >CONTACT
                    </Link>
                </nav>
                <div class="space-x-6 text-zinc-600 flex items-center" v-if="$page.props.auth.user">
                    <Link class="flex items-center" href="/"
                          as="button"
                          type="button">
                        <div class="h-16 w-16 rounded-full overflow-hidden mr-2">
                            <img class="size-full object-cover" :src=" $page.props.auth.user.avatar ? `/storage/${$page.props.auth.user.avatar}` : '/storage/test/default.jpg'" alt="">
                        </div>
                        {{ $page.props.auth.user.name }}
                    </Link>
                    <Link :href="route('profile')"
                          as="button"
                          type="button"
                          method="get"
                    >
                        <span>Profile</span>
                    </Link>
                    <Link href="/logout"
                          as="button"
                          type="button"
                          method="post"
                    >
                        <span>Log out</span>
                    </Link>
                </div>
                <div class="space-x-6 text-zinc-600" v-else>
                    <Link href="/login"
                          as="button"
                          type="button">
                        Login
                    </Link>
                    <Link href="/register"
                          as="button"
                          type="button">
                        Register
                    </Link>
                </div>
            </div>

        </header>
        <main class="mt-20 z-0">
            <transition name="content" mode="out-in">
                <slot/>
            </transition>
        </main>
        <footer class="max-w-screen-xl mx-auto pt-16 pb-6">
            <div class="grid grid-cols-5 gap-x-8 mb-20">
                <div class="col-span-2">
                    <h1 class="text-xl font-bold">About Us</h1>
                    <p class="text-zinc-500 mt-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
                        accusantium atque corporis dicta,
                        dolor dolore ea eveniet ex incidunt ipsa ipsum iure?</p>
                    <p class="text-zinc-500 mt-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda ex
                        suscipit vel!</p>
                </div>
                <div>
                    <h1 class="text-xl font-bold mb-6">Account</h1>
                    <div class="text-zinc-500 space-y-2">
                        <p>My Account</p>
                        <p>My Wishlist</p>
                        <p>My Cart</p>
                        <p>Sign In</p>
                        <p>Check Out</p>
                    </div>

                </div>
                <div>
                    <h1 class="text-xl font-bold mb-6">Shipping</h1>
                    <div class="text-zinc-500 space-y-2">
                        <p>New Products</p>
                        <p>Best Sellers</p>
                        <p>Manufacturers</p>
                        <p>Suppliers</p>
                        <p>Specials</p>
                    </div>
                </div>
                <div>
                    <h1 class="text-xl font-bold mb-6">Contact Us</h1>
                    <div class="space-y-6">
                        <div class="text-zinc-500 space-y-1">
                            <p>Phone: 0708063423</p>
                            <p>Fax: 0708063423</p>
                        </div>
                        <div class="text-zinc-500 space-y-1">
                            <p>New York,</p>
                            <p>131 nguyen thi thap, Da Nang</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full border-dashed border-black opacity-20 border-[1px] "></div>
            <div>
                <h1 class="text-center my-20 text-3xl font-bold">EnderIO</h1>
            </div>
            <div class="w-full border-dashed border-black opacity-20 border-[1px] "></div>
            <div>
                <p class="text-center mt-20 text-sm text-zinc-500">Copyright 2024, Made by Nguyen Lam Hoang</p>
            </div>
        </footer>
    </div>


</template>
<style scoped>
.content-enter-from {
    opacity: 0;
    transform: translateY(-30px);
}

.content-enter-to {
    opacity: 1;
    transform: translateY(0px);
}

.content-enter-active, .content-leave-active {
    transition: .3s ease-in-out;
}

.content-leave-to {
    opacity: 1;
    transform: translateY(0px);
}

.content-leave-active {
    opacity: 0;
    transform: translateY(30px);
}
</style>
<script setup lang="ts">
</script>
