<script setup>

import { watch } from 'vue';

import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    departments: Array
})

const form = useForm({
    birth_date: '',
    email: '',
    first_name: '',
    second_name: '',
    surname: '',
    second_surname: '',
    married_name: '',
    gender: '',
    cui: '',
    passport: '',
    civil_status: '',
    document_type: '',
    phone: '',
    email: '',
    confirm_email: '',
    address: '',
    department: '',
    municipality: '',
});

const genders = [
    { id: 1, name: 'M' },
    { id: 2, name: 'F' },
];

const documentTypes = [
    { id: 1, name: 'DPI' },
    { id: 2, name: 'Pasaporte' },
];

const civilStatus = [
    { id: 1, name: 'Soltero' },
    { id: 2, name: 'Casado' },
    { id: 3, name: 'Union de hecho' },
];

const submit = () => {
    console.log(form)
    form.post(route('person.store'), {
        onFinish: () =>{
            if (form.wasSuccessful) {
                alert('Persona creada con exito')
                location.reload();
            }
        },
    });
};

</script>

<template>
    <div>
        <h2 class="text-2xl text-center font-bold"> Formulario de creación de personas </h2>

        <main class="p-8">
            <form action="" @submit.prevent="submit">
                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <InputLabel for="birth_date" value="Fecha de nacimiento" />

                        <TextInput
                            id="birth_date"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="form.birth_date"
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.birth_date" />
                    </div>

                    <div>
                        <InputLabel for="first_name" value="Primer nombre" />

                        <TextInput
                            id="first_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.first_name"
                            required
                            
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>

                    <div>
                        <InputLabel for="second_name" value="Segundo nombre" />

                        <TextInput
                            id="second_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.second_name"
                            
                            autocomplete="second_name"
                        />

                        <InputError class="mt-2" :message="form.errors.second_name" />
                    </div>

                    <div>
                        <InputLabel for="surname" value="Primer apellido" />

                        <TextInput
                            id="surname"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.surname"
                            required
                            
                            autocomplete="surname"
                        />

                        <InputError class="mt-2" :message="form.errors.surname" />
                    </div>

                    <div>
                        <InputLabel for="second_surname" value="Segundo apellido" />

                        <TextInput
                            id="second_surname"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.second_surname"
                            
                            autocomplete="second_surname"
                        />

                        <InputError class="mt-2" :message="form.errors.second_surname" />
                    </div>

                    <div>
                        <InputLabel for="married_name" value="Apellido de casada" />

                        <TextInput
                            id="married_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.married_name"
                            
                            autocomplete="married_name"
                        />

                        <InputError class="mt-2" :message="form.errors.married_name" />
                    </div>

                    <div>
                        <label> Genero </label>
                        <select name="" id="slc_gender" v-model="form.gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required>
                            <option value="" disabled selected> Seleccione un genero </option>
                            <option :value="item.name" v-for="(item, index) in genders" :key="index" >
                                {{ item.name  }}
                            </option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.gender" />
                    </div>
                    

                    <div>
                        <label> Tipo de documento </label>
                        <select name="" id="slc_document_type" v-model="form.document_type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required>
                            <option value="" disabled selected> Seleccione un tipo </option>
                            <option :value="item.name" v-for="(item, index) in documentTypes" :key="index">
                                {{ item.name  }}
                            </option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.document_type" />
                    </div>

                    <div v-if="form.document_type == 'DPI'">
                        <InputLabel for="cui" value="CUI" />

                        <TextInput
                            id="cui"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.cui"
                            
                            autocomplete="cui"
                        />

                        <InputError class="mt-2" :message="form.errors.cui" />
                    </div>

                    <div v-if="form.document_type == 'Pasaporte'">
                        <InputLabel for="passport" value="Pasaporte" />

                        <TextInput
                            id="passport"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.passport"
                            
                            autocomplete="passport"
                        />

                        <InputError class="mt-2" :message="form.errors.passport" />
                    </div>

                    <div>
                        <label> Estado civil </label>
                        <select name="" id="slc_civil_status" v-model="form.civil_status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required>
                            <option value="" disabled selected> Seleccione un estado civil </option>
                            <option :value="item.name" v-for="(item, index) in civilStatus" :key="index">
                                {{ item.name  }}
                            </option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.civil_status" />
                    </div>

                    <div>
                        <InputLabel for="phone_number" value="Número telefónico trabajador" />

                        <TextInput
                            id="phone_number"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.phone"
                            required
                            
                            autocomplete="phone_number"
                        />

                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>

                    <div>
                        <InputLabel for="email" value="Correo electronico trabajador" />

                        <TextInput
                            id="email_confirm"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            
                            autocomplete="email"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <InputLabel for="confirm_email" value="Confirmar correo trabajador" />

                        <TextInput
                            id="confirm_email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.confirm_email"
                            required
                            
                            autocomplete="confirm_email"
                        />

                        <InputError class="mt-2" :message="form.errors.confirm_email" />
                    </div>

                    <div>
                        <InputLabel for="address" value="Dirección" />

                        <TextInput
                            id="address"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.address"
                            required
                            
                            autocomplete="address"
                        />

                        <InputError class="mt-2" :message="form.errors.address" />
                    </div>

                    <div>
                        <label> Seleccione un departamento </label>
                        <select name="" id="slc_department" v-model="form.department" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="" disabled  selected> Seleccione una opcion </option>
                            <option :value="item.name" v-for="(item, index) in departments" :key="index">
                                {{ item.name }}
                            </option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.department" />
                    </div>

                    <div>
                        <label> Seleccione un municipio </label>
                        <select name="" id="slc_municipality" v-model="form.municipality" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="Municipio 1"> Municipio 1 </option>
                            <option value="Municipio 2"> Municipio 2 </option>
                            <option value="Municipio 3"> Municipio 3 </option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.municipality" />
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </main>
    </div>
</template>