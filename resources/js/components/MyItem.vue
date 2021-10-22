<template>
  <li class="list-group-item">
    <div class="row align-items-start">
      <div class="col-10">
        <span>
          <strong>{{ index }}</strong>
          {{ item.title }}
        </span>
      </div>
      <div class="col-2">
        <button v-on:click="$emit('remove-item', item.id)">&times; </button>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      require: true
    },
    index: Number
  },
}
</script>

<style>
li {
  text-align: justify;
}
</style>
