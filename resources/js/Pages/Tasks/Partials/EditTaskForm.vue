<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import {onMounted, onBeforeMount} from 'vue';

const props = defineProps({
    task: Object
});


const form = useForm({
    title: props.task.title,
    description: props.task.description,
    is_completed: !!props.task.is_completed || false,
    id: props.task.id,
});

const closeModal = () => {
    console.log('closeModal');
   // emit('update:openModal', false);
    //this.$emit('childEvent', false);
};

const EditTask = () => {
    form.patch(route('tasks.update'), {
        preserveScroll: true,
        onSuccess: () => closeModal()
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Edit Task </h2>
        </header>

        <form @submit.prevent="EditTask" class="mt-6 space-y-6">
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

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="is_completed" v-model:checked="form.is_completed" />
                    <span class="ml-2 text-sm text-gray-600">Mark as completed</span>
                </label>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-green-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
