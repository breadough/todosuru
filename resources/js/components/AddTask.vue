<template>
    <div class="box">
      <input v-model="task" type="text" placeholder="Task">
      <input v-model="description" type="text" placeholder="Description(Optional)">
      <button type="button" @click="addTask">Add New Task</button>
    </div>
</template>

<script>

export default {
    name: 'AddTask',
    data() {
        return {
            task:'',
            description:'',
        };
    },
    emits: ['add-task'],
    methods: {
        async addTask() {
            const url = 'http://127.0.0.1:8000/api/task';
            const options = {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    task: this.task,
                    description: this.description,
                }),
            };

            try {
                const res = await fetch(url, options);
                const data = await res.json()
                if (res.ok) {
                    console.log('Task added successfully')

                    this.$emit('add-task', data.data);
                    this.task = '';
                    this.description = '';
                } else {
                    console.error('Failed to add task');
                }
            } catch (error) {
                console.error('Error occurred while adding task:', error);
            }
        },
    }
}
</script>
