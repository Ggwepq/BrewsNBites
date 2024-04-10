<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Header from './Header.vue';
import Footer from './Footer.vue';
import Hero from './Hero.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})


</script>

<template>

    <!-- Navbara start -->
    <Header>

    </Header>
    <!-- Navbar End -->



    <!-- Main 1 Start-->
    <slot />
    <!-- Maain 1 End -->

    <!-- Footer Staart -->
    <Footer>

    </Footer>
    <!-- Footer End -->

</template>