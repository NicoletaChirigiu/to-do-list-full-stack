<template>
  <div
    class=" w-full sm:w-3/4  flex flex-col sm:my-10 bg-gray-300 rounded-md border-gray-700 "
  >
    <ToDoTitle />
    <User />
    <Tasks />
  </div>
</template>

<script>
import ToDoTitle from "./ToDo/ToDoTitle.vue";
import User from "./ToDo/User.vue";
import Tasks from "./ToDo/Tasks.vue";

export default {
  name: "MainSection",
  data() {
    return {
      description: "This is section",
    };
  },
  components: {
    ToDoTitle,
    User,
    Tasks,
  },
};
</script>
