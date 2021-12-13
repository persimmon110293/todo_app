<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                    </div>
                    <div class="form-group row">
                        <label for="person" class="col-sm-3 col-form-label">Person</label>
                        <input type="text" class="col-sm-9 form-control" id="person" v-model="task.person_in_charge">
                    </div>
                    <SubmitButtonComponentVue @submit-event="submit" />
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import SubmitButtonComponentVue from "./atoms/SubmitButtonComponent.vue"

export default {
    data() {
        return {
            task: {}
        }
    },
    methods: {
        submit() {
            axios.post('/api/tasks', this.task)
                .then((res) => {
                    this.$router.push({ name: 'task.list' })
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    components: {
        SubmitButtonComponentVue,
    }
}
</script>
