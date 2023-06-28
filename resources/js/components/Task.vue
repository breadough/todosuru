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
  },
}
</script>

<style scoped>
.strike{
 text-decoration: line-through;
}
</style>