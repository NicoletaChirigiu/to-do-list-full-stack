<template>
  <div class="list">
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <div v-for="task in todos" :key="task.id" class="task">
      <div class="input-task">
        <input
          type="checkbox"
          :id="task.id"
          :checked="task.completed"
          @click="toogleTaskCompletion(task.id)"
          class="appearance-none"
        />
        <i class="material-icons text-green-800" :class="{display: !task.completed}">&#xe5ca;</i>
        <i class="material-icons text-red-700" :class="{display: task.completed}">&#xe5c9;</i>
        <label
          :for="task.id"
          :class="{ striked: task.completed }"
          class="todo-task"
        >
          {{ task.description }}
        </label>
      </div>
      <button
        type="submit"
        :id="task.id"
        @click="deleteTask(task.id)"
        class="todo-task"
      >
        Delete <i class="material-icons">&#xe872;</i>
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { eventBus } from "../../main";

export default {
  data() {
    return {
      todos: null,
      updateTask: [],
    };
  },
  methods: {
    toogleTaskCompletion(taskId) {
      this.todos.forEach((element) => {
        if (element.id === taskId) {
          element.completed = !element.completed;
          this.updateTask.push({
            id: element.id,
            completed: element.completed,
            description: element.description,
          });
        }
      });
      this.updateCompletion();
    },

    getTasks() {
      axios
        .get("http://localhost:7777/read-task")
        .then((response) => {
          if (response.data) {
            this.todos = response.data;
          } else {
            alert("Something went wrong");
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },

    updateCompletion() {
      this.axios
        .post("http://localhost:7777/completion-task", this.updateTask)
        .catch((e) => {
          console.log(e);
        });
    },
    emitUpdateTasks() {
      eventBus.$on("updateTodo", this.getTasks);
    },

    deleteTask(taskId) {
      this.axios
        .post("http://localhost:7777/delete-task", {
          id: taskId,
        })
        .then(() => {
          this.getTasks();
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
  mounted() {
    this.getTasks();
    this.emitUpdateTasks();
  },
};
</script>

<style lang="scss" scoped>
.list {
  // margin: 10px;
  border-radius: 5px;

  .task {
    margin: 10px;
    padding: 2px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    .input-task {
      width: 100%;
    }
    .striked {
      text-decoration: line-through;
    }
  }
  button {
    font-size: 0.8rem;
    margin: 0 10px;
  }
  .todo-task {
    @import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap");
    font-family: "Dancing Script", cursive;
    font-size: 1.5em;
    &:hover {
      cursor: pointer;
      color: darkred;
    }
  }
}

.display {
  display: none;
}

@media (min-width: 751px) {
  label {
    margin: 5px;
    text-transform: capitalize;
  }
}

@media (max-width: 750px) {
  label {
    width: 10rem;
    display: inline-block;
    word-wrap: break-word;
  }
}
</style>
