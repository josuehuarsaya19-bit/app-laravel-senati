<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

const contador = ref(0);

const incrementar = () => {
    contador.value++;
};

const decrementar = () => {
    contador.value--;
};

const restablecer = ()=> {
    contador.value = 0;
};
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex items-center justify-center">
            <p class="text-4xl text-amber-600">Contador de josue. waaaaaaa</p> <br>
        </div>

        <br>
        <div class="flex items-center justify-center">
            <button
                @click="incrementar"
                class=" text-while bg-red-500 px-6 py-3 text-4xl font-bold hover:bg-red-600"
                
            >
                +
            </button>
        </div>
        <div class="flex items-center justify-center">
            <a
                class="text-while bg-red-500 px-6 py-3 text-4xl font-bold hover:bg-red-600"
            >
                {{ contador }}
            </a>
        </div>
        <div class="flex items-center justify-center">
            <button
                @click="decrementar"
                class="text-while bg-red-500 px-6 py-3 text-4xl font-bold hover:bg-red-600"
            >
                -
            </button>
        </div>
        <br>

        <div class="flex items-center justify-center">
            <button
                @click="restablecer"
                class=" text-while bg-green-500 px-6 py-3 text-4xl font-bold hover:bg-red-600"
                
            >
                restablecer
            </button>
        </div>
    
    </AppLayout>
</template>
