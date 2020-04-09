<template>
        <span>{{likes}}</span>
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
            tweetid: Number
        },
        methods: {
            getLikes: function(){
                axios.post('/likes',{
                    input: {
                        id: this.tweetid
                    }
                }).then((result) => {
                    console.log(result.data);
                    this.likes = result.data.likes;
                }).catch((err) => {
                    console.log(err);
                });
            },
            addOne: function(){
                this.likes++;
            },
            subOne: function(){
                this.likes--;
            }
        },
        mounted: function(){
            //check for likes
            this.$root.$on('ready', () => {
                let likeCount = this.getLikes();
                this.likes = likeCount;
            })
            this.$root.$on('addCount', this.addOne);
            this.$root.$on('lowerCount', this.subOne);
        }
    }
</script>

<style lang="scss" scoped>

</style>
