<template>
  <div>
    <div class="input-data flex  justify-between m-8">
      <input
        class="appearance-none w-5/6 block bg-gray-200 text-gray-700  
        border-gray-200 rounded-md py-3 px-4 
        leading-tight focus:outline-none 
     focus:bg-white focus:border-gray-500"
        type="text"
        placeholder="Please enter your task"
      />
      <button type="submit" class="btn btn-blue">Add</button>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.btn {
  @apply font-bold py-3 px-6 rounded-md;
}
.btn-blue {
  @apply bg-gray-500 text-white;
}
.btn-blue:hover {
  @apply bg-gray-700;
}
</style>
