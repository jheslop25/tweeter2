<template>
    <div>
        <p>Please select a giphy</p>
        <input type="text" placeholder="search" class="form-input" v-model="query">
        <button @click="getGif">get giphy</button>
        <div class="row">
            <iframe class="col" v-for="img in imgs" v-bind:key="img" :src="img">
            </iframe>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Giphy",
        data(){
            return {
                query: '',
                imgs: [], //an empty array soon to be filled with urls
            }
        },
        methods: {
            getGif: function(){
                let url = 'http://api.giphy.com/v1/gifs/search?';
                let key = '&api_key=6iUCmCf2fRy9WF0QQTTTXlqzEctM7YOj';
                let q = 'q=' + this.query;
                axios.get(url+q+key)
                .then((result) => {
                    console.log(result.data.data[0].embed_url);
                    for(var i=0; i < 3; i++){
                        this.imgs.push(result.data.data[i].embed_url)
                    }
                }).catch((err) => {
                    console.log('somethign went wrong ' + err);
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
iframe {
    width: 150px;
    height: 150px;
}
</style>
