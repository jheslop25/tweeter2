<template>
    <div>
        <Tweet
            v-for="tweet in tweets"
            v-bind:key="tweet.content"
            :logo="logourl"
            :userid="tweet.user_id"
            :retweet="tweet.orig_tweter_name"
            :content="tweet.content"
            :date="tweet.created_at"
            :photo="tweet.tweet_photo"
        />
        <p @click="getTweets">this is a tweet feed</p>
    </div>
</template>

<script>
    import Tweet from './Tweet.vue';

    export default {
        name: 'TweetFeed',
        props: {
            logourl: String
        },
        data(){
            return {
                tweets: 'kjhhjhkjh',
                index: 0
            }
        },
        methods: {
            getTweets: function(){
                axios.post('/ajax/tweets',{
                    input: {
                        msg: 'give me some tweets'
                    }
                }).then((result) => {
                    console.log(result.data);
                    this.tweets = result.data.tweets;
                }).catch((err) => {

                });
            }
        },
        mounted(){
            window.addEventListener('load', () =>{
                let tweets = this.getTweets();
                this.tweets = tweets;
            });
        },
        components: {
            Tweet
        }
    }
</script>

<style lang="scss" scoped>

</style>
