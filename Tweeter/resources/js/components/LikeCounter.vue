<template>
    <div>
        <p>{{likes}}</p>
    </div>
</template>

<script>
    export default {
        name: 'LikeCounter',
        data: function(){
            return {
                likes: 0
            }
        },
        props: {
            tweetID: Number
        },
        methods: {
            getLikes: function(){
                axios.post('/likes',{
                    id: this.tweetID
                }).then((result) => {
                    console.log(result.data);
                }).catch((err) => {
                    console.log(err);
                });
            }
        },
        mounted: function(){
            //check for likes
            this.likes = this.getLikes;
        }
    }
</script>

<style lang="scss" scoped>

</style>
