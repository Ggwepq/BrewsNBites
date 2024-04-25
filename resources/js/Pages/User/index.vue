<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayout from './Layout/UserLayout.vue';
import Hero from './Layout/Hero.vue';
import Products from '../User/Components/Products.vue'

defineProps({
    products: Array
})


</script>

<template>
    <UserLayout>
        <!-- Hero Section Staart -->
        <Hero>

        </Hero>
        <!-- Hero End -->
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Latest Product List</h2>

                <Products :products="products"></Products>

            </div>

            <!--- product list -->

            <!-- end -->

            <div class="flex justify-center mt-5">
                <Link :href="route('products.index')"
                    class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                View All Products</Link>

            </div>
        </div>

    </UserLayout>
</template>


