<template>
    <div>
        <!-- <Tweet
            v-for="tweet in tweets"
            v-bind:key="tweet"
            :href=""
            logo: String,
            username: String,
            retweet: String,
            content: String,
            date: String,
            photo: String
        /> -->
        <p @click="getTweets">this is a tweet feed</p>
    </div>
</template>

<script>
    import Tweet from './Tweet.vue';

    export default {
        name: 'TweetFeed',
        methods: {
            getTweets: function(){
                axios.post('/ajax/tweets',{
                    input: {
                        msg: 'give me some tweets'
                    }
                }).then((result) => {
                    console.log(result.data);
                }).catch((err) => {

                });
            }
        },
        mounted(){
            let tweets = this.getTweets;
            this.tweets = tweets;
        },
        data(){
            return {
                tweets: [],
                index: 0
            }
        },
        components: {
            Tweet
        }
    }
</script>

<style lang="scss" scoped>

</style>
