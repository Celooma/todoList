<script setup>
const props = defineProps({
    task: Object
});

const closeModal = () => {
    console.log('closeModal');
};

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">View Task Information</h2>
        </header>

        <div class="mt-5">
            <p class="text-md text-gray-600 mb-1"> <span class="text-lg text-black">Title</span> : {{ props.task.title }}</p>
            <p class="text-md text-gray-600 mb-1"><span class="text-lg text-black">Description</span> : {{ props.task.description }}</p>
            <p class="text-md text-gray-600 mb-1"><span class="text-lg text-black">Status</span> : {{ props.task.is_completed ? 'Completed' : 'Not Completed' }}</p>
            <p v-if="props.task.is_completed" class="text-md text-gray-600 mb-1"><span class="text-lg text-black">Completion date </span>: {{ props.task.completed_at }}</p>
        </div>

    </section>
</template>
