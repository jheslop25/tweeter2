<template>
  <div id="main">
    <div id="header" class="bg-primary px-4 row align-content-center">
      <p class="m-2 h5 text-light">FoShizzle</p>
    </div>
    <div id="top">
      <div id="foshiz">
        <p id="bubble" class="bubble">{{ getHead }}</p>
        <img id="eagle" class="img-fluid" :src="logo" />
        <div id="headline" class="m-3">
          <p id="sub" class="h4 m-1">{{ getSub }}</p>
          <div id="buttons" class="row w-75">
            <a href="/register" class="btn btn-primary m-1 col-4">sign-up</a>
            <a href="/login" class="btn btn-secondary m-1 col-4">Login</a>
            <p id="but-why" @click="this.changeHead" class="btn btn-danger m-1 col-4">but...why?</p>
          </div>
        </div>
      </div>
    </div>
    <div id="marketing1" class="m-4">
      <div>
        <p class="h5">{{ getMarkOne }}</p>
      </div>
      <div></div>
      <div></div>
    </div>
    <div id="marketing2" class="m-4">
      <div></div>
      <div></div>
      <div>
        <p class="h5">{{ getMarkTwo }}</p>
      </div>
    </div>
    <div id="footer" class="bg-secondary w-100">
      <p class="m-2">copyright 2020 Great Ironic Eagle LLC</p>
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
  },
  methods: {
    changeHead: function() {
      console.log("changing headline");
      this.$store.commit("updateHeadline", "but why?");
      setTimeout(function() {
        let eagle = document.getElementById("eagle");
        eagle.classList.add("small-eagle");
        document
          .getElementById("marketing1")
          .scrollIntoView({ behavior: "smooth", block: "center" });
        document.getElementById("but-why").classList.add("hide");
        let bubble = document.getElementById("bubble");
        if(screen.width <= 490){
            bubble.classList.remove("bubble");
        }
        bubble.classList.add("small-bubble");
        document.getElementById("sub").classList.add("hide");
      }, 300);
    }
  },
  mounted() {
    let context = this;
    var controller = new ScrollMagic.Controller();
    var sceneOne = new ScrollMagic.Scene({
      triggerElement: "#footer",
      triggerHook: "onEnter"
    })
      .addTo(controller)
      .on("enter", function() {
        context.changeHead();
      });
  }
};
</script>

<style lang="scss" scoped>
#main {
  width: 100vw;
  min-height: 90vh;
  display: grid;
  grid-template-rows: 8vh 100vh 40vh 40vh 5vh;
  grid-template-columns: 1fr;
  justify-items: center;
}
#header {
  position: sticky;
  top: 0vh;
  width: 100vw;
  height: 8vh;
  background-color: primary;
}

#top {
  position: sticky;
  top: -5vh;
  padding: auto;
}
#foshiz {
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr;
  margin: 0;
  justify-items: center;
}

.bubble {
  position: relative;
  top: 155px;
  font-size: 25px;
}

#headline {
  display: grid;
  justify-items: center;
  width: 75vw;
}

#buttons {
  display: grid;
  justify-items: center;
}

#marketing1,
#marketing2 {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr;
}

.hide {
  display: none;
}

@media screen and (max-width: 490px) {

  .small-eagle {
    margin-top: 10vh;
    // margin-bottom: 18vh;
    width: 300px;
    height: 300px;
    transition: width 2s ease-in;
  }
  .small-bubble {
    position: relative;
    top: 185px;
    font-size: 18px;
  }
  .bubble {
    position: relative;
    top: 145px;
    font-size: 23px;
  }
  #marketing1 {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: minmax(20vh, 1fr) 0vh 0vh;
  }

  #marketing2 {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 0vh 0vh minmax(20vh, 1fr);
  }
  #main {
    width: 100vw;
    min-height: 90vh;
    display: grid;
    grid-template-rows: 5vh 95vh 20vh 20vh;
    grid-template-columns: 1fr;
    justify-items: center;
  }
}

@media screen and (max-width: 450px) {
  .bubble {
    position: relative;
    top: 135px;
    font-size: 21px;
  }
}

@media screen and (max-width: 410px) {
  .bubble {
    position: relative;
    top: 125px;
    font-size: 20px;
  }
}

@media screen and (max-width: 370px) {
  .bubble {
    position: relative;
    top: 115px;
    font-size: 20px;
  }
}
</style>
