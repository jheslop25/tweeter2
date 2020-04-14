<template>
  <div id="main">
    <div id="headline" class="m-3">
      <p class="h1 m-1">{{getHead}}</p>
      <p class="h4 m-1">{{ getSub }}</p>
      <div class>
        <a href="/login" class="btn btn-primary m-1">sign-up</a>
        <p class="btn btn-primary m-1">but...why?</p>
      </div>
    </div>

    <div id="marketing" class="m-4">
      <p>{{ getMarkOne }}</p>
      <p>{{ getMarkTwo }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  computed: {
    getHead: function() {
      return this.$store.getters.getHeadline;
    },
    getSub: function() {
      return this.$store.getters.getSubHead;
    },
    getMarkOne: function() {
      return this.$store.getters.getMarketingOne;
    },
    getMarkTwo: function() {
      return this.$store.getters.getMarketingTwo;
    }
  }
};
</script>

<style lang="scss" scoped>
#main {
  width: 100vw;
  min-height: 75vh;
}
</style>
