<template>
  <div class="w-3/4  flex flex-col my-10 bg-blue-700 rounded-md border-gray-700 ">
    <ToDoTitle />
    <User />
  </div>
</template>

<script>
import ToDoTitle from "./ToDo/ToDoTitle.vue";
import User from "./ToDo/User.vue";

export default {
  name: "MainSection",
  //  props: {
  //   scname: String,
  // },
  data() {
    return {
      description: "This is section",
    };
  },
  components: {
    ToDoTitle,
    User,
  },
  //   mounted() {
  //     this.name = this.scname;
  //   },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
