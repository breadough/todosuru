<template>
  <Header />
  <AddTask 
  @add-task="addTask"
  />
  <div class="container">
  <Tasks
  :tasks="tasks"
  @complete-task="completeTask"
  @delete-task="deleteTask"
  />
  </div>
<Footer />
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import Tasks from "./components/Tasks.vue";
import AddTask from "./components/AddTask.vue";

export default{
  name: 'App',
  components: {
    Header,
    Footer,
    Tasks,
    AddTask,
  },
  data() {
    return {
      tasks: [],
    }
  },
  methods:{
    async fetchTasks() {
      const res = await fetch('http://127.0.0.1:8000/api/task')
      const data = await res.json()
      return data.data
    },

    async completeTask(taskId){
      const url = `http://127.0.0.1:8000/api/task/${taskId}/done`
      const options = {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            }
          };

      const res = await fetch(url, options);
      if (res.ok){
        console.log("Response: Marked complete!"+taskId)
      }else{
        console.log("Response: Failed!"+taskId)
      }
    },
    async deleteTask(taskId){
      console.log("Delete from App")
      this.tasks = this.tasks.filter(task => task.id !== taskId);
      console.log(this.tasks);
    },
    async addTask(newTask){
      console.log('Added Task to App')
      this.tasks.push(newTask)
      console.log(this.tasks);
    }
},
async created() {
    this.tasks = await this.fetchTasks()
    console.log(this.tasks);
  },
}
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Red+Hat+Mono:wght@300&display=swap');
@import url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');

body{
  background: #282a36;
  color: #bd93f9;
  font-family: 'Red Hat Mono', monospace;
}

.container{
  max-width: 800px;
  margin: 10px auto;
  overflow: auto;
  padding: 30px;
}

input[type="checkbox"]{
   cursor: pointer;
}

.box{
  display: flex;
  align-items: center;
  justify-content: space-between;
  border: 2px solid #ff79c6;
  padding: 10px 20px;
  margin: 10px;
}

.clr-green{
    border: 2px solid #d6c210;
}
</style>