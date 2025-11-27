<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { Pencil, Plus, Save, Trash, X } from 'lucide-vue-next';
import { onMounted, ref } from 'vue';

const categorias = ref([]);
const miNombre = ref('');

// formulario
const formulario = ref({
    nombre_categoria: '',
    descripcion: '',
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Categoria',
        href: dashboard().url,
    },
];

const mostrarModals = ref(false);

const listarCategoria = async () => {
    try {
        const respuesta = await axios.get('/categorias-data');
        console.log(respuesta);
        if (respuesta.data.success) {
            categorias.value = respuesta.data.data;
            miNombre.value = respuesta.data.nombre;
        }
    } catch (error: any) {}
};
const abrirModal = () => {
    mostrarModals.value = true;
};

const cerrarModal = () => {
    mostrarModals.value = false;
};

const enviarFormulario = () => {
    console.log('Josue Huarsaya');
    console.log(formulario.value);
}
onMounted(listarCategoria);
</script>

<template>
    <Head title="Categoria" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col items-center justify-center">
            <div class="mt-4 flex flex-col items-center justify-center">
                <p class="text-2xl text-amber-600">Categoria 😁</p>
                <small>{{ miNombre }}</small>
                <div>
                    <br />
                    <a
                        class="group relative inline-flex items-center overflow-hidden rounded-sm bg-indigo-600 px-8 py-3 text-white"
                        href="#"
                        @click="abrirModal"
                    >
                        <span
                            class="absolute -start-full transition-all group-hover:start-4"
                        >
                            <svg
                                class="size-5 rtl:rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <Plus />
                            </svg>
                        </span>
                        <span
                            class="text-sm font-medium transition-all group-hover:ms-4"
                        >
                            agregar
                        </span>
                    </a>
                </div>
            </div>
            <div>
                <div class="overflow-x-auto">
                    <table
                        class="min-w-full divide-y-2 divide-gray-200 dark:divide-gray-700"
                    >
                        <thead class="ltr:text-left rtl:text-right">
                            <tr
                                class="*:font-medium *:text-gray-900 dark:*:text-white"
                            >
                                <th class="px-3 py-2 whitespace-nowrap">
                                    Nombre
                                </th>
                                <th class="px-3 py-2 whitespace-nowrap">
                                    Descripción
                                </th>
                                <th class="px-3 py-2 whitespace-nowrap">
                                    Estado
                                </th>
                                <th class="px-3 py-2 whitespace-nowrap">
                                    Opciones
                                </th>
                            </tr>
                        </thead>

                        <tbody
                            class="divide-y divide-gray-200 *:even:bg-gray-50 dark:divide-gray-700 dark:*:even:bg-gray-800"
                        >
                            <tr
                                v-for="item in categorias"
                                :key="item.id"
                                class="*:text-gray-900 *:first:font-medium dark:*:text-white"
                            >
                                <td class="px-3 py-2 whitespace-nowrap">
                                    {{ item.nombre_categoria }}
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    {{ item.descripcion }}
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    {{ item.estado }}
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap"></td>
                                <div class="flex flex-row gap-4">
                                    <a
                                        class="inline-block rounded-sm border border-current px-8 py-3 text-sm font-medium text-green-600 transition hover:scale-110 hover:text-red-600 hover:shadow-xl"
                                        href="#"
                                    >
                                        <Pencil />
                                    </a>
                                    <a
                                        class="inline-block rounded-sm border border-current px-8 py-3 text-sm font-medium text-red-600 transition hover:scale-110 hover:text-black hover:shadow-xl"
                                        href="#"
                                    >
                                        <Trash class="" />
                                    </a>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- piuhjhkjkjh -->

                <div
                    class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4"
                    role="dialog"
                    aria-modal="true"
                    aria-labelledby="modalTitle"
                    v-if="mostrarModals"
                >
                    <div
                        class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-gray-900"
                    >
                        <h2
                            id="modalTitle"
                            class="text-xl font-bold text-gray-900 sm:text-2xl dark:text-white"
                        >
                            Registro categoria
                        </h2>

                        <form class="mt-4" @submit.prevent="enviarFormulario">
                            <div class="mb-3">
                                <label for="nombre_categoria">
                                    <span
                                        class="text-sm font-medium text-gray-700 dark:text-gray-200"
                                    >
                                        Nombre
                                    </span>
                                    <input
                                        type="text"
                                        id="nombre_categoria"
                                        v-model="formulario.nombre_categoria"
                                        class="mt-0.5 w-full rounded border-gray-300 p-1 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                                    />
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion">
                                    <span
                                        class="text-sm font-medium text-gray-700 dark:text-gray-200"
                                    >
                                        descripcion
                                    </span>
                                    <input
                                        type="text"
                                        id="descripcion"
                                        v-model="formulario.descripcion"
                                        class="mt-0.5 w-full rounded border-gray-300 p-1 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                                    />
                                </label>
                            </div>

                            <footer class="mt-6 flex justify-end gap-2">
                                <button
                                    type="button"
                                    class="flex items-center justify-center gap-2 rounded bg-gray-100 px-10 py-1 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
                                    @click="cerrarModal"
                                >
                                    <X />Cancel
                                </button>

                                <button
                                    type="button"
                                    @click="enviarFormulario"
                                    class="flex items-center justify-center gap-2 rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700"
                                >
                                    <Save />guardar
                                </button>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
