<template>
  <div>
    <CommentCard v-for="comment in commentsData" v-bind:key="comment[0].id" :comment="comment[0].content" :username="comment[1]" :url="comment[0].giphy_url" />
    <p v-if="!show" class="btn btn-primary" @click="showForm">Comment</p>
    <input class="form-control m-2" v-if="show" v-model="content" type="text" placeholder="Comment" />
    <p class="btn btn-primary m-2" v-if="show" @click="saveComment">Comment</p>
    <Giphy v-if="show" :id="this.tweetid"/>
  </div>
</template>

<script>
import CommentCard from "./CommentCard.vue";
import Giphy from './Giphy.vue';
export default {
  name: "Comments",
  methods: {
    saveComment: function(img) {
        console.log(typeof(img));
        if(typeof(img) !== "string"){
          img = null;
        }
      axios
        .post("/tweets/comment/create", {
          input: {
            tweetId: this.tweetid,
            comment: this.content,
            giphy_url: img
          }
        })
        .then(result => {
          console.log(result.data.msg);
          let comment = {
              0: {
                content: result.data.msg,
                giphy_url: result.data.giphy_url
                },
              1: result.data.name,
          };
          //this.commentsData.push(comment.toArray());
        })
        .catch(err => {
            console.log(err);
        });
    },
    showForm: function() {
      this.show = true;
    }
  },
  data() {
    return {
      content: "   ",
      show: false,
      giphy_url: null,
      commentsData: this.comments
    };
  },
  components: {
    CommentCard,
    Giphy
  },
  props: {
      tweetid: Number,
      comments: Array
  },
  mounted(){
      this.$root.$on('postGiphy'+this.tweetid, this.saveComment);
  }
};
</script>

<style lang="scss" scoped>
</style>
