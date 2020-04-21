<template>
    <div>
        <p class="btn btn-danger m-1" @click="deleteTweet">Delete</p>
        <p v-if="!show" class="btn btn-secondary m-1" @click="showEdit">Edit</p>
        <input class="form-control m-1" v-if="show" type="text" v-model="input">
        <p v-if="show" @click="updateTweet" class="btn btn-secondary m-1">Submit</p>
    </div>
</template>

<script>
    export default {
        name: "EditDelete",
        methods: {
            showEdit: function(){
                this.show = true;
            },
            deleteTweet: function(){
                if(confirm('are you sure?')){
                    axios.get('/ajax/delete/tweet')
                    .then((result) => {
                        console.log(result.data);
                    }).catch((err) => {
                        console.log(err);
                    });
                }
            },
            updateTweet: function(){
                if(confirm('update tweet?')){
                    axios.post('/tweets/update', {
                        input: {
                            content: this.input,
                            userId: this.userid,
                            tweetId: this.tweetid
                        }
                    }).then((result) => {
                        this.$root.$emit('updateTweet'+this.tweetid);
                        //maybe we want to use vueX for this...
                    }).catch((err) => {
                        console.log(err);
                    })
                }
            }
        },
        data(){
            return {
                show: false,
                input: this.content
            }
        },
        props: {
            content: String,
            userid: Number,
            tweetid: Number
        }
    }
</script>

<style lang="scss" scoped>

</style>
