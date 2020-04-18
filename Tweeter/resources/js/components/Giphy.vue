<template>
  <div>
    <p>Please select a giphy</p>
    <div class="row">
      <input type="text" placeholder="search" class="form-control col-5 mx-2" v-model="query" />
      <button class="btn btn-primary col-5" @click="getGif">get giphy</button>
    </div>
    <div class="row m-3 p-3" v-if="show">
      <div v-for="item in imgs" v-bind:key="item" class="col-auto card p-2 m-2">
        <iframe :src="item" frameborder="0"></iframe>
        <button class="m-2 btn btn-secondary" @click="postGiphy(item)">Post</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Giphy",
  data() {
    return {
      query: "",
      imgs: [], //an empty array soon to be filled with urls
        show: false,
        index: 0
    };
  },
  props: {
    id: Number
  },
  methods: {
    getGif: function() {
      let url = "http://api.giphy.com/v1/gifs/search?";
      let key = "&api_key=6iUCmCf2fRy9WF0QQTTTXlqzEctM7YOj";
      let q = "q=" + this.query;
      axios
        .get(url + q + key)
        .then(result => {
          console.log(result.data.data[0].embed_url);
          for (var i = 0; i < 4; i++) {
            this.imgs.push(result.data.data[i].embed_url);
            this.showCards();
          }
        })
        .catch(err => {
          console.log("somethign went wrong " + err);
        });
    },
    postGiphy(item) {
      console.log(item);
      this.$root.$emit('postGiphy'+this.id, item);
      this.hideCards();
    },
    showCards(){
        this.show = true;
    },
    hideCards(){
        this.show = false;
    }
  }
};
</script>

<style lang="scss" scoped>
iframe {
  width: 100%;
  height: 100%;
}
</style>
