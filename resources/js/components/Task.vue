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
  emits: ['task-deleted'],
  methods: {
    async completeTask(){
      this.task.completed = !this.task.completed;
      this.$emit('task-updated', this.task);
    },
    async deleteTask(){
      console.log(this.task.id);
      
      const url = `http://127.0.0.1:8000/api/task/${this.task.id}`
      const options = {
        method: 'DELETE',
        headers: {
          'Content-Type':'application/json'
        }
      };

      const res = await fetch(url, options);
      if (res.ok){
        console.log("Response: Delete complete!"+this.task.id)
        this.$emit('task-deleted', this.task.id);
      }else{
        console.log("Response: Delete Failed!"+this.task.id)
      }
    }
  },
}
</script>

<style scoped>
.strike{
 text-decoration: line-through;
}
</style>