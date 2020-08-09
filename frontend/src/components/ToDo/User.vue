<template>
  <div>
    <div class="input-data flex  justify-between m-8">
      <input
        class="appearance-none w-5/6 block bg-gray-200 text-gray-700  
        border-gray-200 rounded-md py-3 px-4 
        leading-tight focus:outline-none 
     focus:bg-white focus:border-gray-500"
        type="text"
        placeholder="Please enter your task! Maximum 50 chars"
        v-model="description"
        maxlength="50"
      />
      <button type="submit" class="btn btn-blue" @click="taskSumbit">
        Add
      </button>
    </div>
  </div>
</template>
<script>
import { eventBus } from "../../main";

export default {
  data() {
    return {
      description: "",
    };
  },
  methods: {
    taskSumbit(e) {
      e.preventDefault();
      if (this.description != "") {
        this.axios
          .post("http://localhost:7777/create-task", {
            description: this.description,
          })
          .then((response) => {
            if (response.data === this.description) {
              eventBus.$emit("updateTodo");
              this.description = "";
            }
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        alert("Please enter a task!");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@media (max-width: 800px) {
  .btn {
    font-weight: 300;
    margin-left: 10px;
    padding: 12px 12px;
    border-radius: 0.375rem;
  }
  .btn-blue {
    @apply bg-gray-500 text-white;
  }
}

@media (min-width: 801px) {
  .btn {
    @apply font-bold py-3 px-6 rounded-md;
  }
  .btn-blue {
    @apply bg-gray-500 text-white;
  }
  .btn-blue:hover {
    @apply bg-gray-700;
  }
}
</style>
