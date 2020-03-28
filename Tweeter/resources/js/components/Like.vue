<template>
    <div>
        <p class="btn btn-primary" @click='likeTweet'>Like</p>
    </div>
</template>

<script>
    export default {
        name: 'Like',
        props: ['tweetid'],
        methods: {
            likeTweet: function(){
                //make axios call to create a like record.
                //update the dom to increment tweet likes
                console.log('you clicked the like button');
                axios.post('/tweets/likes',{
                    tweetID: this.tweetid
                }).then(response => {
                    console.log(response);
                });
            },
            unlikeTweet: function(){
                axios.post('/ajax/unlike', {
                    tweetID: this.tweetid
                }).then(response => {
                    console.log(response);
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
