<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div v-if="loading" class="text-center">
                    <v-progress-circular :size="50" indeterminate></v-progress-circular>
                </div>

                <div v-else>
                    <form v-on:submit.prevent="submit">
                        <div class="form-group row">
                            <label for="id" class="col-sm-3 col-form-label">ID</label>
                            <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="task.id">
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-3 col-form-label">Content</label>
                            <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                        </div>
                        <div class="form-group row">
                            <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                            <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
                        </div>
                        <SubmitButtonComponentVue @submit-event="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SubmitButtonComponentVue from "./atoms/SubmitButtonComponent.vue";

export default {
    props: {
        taskId: Number
    },
    data() {
        return {
            task: [],
            loading: true,
        }
    },
    methods: {
        getTask() {
            axios.get('/api/tasks/' + this.taskId)
                .then((res) => {
                    this.task = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        submit() {
            axios.put('/api/tasks/' + this.taskId, this.task)
                .then((res) => {
                    this.$router.push({ name: 'task.list' });
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    mounted() {
        this.getTask()
    },
    components: {
        SubmitButtonComponentVue,
    }
}
</script>
