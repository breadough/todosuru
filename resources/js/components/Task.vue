<template>
      <div>
        <input
        @change="completeTask"
        type="checkbox" 
        :id="task.id"
        :checked="task.completed"
        :disabled="task.completed"
        >
        <h4  :class = "[task.completed ? 'clr-done' : '', 'task']">
          {{ task.task }}
        </h4>
        <p  :class = "[task.completed ? 'clr-done' : '', 'task']">
          {{ task.description }}
        </p>
        <input
        @click="deleteTask"
        type="button"
        class="btn-close"
        >
        <button type="button" @click="updateTask">Update</button>
        
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
      // this.$emit('task-updated', this.task);

      const url = `http://127.0.0.1:8000/api/task/${this.task.id}/done`
      const options = {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            }
          };

      const res = await fetch(url, options);
      if (res.ok){
        console.log("Response: Marked complete!"+this.task.id)
      }else{
        console.log("Response: Failed!"+this.task.id)
      }

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
.clr-done{
  text-decoration: line-through;
  color: #bd93f9;
  opacity: 50%;
}
</style>