<template>
    <div>
        <MakeTweet/>
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
    import MakeTweet from './MakeTweet.vue';
    export default {
        name: 'TweetFeed',
        props: {
            logourl: String
        },
        data(){
            return {
                tweets: [],
                page: 1
            }
        },
        methods: {
            getTweets: function(){
                axios.post('/ajax/tweets?page='+this.page,{
                    input: 3
                }).then((result) => {
                    console.log(result.data);
                    this.tweets.push(result.data.tweets);
                    //this.$root.$emit('tweets');
                    this.page++;
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
            Tweet,
            MakeTweet
        }
    }
</script>

<style lang="scss" scoped>

</style>
