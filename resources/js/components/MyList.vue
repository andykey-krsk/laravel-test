<template>
  <div>
    <ul class="list-group">
      <MyItem
          v-for="(item, i) of list"
          v-bind:index="i+1"
          v-bind:item="item"
          v-on:remove-item="removeItem"
      />
    </ul>
  </div>
</template>

<script>
import MyItem from "./MyItem";
export default {
  props: ["list"],
  components: {
    MyItem,
  },
  methods: {
    removeItem(id){
      this.$emit('remove-item',id)
    }
  }
};
</script>


