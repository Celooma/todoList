<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateTaskForm from './Partials/CreateTaskForm.vue';
import TaskList from './Partials/TaskList.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref, onMounted } from 'vue';

defineProps({
    tasks: {
        type: [],
    }
});
const createTaskModal = ref(false);
// const closeModal = () => {
//     createTaskModal.value = false;
//     form.reset();
// };

const triggerCreateTaskModal = () => {
    createTaskModal.value = true;
};


</script>

<template>
    <Head title="Tasks" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tasks</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6">
                        <DangerButton @click="triggerCreateTaskModal">Create Task</DangerButton>
                    </div>
                </div>
                <div>
                    <TaskList v-for="task in tasks" :key="task.id" :taskData="task"/>
                </div>
                
            </div>

            <Modal :show="createTaskModal" @close="createTaskModal = false">
                <div class="p-6">
                    <CreateTaskForm />
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>
