

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
Vue.use(Vuex);

const store = new Vuex.Store({
    //store options
    state: {
        //some data here
        headline: 'FoShizzle*',
        subHead: 'for sh*ts and giggles',
        marketingOne: 'FoShizzle is an app for you to connect with your closest friends, and share things for sh*ts and giggles.',
        marketingTwo: 'FoShizzle aspires to be a haven for the ridiculous, absurd, and comical.',

    },
    mutations: {
        //some mutations here
    },
    actions: {
        //some actions here
    },
    getters: {
        //some getters here
        getHeadline: function(state){
            return state.headline;
        },
        getSubHead: function(state){
            return state.subHead;
        },
        getMarketingOne: function(state){
            return state.marketingOne;
        },
        getMarketingTwo: function(state){
            return state.marketingTwo;
        }
    }
})


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Home', require('./components/Home.vue').default);
Vue.component('Like', require('./components/Like.vue').default);
Vue.component('Tweet', require('./components/Tweet.vue').default);
Vue.component('tweet-feed', require('./components/TweetFeed.vue').default);
Vue.component('Profile', require('./components/Profile.vue').default);

const app = new Vue({
    el: '#app',
    store
});
