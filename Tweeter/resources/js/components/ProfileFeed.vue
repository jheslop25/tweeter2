<template>
  <div>
    <Tweet
      v-for="tweet in tweets"
      v-bind:key="tweet[1].id"
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
    <p id="get-tweets"></p>
  </div>
</template>

<script>
import ScrollMagic from "scrollmagic";
import Tweet from "./Tweet.vue";
export default {
  name: "ProfileFeed",
  props: {
    logourl: String
  },
  data() {
    return {
      tweets: null,
      page: 1
    };
  },
  methods: {
    getTweets: function() {
      axios
        .post("/tweets/profile?page=" + this.page, {
          input: 3
        })
        .then(result => {
          console.log(result.data);
          var tweets = result.data.tweets;
          var oldTweets = this.tweets;
          if (this.tweets == null) {
            this.tweets = tweets;
          } else {
            this.tweets = oldTweets.concat(tweets);
          }
          //this.$root.$emit('tweets');
          this.page++;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    // window.addEventListener('load', () =>{
    let allTweets = this.getTweets();
    this.tweets = allTweets;
    let context = this;
    var controller = new ScrollMagic.Controller();
    var scene = new ScrollMagic.Scene({
      triggerElement: "#get-tweets",
      triggerHook: "onEnter"
    })
      .addTo(controller)
      .on("enter", function(){
        context.getTweets();
      });
    // });
  },
  components: {
    Tweet,
    MakeTweet
  }
};
</script>

<style lang="scss" scoped>
</style>
