<template>
    <v-app>
        <div class="container-fluid bg-dark mb-3">
            <div class="container">
                <nav class="navbar navbar-dark">
                    <span class="navbar-brand mb-0 h1">ToDo App</span>
                    <div>
                        <router-link v-bind:to="{ name: 'task.list' }">
                            <v-btn color="success" elevation="5">List</v-btn>
                        </router-link>
                        <router-link v-bind:to="{ name: 'task.create' }">
                            <v-btn color="success" elevation="5">ADD</v-btn>
                        </router-link>
                    </div>
                </nav>
            </div>
        </div>
    </v-app>
</template>

<script>
    export default {}
</script>

<style scoped lang="scss">
 ::v-deep .v-application--wrap {
    min-height: fit-content;
  }
</style>
