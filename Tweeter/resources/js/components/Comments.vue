<template>
  <div>
    <!-- <CommentCard v-for="comment in comments" v-bind:key="comment" :comments="comment" /> -->
    <p v-if="!show" class="btn btn-primary" @click="showForm">Comment</p>
    <input class="form-control m-2" v-if="show" v-model="comment" type="text" placeholder="Comment" />
    <p class="btn btn-primary m-2" v-if="show" @click="saveComment">Comment</p>
  </div>
</template>

<script>
import CommentCard from "./CommentCard.vue";
export default {
  name: "Comments",
  methods: {
    saveComment: function() {
      axios
        .post("/tweets/comment/create", {
          input: {
            tweetId: this.tweetid,
            comment: this.comment,
            giphy_url: this.giphy_url
          }
        })
        .then(result => {
          console.log(result.data.msg);
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
      comment: "",
      show: false,
      giphy_url: null,
    };
  },
  components: {
    // CommentCard
  },
  props: {
      tweetid: Number,
      comments: Array
  }
};
</script>

<style lang="scss" scoped>
</style>
