<template>
  <div id="app">
    
      <nprogress-container></nprogress-container>
      <transition name="slide-fade" mode="out-in">
        <router-view class="child-view">
        </router-view>
      </transition>
  </div>
</template>

<script>

  import {mapActions} from 'vuex'
  import NprogressContainer from 'vue-nprogress/src/NprogressContainer'

  export default {
    data () {
      return {  }
    },
    created(){
      this.setAuthorizationHeaderToDefaults()
    },
    methods: {
      ...mapActions(['setAuthorizationHeaderToDefaults']),
    },
    components: {
      NprogressContainer
    },
  }
</script>

<style>
  .slide-fade-enter-active {
    transition: translateX(20px) .1s ease;
  }
  .slide-fade-leave-active {
    transition: translateX(20px) .2s ease;
  }
  .slide-fade-enter, .slide-fade-leave-to{
    transform: translateX(20px);
    opacity: 0;
  }

</style>