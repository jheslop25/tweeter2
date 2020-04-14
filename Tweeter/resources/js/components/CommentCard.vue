<template>
    <div class="card p-2 m-2">
        <p class="h6">@{{username}}: {{ comment }}</p>
        <iframe v-if="url" :src="url" frameborder="0"></iframe>
    </div>
</template>

<script>
    export default {
        name: 'CommentCard',
        props: {
            comment: String,
            username: String,
            url: String
        }
    }

</script>

<style lang="scss" scoped>

</style>
