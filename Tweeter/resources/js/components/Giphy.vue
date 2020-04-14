<template>
    <div>
        <p>Please select a giphy</p>
        <input type="text" placeholder="search" class="form-input" v-model="query">
        <button @click="getGif">get giphy</button>
    </div>
</template>

<script>
    export default {
        name: "Giphy",
        data(){
            return {
                query: '',
            }
        },
        methods: {
            getGif: function(){
                let url = 'http://api.giphy.com/v1/gifs/search?';
                let key = '&api_key=6iUCmCf2fRy9WF0QQTTTXlqzEctM7YOj';
                let q = 'q=' + this.query;
                axios.get(url+q+key)
                .then((result) => {
                    console.log(result.data);
                }).catch((err) => {
                    console.log('somethign went wrong ' + err);
                });
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
