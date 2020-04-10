<template>
    <div class="card m-5 p-3">
        <a class="card-title" :href="href">@{{username}}<img class="img-fluid" style="width: 30px;" :src="logo" alt="The Great Ironic Eagle"></a>
        <p v-if="this.retweet">Retweet from @{{retweet}}</p>
        <h6>{{content}}</h6>
        <img id="post-img" class="img-fluid" v-if="this.photo" :src="photo" alt="a dank meme">
        <p class="text-muted">{{this.readableDate}}</p>
        <like :hasliked="liked" :tweetid="this.id"/>
        <EditDelete/>
        <comments/>
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
        },
        data(){
            return {
                liked: false,
                username: ''
            }
        },
        mounted(){
            this.$root.$emit('ready');
            axios.post('/username', {
                input: this.userid
            }).then((result) => {
                this.username = result.data.username;
            });
        }
    }
</script>

<style lang="scss" scoped>
#post-img {
    width: 200px;
}
</style>
