# System Documentation: BrewsNBites

## 1. Project Overview

BrewsNBites is a modern e-commerce web application designed for ordering coffee brews, beverages, and food items online. The platform serves as an online storefront where customers can browse product offerings, search and filter items, manage a dynamic shopping cart, and complete purchases through a secure payment gateway. Additionally, the system provides a comprehensive administrative dashboard that enables store managers to manage inventory, upload product images, and oversee store operations.

## 2. Core Capabilities and Features

### Customer Experience
- **Interactive Product Catalog**: Customers can browse through a visually appealing catalog of coffee brews and food items with real-time dynamic search and multi-criteria filtering by category, brand, and price range.
- **Dynamic Shopping Cart**: Users can seamlessly add items to their shopping cart, adjust item quantities in real time, view instant subtotal updates, and persist their cart items across sessions.
- **Secure Stripe Checkout**: The application integrates with Stripe Payment Processing to handle card transactions safely and allows customers to store primary delivery addresses for streamlined ordering.
- **User Authentication and Profile Management**: Customers can register accounts, sign in securely, update profile details, and manage their personal shipping addresses.

### Administrative Capabilities
- **Dedicated Admin Portal**: Protected by custom administrative authentication middleware to ensure that administrative tools are accessible only to authorized staff.
- **Product Lifecycle Management (CRUD)**: Admins can easily add new menu items, update existing product details (such as names, descriptions, prices, categories, and brands), and remove discontinued products.
- **Multi-Image Media Gallery**: Store managers can upload multiple high-resolution images for each product and selectively delete individual images whenever updates are needed.

## 3. Architectural Highlights

- **Inertia.js Monolithic SPA Architecture**: BrewsNBites utilizes Inertia.js to connect a Laravel 11 backend directly with a Vue 3 frontend. This architectural choice provides the snappy single-page application (SPA) user experience without the added overhead of building and maintaining a separate REST API.
- **Role-Based Access Control (RBAC)**: Custom Laravel middleware (`admin`, `redirectAdmin`, and `auth`) strictly enforces security boundaries by separating customer-facing functionality from restricted administrative controls.
- **Component-Driven Responsive Design**: The frontend interface is built using Vue 3 along with Tailwind CSS, Flowbite, and Element Plus, delivering a responsive, mobile-friendly design system complete with interactive modals and sleek UI components.
- **Relational Data Modeling with Eloquent ORM**: The application relies on Laravel's Eloquent ORM to maintain normalized database relationships across Users, Products, Product Images, Categories, Brands, Carts, Orders, Order Items, and Payments.

## 4. Technology Stack Summary

- **Backend**: PHP 8.2+, Laravel 11 Framework
- **Frontend**: Vue 3, Inertia.js, Vite 5
- **Styling & UI**: Tailwind CSS 3, Flowbite, Element Plus, Headless UI, Heroicons
- **Database & Storage**: MySQL / SQLite, Laravel Eloquent ORM, Laravel Storage API
- **Payments & Security**: Stripe API (`stripe/stripe-php`), Laravel Sanctum, Custom RBAC Middleware
