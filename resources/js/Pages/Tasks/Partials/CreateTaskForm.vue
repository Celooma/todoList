<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

//const emit = defineEmits(['update:openModal']);
const form = useForm({
    title: '',
    description: '',
});

const closeModal = () => {
    form.reset();
   // emit('update:openModal', false);
    //this.$emit('childEvent', false);
};

const createTask = () => {
    form.post(route('tasks.store'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Create Task</h2>
        </header>

        <form @submit.prevent="createTask" class="mt-6 space-y-6">
            <div>
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing" >Create</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
