

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import EditTaskForm from '@/Pages/Tasks/Partials/EditTaskForm.vue';
import ViewTask from '@/Pages/Tasks/Partials/ViewTask.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {ref} from 'vue';

defineProps({
    taskData: {
        type: Object,
    },
});

const form = useForm({
    task_id: '',
});

const deleteTask = (id) => {
    form.task_id = id;
    form.delete(route('tasks.destroy'));
};

const editTaskModal = ref(false);
const viewTaskModal = ref(false);
</script>


<template>
    <div :class="['bg-white', {'border-r-4 border-green-500': taskData.is_completed === 1}, 'rounded-lg']">
        <div class="mx-10">
            <ul role="list" class="divide-y divide-gray-100">
                <li  class="flex justify-between gap-x-6 py-5">
                  <div class="flex gap-x-4">
                    <div class="min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900">{{taskData.title}}</p>
                      <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{taskData.description}}</p>
                    </div>
                  </div>
                  <div class="gap-x-4 justify-end">
                    <PrimaryButton  :disabled="form.processing" @click="viewTaskModal = true">
                        View
                    </PrimaryButton>
                    <PrimaryButton  :disabled="form.processing" @click="editTaskModal = true">
                        Edit
                    </PrimaryButton>
                    <DangerButton   :disabled="form.processing" @click="deleteTask(taskData.id)">
                          Delete
                    </DangerButton>
                  </div>
                </li>
              </ul>
        </div>
    </div>


    <Modal :show="editTaskModal" @close="editTaskModal = false">
        <div class="p-6">
            <EditTaskForm :task="taskData"/>
        </div>
    </Modal>

    <Modal :show="viewTaskModal" @close="viewTaskModal = false">
        <div class="p-6">
            <ViewTask :task="taskData"/>
        </div>
    </Modal>
</template>
