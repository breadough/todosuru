<template>
    <div class="box" v-for="task in tasks">
      <Task 
        :key="task.id"
        :task="task"
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
  emits: ['delete-task'],
  methods: {
    deleteTask(taskId){
      this.$emit('delete-task', taskId);
    },
  },
}
</script >