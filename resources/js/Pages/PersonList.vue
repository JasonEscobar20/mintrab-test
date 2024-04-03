<script setup>

import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    persons: Array
});


function getFullName(item) {
    return `${item.first_name} ${item.second_name ? item.second_name : ''} ${item.surname} ${item.second_surname ? item.second_surname : ''}`;
}

const form = useForm({});

function destroy(id){
    if (confirm('¿Estás seguro de eliminar este registro?')) {
        form.delete(route('person.destroy', id));
    }
}

</script>

<template>
    <h2 class="text-2xl text-center mt-4"> Lista de personas </h2>
    
    <main>
        <div class="p-10">
            <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nombre completo</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4"> Numero </th>
                    <th class="border px-4"> Dirección </th>
                    <th class="border px-4"> Estado civil </th>
                    <th class="border px-4"> Genero </th>
                    <th class="border px-4"> Acciones </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="person in persons" :key="person.id">
                    <td class="border px-4 py-2">{{getFullName(person)}}</td>
                    <td class="border px-4 py-2">{{ person.email }}</td>
                    <td class="border px-4 py-2">{{ person.phone }}</td>
                    <td class="border px-4 py-2">{{ person.address }}</td>
                    <td class="border px-4 py-2">{{ person.civil_status }}</td>
                    <td class="border px-4 py-2">{{ person.gender }}</td>
                    <td class="border px-4 py-2">
                        <a :href="route('person.show', person.id)" class="text-white btn btn-sm btn-primary">Detalle</a>
                        <button @click="destroy(person.id)" class="text-white btn btn-sm btn-error">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>
</template>