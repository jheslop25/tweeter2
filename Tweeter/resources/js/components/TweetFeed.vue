<template>
    <div>
        <Tweet
            v-for="tweet in tweets"
            v-bind:key="tweet"
        />
    </div>
</template>

<script>
    import Tweet from './Tweet.vue';

    export default {
        name: 'TweetFeed',
        methods: {

        },
        mounted: {

        },
        data(){
            return {
                tweets: []
            }
        },
        components: {

        }
    }
</script>

<style lang="scss" scoped>

</style>
