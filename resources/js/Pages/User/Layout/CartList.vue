<script setup>
import { computed, reactive } from 'vue'
import UserLayout from './UserLayout.vue';
import { router, usePage } from '@inertiajs/vue3'

const cartProps = usePage().props.cart.data.items;
const productsProps = usePage().props.cart.data.products;
const totalProps = usePage().props.cart.data.total;

const carts = computed(() => cartProps)
const products = computed(() => productsProps)
const total = computed(() => totalProps)
const itemId = (id) => carts.value.findIndex((item) => item.product_id === id);

// Price formatter
const price = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP'
});

const update = (product, quantity) =>
    router.patch(route('cart.update', product), {
        quantity,
    });

//remove from cart
const remove = (product) => router.delete(route('cart.delete', product));

const addressForm = reactive({
    address1: null,
    city: null,
    region: null,
    zipcode: null,
    country_code: null,
    type: null,
})

const formFilled = computed(() => {
    return (addressForm.address1 != null &&
        addressForm.city != null &&
        addressForm.region != null &&
        addressForm.zipcode != null &&
        addressForm.country_code != null &&
        addressForm.type != null)
});

defineProps({
    userAddress: Object
})

function submit() {
    router.visit(route('checkout.store'), {
        method: 'post',
        data: {
            carts: cartProps,
            products: productsProps,
            total: totalProps,
            address: addressForm
        }
    })
}

</script>

<template>
    <UserLayout>
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 md:w-1/2 rounded-lg sm:mr-10 p-10">

                    <!-- list of cart -->

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Image</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Qty
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-32 p-4">
                                    <img v-if="product.product_images.length > 0"
                                        :src="`/${product.product_images[0].image}`" alt="Apple Watch">
                                    <img v-else
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                                        alt="Apple Watch">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ product.title }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <button @click.prevent="update(product, carts[itemId(product.id)].quantity - 1)"
                                            :disabled="carts[itemId(product.id)].quantity <= 1"
                                            :class="[carts[itemId(product.id)].quantity > 1 ? 'cursor-pointer text-purple-600' : 'cursor-not-allowed text-gray-300 dark:text-gray-500', 'inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700']"
                                            type="button">
                                            <span class="sr-only">Quantity button</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <div>
                                            <input type="number" id="first_product"
                                                v-model="carts[itemId(product.id)].quantity"
                                                class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="1" required>
                                        </div>
                                        <button @click.prevent="update(product, carts[itemId(product.id)].quantity + 1)"
                                            class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                            type="button">
                                            <span class="sr-only">Quantity button</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ price.format(product.price) }}
                                </td>
                                <td class="px-6 py-4">
                                    <a @click="remove(product)"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- end -->

                </div>
                <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Summary</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Total: {{ price.format(total) }}</p>

                    <div v-if="userAddress">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Shipping Address</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">{{ userAddress.address1 }}, {{ userAddress.city }},
                            {{ userAddress.region }}, {{ userAddress.country_code }}</p>
                        <p class="leading-relaxed mb-5 text-gray-600">Or Add Below</p>
                    </div>

                    <div v-else>
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Shipping Address</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">Add Shipping Address to Continue</p>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">Address 1</label>
                            <input type="text" id="name" name="name" v-model="addressForm.address1" placeholder="Ex. 123 Tondo"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="city" class="leading-7 text-sm text-gray-600">City</label>
                            <input type="text" id="email" name="city" v-model="addressForm.city" placeholder="Ex. Manila" 
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="region" class="leading-7 text-sm text-gray-600">Region</label>
                            <input type="text" id="email" name="region" v-model="addressForm.region" placeholder="Ex. NCR"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="zip" class="leading-7 text-sm text-gray-600">Zipcode</label>
                            <input type="text" id="name" name="zip" v-model="addressForm.zipcode" placeholder="Ex. 1230"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="country" class="leading-7 text-sm text-gray-600">Country</label>
                            <input type="text" id="email" name="country" v-model="addressForm.country_code" placeholder="Ex. Philippines"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="type" class="leading-7 text-sm text-gray-600">Address Type</label>
                            <input type="text" id="name" name="type" v-model="addressForm.type" placeholder="Ex. Home"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button v-if="formFilled || userAddress"
                            class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Checkout</button>
                        <button v-else
                            class="text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded text-lg">Add
                            Address</button>
                    </form>
                </div>
            </div>
        </section>
    </UserLayout></template>