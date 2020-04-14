<template>
    <div>
        <Tweet
            v-for="tweet in tweets"
            v-bind:key="tweet[1].content"
            :logo="logourl"
            :username="tweet[0].name"
            :userid="tweet[1].user_id"
            :retweet="tweet[1].orig_tweter_name"
            :content="tweet[1].content"
            :date="tweet[1].created_at"
            :photo="tweet[1].tweet_photo"
            :id="tweet[1].id"
            :comments="tweet[3]"
            :hasliked="tweet[4]"
            :likes="tweet[2]"
            :owner="tweet[5]"
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
                tweets: [],
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
                    //this.$root.$emit('tweets');
                }).catch((err) => {
                    console.log(err);
                });
            }
        },
        mounted(){
            // window.addEventListener('load', () =>{
                let allTweets = this.getTweets();
                this.tweets = allTweets;
            // });
        },
        components: {
            Tweet
        }
    }
</script>

<style lang="scss" scoped>

</style>
