<script setup>
import UserLayout from './Layout/UserLayout.vue'

defineProps({
    orders: Array
})

const price = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP'
});

</script>
<template>
    <UserLayout>

        <div class="relative  max-w-screen-xl py-24 mx-auto overflow-x-auto">
            <table v-show="order.order_items.length > 0" v-for="order in orders" :key="order.id"
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-black">
                            Order ID # {{ order.id }}
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in order.order_items" :key="item.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{item.product.title}}
                        </th>
                        <td class="px-6 py-4">
                           {{item.product.brand.name}}
                        </td>
                        <td class="px-6 py-4">
                            {{item.product.category.name}}
                        </td>
                        <td class="px-6 py-4">
                            {{price.format(item.product.price)}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </UserLayout>
</template>