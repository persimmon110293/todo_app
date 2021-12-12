<template>
    <div class="container">
        <div v-if="loading" class="text-center">
            <v-progress-circular :size="50" indeterminate></v-progress-circular>
        </div>

        <v-simple-table fixed-header v-else>
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Person In Charge</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(task, index) in tasks" :key="index">
                <th scope="row">{{ task.id }}</th>
                <td>{{ task.title }}</td>
                <td>{{ task.content }}</td>
                <td>{{ task.person_in_charge }}</td>
                <td>
                    <router-link v-bind:to="{ name: 'task.show', params: { taskId: task.id } }">
                        <ShowButtonComponent />
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{ name: 'task.edit', params: { taskId: task.id } }">
                        <EditButtonComponent />
                    </router-link>
                </td>
                <td>
                    <DeleteDialogComponent />
                </td>
            </tr>
            </tbody>
        </v-simple-table>
    </div>
</template>

<script>
import DeleteDialogComponent from './atoms/DeleteDialogComponent.vue';
import ShowButtonComponent from './atoms/ShowButtonComponent.vue';
import EditButtonComponent from './atoms/EditButtonComponent.vue';

export default {
    data() {
        return {
            tasks: [],
            loading: true,
            dialog: false
        };
    },
    methods: {
        getTasks() {
            axios.get("/api/tasks")
                .then((res) => {
                this.tasks = res.data;
                this.loading = false;
            })
                .catch((error) => {
                console.log(error);
            });
        },
        taskDelete(id) {
            axios.delete("/api/tasks/" + id)
                .then((res) => {
                this.getTasks();
            })
                .catch(error => {
                console.log(error);
            });
        }
    },
    mounted() {
        this.getTasks();
    },
    components: {
        DeleteDialogComponent,
        ShowButtonComponent,
        EditButtonComponent,
    }
}
</script>
