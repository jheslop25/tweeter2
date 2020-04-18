<template>
  <div class="container">
    <MakeTweet />
    <ProfileFeed :logourl="logourl" :userid="userid" />
  </div>
</template>

<script>
import ProfileFeed from './ProfileFeed.vue';
import MakeTweet from './MakeTweet.vue';

export default {
    name: "Profile",
    components: {
        MakeTweet,
        ProfileFeed
    },
    props: {
      logourl: String,
      userid: Number
    }
}
</script>
