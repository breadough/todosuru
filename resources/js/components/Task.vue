<template>
      <div>
        <input 
        @change="completeTask"
        type="checkbox" 
        :id="task.id"
        :checked="task.completed"
        :disabled="task.completed"
        >
        <h4 :class = "[task.completed ? 'strike' : '', 'task']">
          {{ task.task }}
        </h4>
        <input
        @click="deleteTask"
        type="button"
        class="btn-close"
        >
      </div>
</template>

<script>

export default {
  name: 'Task',
  props: {
    task: Object,
  },

  methods: {
    completeTask(){
      this.task.completed = !this.task.completed;
      this.$emit('task-updated', this.task);
    },
    deleteTask(){
      this.$emit('task-deleted', this.task);
    },
  },
}
</script>

<style scoped>
.strike{
 text-decoration: line-through;
}
</style>