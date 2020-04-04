<template>
    <div class="card">
        <a class="card-title" :href="href">@{{username}}<img class="img-fluid" style="width: 30px;" :src="logo" alt="The Great Ironic Eagle"></a>
        <p v-if="this.retweet">Retweet from @{{retweet}}</p>
        <h6>{{content}}</h6>
        <img id="post-img" class="img-fluid" v-if="this.photo" :src="photo" alt="a dank meme">
        <p class="text-muted">{{date}}</p>
    </div>
</template>

<script>
    export default {
        name: 'Tweet',
        props: {
            href: String,
            logo: String,
            username: String,
            retweet: String,
            content: String,
            date: String,
            photo: String
        }

    }
</script>

<style lang="scss" scoped>
#post-img {
    width: 200px;
}
</style>
