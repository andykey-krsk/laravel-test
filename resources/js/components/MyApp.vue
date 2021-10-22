<template>
    <div class="container-sm">
        <h1 class="mb-3">Список</h1>
        <div class="row mb-3">
            <AddList
                @add-item="addItem"
            />
        </div>
        <hr>
        <MyList
            v-bind:list="list"
            @remove-item="removeItem"
        />
        <div class="d-grid">
            <button @click="store" :disabled="list.length ? false : true" class="btn btn-secondary">Отправить
            </button>
        </div>
        <div>{{ error }}</div>
    </div>
</template>

<script>
import MyList from './MyList'
import AddList from './AddList'
import axios from 'axios'

export default {
    name: "MyApp",
    data() {
        return {
            list: [],
            error: ''
        }
    },
    components: {
        MyList,
        AddList
    },
    methods: {
        addItem(item) {
            this.list.push(item)
        },
        removeItem(id) {
            this.list = this.list.filter(i => i.id !== id)
        },
        dublicate(array){
                let err = []
                array.forEach(elem => err.push(elem.title))
            return err.every((e, i, a) => a.indexOf(e) === i)
        },
        store() {
            if (!this.dublicate(this.list)) {
                this.error = 'В списке есть дубликаты';
            } else {
                axios.post('/api/mylist', this.list, {
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                .then(res => {
                    this.error = res.data
                })
                .catch(err => {
                    console.log(err.response.data)
                })
            }
        }
    }
}
</script>

<style>

button {
    margin: 0.5rem;
}
</style>
