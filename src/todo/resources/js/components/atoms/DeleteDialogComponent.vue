<template>
    <v-app>
        <v-btn @click="dialog = true" color="error" elevation="5">Delete</v-btn>
        <v-dialog v-model="dialog">
        <v-card color="error">
            <v-card-title>
            <div class="white--text">削除確認</div>
            </v-card-title>
            <v-list color="default">
                <v-card-text>
                <p>こちらの予定を削除します。よろしいですか？</p>
                </v-card-text>

                <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn @click="dialog = false">閉じる</v-btn>
                <v-btn @click="confirm" color="error">削除</v-btn>
                </v-card-actions>
            </v-list>

        </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            dialog: false
        }
    },
    // props: {
    //     dialog: {
    //         type: Boolean,
    //         default: false,
    //     }
    // },
    methods: {
        confirm() {
            this.dialog = false
            this.$emit('confirm-event')
        },
    },
}
</script>

<style scoped lang="scss">
 ::v-deep .v-application--wrap {
    min-height: fit-content;
  }
</style>
