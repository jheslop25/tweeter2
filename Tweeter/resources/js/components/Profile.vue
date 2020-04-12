<template>
  <div>
    <MakeTweet />
    <ProfileFeed />
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
    }
}
</script>