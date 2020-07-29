<template>
  <div id="app" class=" flex flex-col items-center bg-blue-200 h-screen">
    <MainSection />
    <Footer></Footer>
  </div>
</template>

<script>
import Footer from "./components/Footer.vue";
import MainSection from "./components/MainSection.vue";

export default {
  name: "App",
  components: {
    MainSection,
    Footer,
  },
};
</script>

<style></style>
