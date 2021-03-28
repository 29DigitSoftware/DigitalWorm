<template>
  <transition name="slide-right">
    <div class="content">
      <div class="content-wrapper" v-if="isBookAvailable">
        <div class="content-item" v-for="(item, index) in currentNavigation" :key="index" @click="navigateTo(item)" :class="{'current': item.cfi === currentHref}">
          <span class="text">{{ item.label }}</span>
        </div>
      </div>
      <div class="empty" v-else>Че там</div>
    </div>
  </transition>
</template>
<script>
  
  import { mapGetters, mapMutations } from 'vuex'  

  export default {
    name: "content-view",
    methods: {
      navigateTo: function (href) {
        this.$emit('navigateTo', href)
      }
    },
    computed: {
      ...mapGetters([
        'currentThemeId',
        'currentFontSize',
        'currentBookInfo',
        'currentHref',
        'currentNavigation',
        'isTitleAndMenuShow',
        'isSettingShow',
        'isContentShow',
        'isBookAvailable',
        'bookDatabase',
        'bookInfoList',
      ]),
    },
  }

</script>

<style lang="scss" scoped>
  @import "../assets/styles/global";
  .content {
    position: absolute;
    left: 0;
    top: 0;
    width: px2rem(1500);
    height: 100%;
    z-index: 102;
    overflow: scroll;
    background: #fff;
    .content-wrapper {
      padding: px2rem(20) px2rem(60);
      .content-item {
        line-height: px2rem(240);
        overflow: hidden;
        //text-overflow: ellipsis;
        word-wrap: break-word;
        white-space: nowrap;
        font-size: px2rem(72);
        box-sizing: border-box;
        text-align: left;
        color: #666;
        border-bottom: 1px solid #f6f6f6;
        &.current {
          color: #409EFF;
        }
        .text {
          flex: 1;
          font-size: px2rem(72);
        }
      }
    }
    .empty {
      width: 100%;
      height: 100%;
      font-size: px2rem(72);
      @include center;
    }
  }
</style>
