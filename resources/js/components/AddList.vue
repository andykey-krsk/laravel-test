<template>
  <form @submit.prevent="OnSubmit">
    <div class="d-grid gap-2">
      <input type="text" v-model="title" class="form-control">
    </div>
    <div class="d-grid">
      <button type="submit" :disabled="title ? false : true" class="btn btn-primary">Добавить</button>
    </div>
  </form>
</template>

<script>

export default {
  data(){
    return{
      title: "",
    }
  },
  methods: {
    OnSubmit(){
      if (this.title.trim()){
        const newItem = {
          id: Date.now(),
          title: this.title
        }

        this.$emit('add-item', newItem)
        this.title = ''
      }
    },
  }
}

</script>
