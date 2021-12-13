<template>
    <v-app>
        <v-btn @click="submit" color="primary" elevation="5" max-width="100">Submit</v-btn>
    </v-app>
</template>

<script>
export default {
    methods: {
        submit() {
            this.$emit('submit-event');
        }
    }
}
</script>

<style scoped lang="scss">
 ::v-deep .v-application--wrap {
    min-height: fit-content;
  }
</style>
