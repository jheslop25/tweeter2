<template>
        <span>{{likesData}}</span>
</template>

<script>
    export default {
        name: 'LikeCounter',
        props: {
            likescount: Number,
            tweetid: Number
        },
        data(){
            return {
                likesData: this.likescount
            }
        },
        methods: {
            addOne: function(){
                this.likesData++;
            },
            subOne: function(){
                this.likesData--;
            }
        },
        mounted: function(){
            //check for likes
            // this.$root.$on('ready', () => {
            //     let likeCount = this.getLikes();
            //     this.likes = likeCount;
            // })
            this.$root.$on('addCount'+this.tweetid, this.addOne);
            this.$root.$on('lowerCount'+this.tweetid, this.subOne);
        }
    }
</script>

<style lang="scss" scoped>

</style>
