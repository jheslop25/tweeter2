<template>
  <div>
    <CommentCard />
    <p v-if="!show" class="btn btn-primary" @click="showForm">Comment</p>
    <input v-if="show" v-model="comment" type="text" placeholder="Comment" />
    <p class="btn btn-primary" v-if="show" @click="saveComment">Comment</p>
  </div>
</template>

<script>
import CommentCard from "./CommentCard.vue";
export default {
  name: "Comments",
  methods: {
    saveComment: function() {
      axios
        .post("ajax/tweet/comment", {
          input: {
            tweetId: this.tweetid,
            content: this.comment
          }
        })
        .then(result => {
          console.log("you made a comment");
        })
        .catch(err => {});
    },
    showForm: function() {
      this.show = true;
    }
  },
  data() {
    return {
      comment: "",
      show: false
    };
  },
  components: {
    CommentCard
  }
};
</script>

<style lang="scss" scoped>
</style>
