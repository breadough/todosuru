<template>
    <div class="box" v-for="task in tasks">
      <Task 
        :key="task.id"
        :task="task"
        @task-updated="completeTask(task.id)"
        @task-deleted="deleteTask(task.id)"
      />
    </div>
    
</template>

<script>
import Task from "./Task.vue"

export default{
  name: 'Tasks',
  props: {
    tasks: Array,
  },
  components:{
    Task,
  },
  emits: ['complete-task', 'delete-task'],
  methods: {
    completeTask(taskId){
      this.$emit('complete-task', taskId);
    },
    deleteTask(taskId){
      this.$emit('delete-task', taskId);
    },
  },
}
</script >