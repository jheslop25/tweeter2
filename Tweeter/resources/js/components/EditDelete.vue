<template>
    <div class="card">
        <p class="btn btn-danger" @click="deleteTweet">Delete</p>
        <p v-if="!show" class="btn btn-secondary" @click="showEdit">Edit</p>
        <input v-if="show" type="text" v-model="input">
        <p v-if="show" @click="updateTweet" class="btn btn-secondary">Submit</p>
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
                    axios.post('/ajax/update/tweet', {
                        input: {
                            content: this.input,
                            userId: this.userid,
                            tweetId: this.tweetid
                        }
                    }).then((result) => {
                        this.$root.$emit('updateTweet');
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
                input: ''
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
