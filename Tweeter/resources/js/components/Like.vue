<template>
    <div>
        <p v-if="!displayCond" class="btn btn-success mt-1" @click='likeTweet'>Like (<LikeCounter :likescount="this.likes"/>)</p>
        <p v-else class="btn btn-danger mt-1" @click="unlikeTweet">Unlike (<LikeCounter :likescount="this.likes"/>)</p>
    </div>
</template>

<script>
    import LikeCounter from './LikeCounter.vue';

    export default {
        name: 'Like',
        props: {
            likes: Number,
            hasliked: Boolean,
            tweetid: Number
        },
        data(){
          return {
              displayCond: this.hasliked
          }
        },
        methods: {
            likeTweet: function(){
                //make axios call to create a like record.
                //update the dom to increment tweet likes
                console.log('you clicked the like button');
                axios.post('/tweets/likes',{
                    tweetID: this.tweetid
                }).then(response => {
                    console.log(response);
                    //document.getElementById("likes-counter").innerHTML = 'you liked this tweet!';
                    this.displayCond = true;
                    this.$root.$emit('addCount');
                });
            },
            unlikeTweet: function(){
                axios.post('/tweets/unlike', {
                    tweetID: this.tweetid
                }).then(response => {
                    console.log(response);
                    //document.getElementById("likes-counter").innerHTML = 'you unliked this tweet!';
                    this.displayCond = false;
                    this.$root.$emit('lowerCount');
                })
            }
        },
        components: {
            LikeCounter
        }
    }
</script>

<style lang="scss" scoped>

</style>
