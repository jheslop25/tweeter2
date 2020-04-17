<template>
  <div id="main">
      <div id="header" class="bg-primary">
          <p>FoShizzle</p>
      </div>
    <div id="top">
      <div id="foshiz">
        <p id="bubble">{{ getHead }}</p>
        <img id="eagle" class="img-fluid" :src="logo" />
        <div id="headline" class="m-3">
          <p class="h4 m-1">{{ getSub }}</p>
          <div class>
            <a href="/login" class="btn btn-primary m-1">sign-up</a>
            <p class="btn btn-primary m-1">but...why?</p>
          </div>
        </div>
      </div>
    </div>
    <div id="marketing" class="m-4">
      <p>{{ getMarkOne }}</p>
      <p>{{ getMarkTwo }}</p>
    </div>
  </div>
</template>

<script>
import ScrollMagic from "scrollmagic";
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
  },
  props: {
    logo: String
  }
};
</script>

<style lang="scss" scoped>
#main {
  width: 100vw;
  min-height: 90vh;
  display: grid;
  grid-template-rows: 5vh 95vh 90vh;
  grid-template-columns: 1fr;
  justify-items: center;
}
#header{
    width: 100vw;
    height: 5vh;
    background-color: primary;
}

#top {
    position: sticky;
    top: 5vh;
    //left: 25vw;
    padding: auto;
}
#foshiz {

  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr;
  margin: 0;
  justify-items: center;
}

#bubble {
  position: relative;
  top: 155px;
  font-size: 25px;
}

@media screen and (max-width: 490px) {
  #bubble {
    position: relative;
    top: 145px;
    font-size: 23px;
  }
}

@media screen and (max-width: 450px) {
  #bubble {
    position: relative;
    top: 135px;
    font-size: 21px;
  }
}

@media screen and (max-width: 410px) {
  #bubble {
    position: relative;
    top: 125px;
    font-size: 20px;
  }
}

@media screen and (max-width: 370px) {
  #bubble {
    position: relative;
    top: 115px;
    font-size: 20px;
  }
}
</style>
