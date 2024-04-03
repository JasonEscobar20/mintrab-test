<script setup>

const props = defineProps({
    person: Object
});

console.log(props.person)

</script>

<template>
    <div>
        <h2 class="text-2xl text-center mt-5"> Detalle de persona </h2>

        <main class="p-10">
            <h2 class="mt-5 divider divider-start"> Informacion personal </h2>

            <div class="flex flex-col gap-4">
                <span> <strong> Primer Nombre </strong>: {{ person.first_name }} </span>
                <span> <strong> Segundo Nombre </strong>: {{ person.second_name }} </span>
                <span> <strong> Primer Apellido </strong>: {{ person.surname }} </span>
                <span> <strong> Segundo Apellido </strong>: {{ person.second_surname }} </span>
                <span> <strong> Apellido de casada </strong>: {{ person.married_name }} </span>
                <span> <strong>Tipo de documento </strong>: {{ person.document_type }} </span>
                <span v-if="person.document_type == 'DPI'"> <strong> CUI </strong>: {{ person.cui }} </span>
                <span v-if="person.document_type == 'Pasaporte'"> <strong> Pasaporte </strong>: {{ person.passport }} </span>
                <span> <strong> Fecha de nacimiento </strong>: {{ person.birth_date }} </span>
                <span> <strong> Telefono </strong>: {{ person.phone }} </span>
                <span> <strong> email </strong>: {{ person.email }} </span>
                <span> <strong>Genero </strong>: {{ person.gender }} </span>
                <span> <strong> Estado civil </strong>: {{ person.civil_status }} </span>
                <span> <strong> Direccion </strong>: {{ person.address }} </span>
            </div>
        </main>
        
    </div>
</template>