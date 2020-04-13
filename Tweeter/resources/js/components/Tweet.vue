<template>
    <div class="card m-5 p-3">
        <a class="card-title" :href="href">@{{username}}<img class="img-fluid" style="width: 30px;" :src="logo" alt="The Great Ironic Eagle"></a>
        <p v-if="this.retweet">Retweet from @{{retweet}}</p>
        <h6>{{content}}</h6>
        <img id="post-img" class="img-fluid" v-if="this.photo" :src="photo" alt="a dank meme">
        <p class="text-muted">{{this.readableDate}}</p>
        <like :hasliked="this.hasliked" :tweetid="this.id" :likes="this.likes"/>
        <EditDelete/>
        <comments :comments="this.comments" />
    </div>
</template>

<script>
    import Like from './Like.vue';
    import EditDelete from './EditDelete.vue';
    import Comments from './Comments.vue';
    export default {
        name: 'Tweet',
        props: {
            id: Number,
            username: String,
            logo: String,
            userid: Number,
            retweet: String,
            content: String,
            date: String,
            photo: String,
            comments: Array,
            hasliked: Boolean,
            likes: Number
        },
        computed: {
            href: function(){
                return '/user/' + this.userid;
            },
            readableDate: function (){
                let date = this.date;
                var moment = require('moment');

                return moment().fromNow(date);
            }
        },
        components: {
            Like,
            Comments,
            EditDelete
        }
    }
</script>

<style lang="scss" scoped>
#post-img {
    width: 200px;
}
</style>
