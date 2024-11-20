<template>
    <div>
        <Head>
            <title>Home</title>
        </Head>

        <section class="h-screen bg-zinc-200">
            <div class="grid grid-cols-2 max-w-screen-xl mx-auto h-full">
                <div class="flex items-center">
                    <div>
                        <h1 class="font-bold text-[90px] leading-[90px]">Brand New Collection</h1>
                        <p class="mt-10 mb-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis dolor
                            dolorem ducimus ipsa
                            necessitatibus nisi!</p>
                        <div class="grid grid-cols-3">
                            <div class="space-x-3"><span><font-awesome-icon
                                :icon="['fas', 'circle-check']"/></span><span>Top Brands</span></div>
                            <div class="space-x-3"><span><font-awesome-icon
                                :icon="['fas', 'circle-check']"/></span><span>High Quality</span></div>
                            <div class="space-x-3"><span><font-awesome-icon
                                :icon="['fas', 'circle-check']"/></span><span>Free Delivery</span></div>
                        </div>
                        <button class="mt-16 py-4 px-6 text-white bg-red-500">EXPLORE NOW</button>
                    </div>

                </div>
                <div class="h-full w-full">
                    <img class="h-[500px] mx-auto mt-[100px] object-cover" src="../Images/home_hero.jpg" alt="">
                </div>
            </div>
        </section>
        <section class="bg-black h-52">
            <div class="grid grid-cols-4 max-w-screen-xl mx-auto text-white h-full text-center">
                <div class="flex items-center justify-center h-full">
                    <div>
                        <div class="text-[32px] mb-4">
                            <font-awesome-icon :icon="['fas', 'credit-card']"/>
                        </div>
                        <div>
                            <h1 class="font-bold">Secure Payment</h1>
                            <p class="text-zinc-400">100% secure payment</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-full">
                    <div>
                        <div class="text-[32px] mb-4">
                            <font-awesome-icon :icon="['fas', 'sack-dollar']"/>
                        </div>
                        <div>
                            <h1 class="font-bold">30 Days Return</h1>
                            <p class="text-zinc-400">If good have problems</p>
                        </div>
                    </div>

                </div>
                <div class="flex items-center justify-center h-full">
                    <div>
                        <div class="text-[32px] mb-4">
                            <font-awesome-icon :icon="['fas', 'headphones']"/>
                        </div>
                        <div>
                            <h1 class="font-bold">24/7 Support</h1>
                            <p class="text-zinc-400">Dedicated support</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-full">
                    <div>
                        <div class="text-[32px] mb-4">
                            <font-awesome-icon :icon="['fas', 'hand-holding-dollar']"/>
                        </div>
                        <div>
                            <h1 class="font-bold">Free Delivery</h1>
                            <p class="text-zinc-400">For all order over 80$</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-black">
            <div class="grid grid-cols-3 max-w-screen-xl mx-auto py-40 text-white gap-x-10">
                <div class="relative">
                    <img class="-z-10 h-full w-full object-contain" src="../Images/home_hero.jpg"
                         alt="">
                    <div class="absolute bottom-0 left-0 w-11/12 py-8 z-10 bg-black pl-16 opacity-80">
                        <p>461 article</p>
                        <h1 class="mt-2 text-2xl font-bold">Japan</h1>
                    </div>
                </div>
                <div class="relative">
                    <img class="-z-10 h-full w-full object-contain" src="../Images/home_hero.jpg"
                         alt="">
                    <div class="absolute bottom-0 left-0 w-11/12 py-8 z-10 bg-black pl-16 opacity-80">
                        <p>461 article</p>
                        <h1 class="mt-2 text-2xl font-bold">VN</h1>
                    </div>
                </div>
                <div class="relative">
                    <img class="-z-10 h-full w-full object-contain" src="../Images/home_hero.jpg"
                         alt="">
                    <div class="absolute bottom-0 left-0 w-11/12 py-8 z-10 bg-black pl-16 opacity-80">
                        <p>461 article</p>
                        <h1 class="mt-2 text-2xl font-bold">China</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="max-w-screen-xl mx-auto py-20">
            <p class="text-center">Check out popular travel</p>
            <h1 class="text-center mt-4 mb-6 font-bold text-[32px]">Popular travels</h1>
            <div class="grid grid-cols-3 gap-x-12">
                <div>
                    <div class="h-[420px]">
                        <img class="size-full" src="../Images/home_hero.jpg" alt="">
                    </div>
                    <h1 class="mt-4 font-bold leading-5 text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Excepturi, non?</h1>
                    <p class="my-5 text-zinc-400 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusamus adipisci ea minima nemo neque nisi perspiciatis placeat recusandae temporibus
                        voluptatum?</p>
                    <p>IN LIFESTYLE / ON DECEMBER 24, 2021</p>
                </div>
                <div>
                    <div class="h-[420px]">
                        <img class="size-full" src="../Images/home_hero.jpg" alt="">
                    </div>
                    <h1 class="mt-4 font-bold leading-5 text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Excepturi, non?</h1>
                    <p class="my-5 text-zinc-400 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusamus adipisci ea minima nemo neque nisi perspiciatis placeat recusandae temporibus
                        voluptatum?</p>
                    <p>IN LIFESTYLE / ON DECEMBER 24, 2021</p>
                </div>
                <div>
                    <div class="h-[420px]">
                        <img class="size-full" src="../Images/home_hero.jpg" alt="">
                    </div>
                    <h1 class="mt-4 font-bold leading-5 text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Excepturi, non?</h1>
                    <p class="my-5 text-zinc-400 leading-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusamus adipisci ea minima nemo neque nisi perspiciatis placeat recusandae temporibus
                        voluptatum?</p>
                    <p>IN LIFESTYLE / ON DECEMBER 24, 2021</p>
                </div>
            </div>
        </section>
        <section class="py-20 max-w-screen-xl mx-auto">
            <div class="relative h-[500px]">
                <img class="z-0 absolute size-full" src="../Images/home-page-email.jpg" alt="">
                <div class="absolute inset-0 z-10 bg-black opacity-60"></div>
                <div class="z-30 absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white w-2/4">
                        <h1 class="text-4xl">Newsletter Updates</h1>
                        <p class="mt-5 text-xl">Subscribe to receive emails on new product arrivals & special offers</p>
                        <div class="flex items-center gap-x-5 mt-5">
                            <input class="py-2 w-full outline-0 rounded-[2px]" type="text">
                            <button class="py-2 px-6 text-white bg-red-500">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script setup>
</script>
