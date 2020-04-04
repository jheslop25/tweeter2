<template>
    <div class="card">
        <a class="card-title" :href="href">@{{username}}<img class="img-fluid" style="width: 30px;" :src="logo" alt="The Great Ironic Eagle"></a>
        <p v-if="this.retweet">Retweet from @{{retweet}}</p>
        <h6>{{content}}</h6>
        <img id="post-img" class="img-fluid" v-if="this.photo" :src="photo" alt="a dank meme">
        <p class="text-muted">{{date}}</p>
        <like :hasliked="liked"/>
    </div>
</template>

<script>
    import Like from './Like.vue';

    export default {
        name: 'Tweet',
        props: {
            logo: String,
            userid: Number,
            retweet: String,
            content: String,
            date: String,
            photo: String
        },
        computed: {
            href: function(){
                return '/user/' + this.userid;
            }
        },
        components: {
            Like
        },
        data(){
            return {
                liked: 'false'
            }
        }

    }
</script>

<style lang="scss" scoped>
#post-img {
    width: 200px;
}
</style>
