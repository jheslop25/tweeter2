<template>
    <div>
        <p v-if="displayCond" class="btn btn-success" @click='likeTweet'>Like</p>
        <p v-else class="btn btn-danger" @click="unlikeTweet">Unlike</p>
    </div>
</template>

<script>
    export default {
        name: 'Like',
        props: ['tweetid', 'hasliked'],
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
                    document.getElementById("likes-counter").innerHTML = 'you liked this tweet!';
                    this.displayCond = false;
                });
            },
            unlikeTweet: function(){
                axios.post('/tweets/unlike', {
                    tweetID: this.tweetid
                }).then(response => {
                    console.log(response);
                    document.getElementById("likes-counter").innerHTML = 'you unliked this tweet!';
                    this.displayCond = true;
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
