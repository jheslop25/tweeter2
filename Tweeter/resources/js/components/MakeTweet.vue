<template>
   <div class="container-fluid">
        <div class="form-group row">
        <input v-model="content" type="text" class="form-control m-3 col-4" placeholder="What's on your mind?"/>
        <button class="btn btn-primary my-3 col-2" @click="makeTweet">Tweet!</button>
    </div>
   </div>
</template>

<script>
    import Giphy from './Giphy.vue';
    export default {
        name: "MakeTweet",
        data(){
            return {
                content: ''
            }
        },
        methods: {
            makeTweet(){
                console.log("you've tried to make a tweet");
                axios.post('/tweets/create', {
                  input: {
                      content: this.content
                  }
                }).then((result) => {
                    console.log(result.data);
                    this.content = '';
                }).catch((err) => {
                    console.log(err);
                });
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
