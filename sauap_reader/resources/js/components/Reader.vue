<template>
    <div class="eBook">
    <title-bar></title-bar>
    <div class="reader-wrapper" ref="Reader">
      <div id="read"></div>
      <div class="mask" v-touch:left="nextPage" v-touch:right="prevPage">
        <div class="mask-left" @click="prevPage"></div>
        <div class="mask-center" @click="toggleTitleAndMenu"></div>
        <div class="mask-right" @click="nextPage"></div>
      </div>
    </div>
    <div class="readerLoader" id="readerLoader">
        <div class="loading"></div>
    </div>
    <menu-bar
      @setFontSize="setFontSize"
      @onProgressChange="onProgressChange"
      @navigateTo="navigateTo"
      @getProcess="getProcess"
      @setTheme="setTheme"
      ref="MenuBar"></menu-bar>
  </div>
</template>

<script>
import TitleBar from '../components/ReaderComponents/TitleBar'
import MenuBar from '../components/ReaderComponents/MenuBar'
import CONST from './config/CONST'

import { mapGetters, mapMutations } from 'vuex'  

const ePub = window.ePub

export default {
    components: {
      TitleBar,
      MenuBar
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
        'base_url_without_api',
      ]),
    },
    methods: {

        ...mapMutations([
          'setCurrentThemeId', 
          'setCurrentFontSize', 
          'setBookDatabase', 
          'setTitleAndMenuShow', 
          'setCurrentNavigation', 
          'setBookAvailable',
          'setCurrentFontSize',
          'setCurrentBookInfo',
          'setCurrentHref',
          ]),

        init: function () {
          if(localStorage.getItem("currentThemeId")){
            this.setCurrentThemeId (Number(localStorage.getItem("currentThemeId")));
          }
          if(localStorage.getItem('currentFontSize')){
            this.setCurrentFontSize(Number(localStorage.getItem('currentFontSize')));
          }
          // if(this.$route.params.bookId){
          if(this.$route.query.id){
            this.bookId = this.$route.query.id
            // this.bookId = this.$route.params.bookId
            localStorage.setItem('currentBookId', this.bookId)
            //this.readBookInfo(this.bookId)
            this.openIndexedDB(this.bookId)
          } else {
            this.bookId = Number(localStorage.getItem("currentBookId"))
            this.openIndexedDB(this.bookId)
          }
          this.setTitleAndMenuShow(true);
        },

        openIndexedDB: function (bookId) {
          let request = window.indexedDB.open('bookBD')
          let that = this;
          request.onsuccess = function () {
            that.setBookDatabase(request.result)
            that.readBookInfo(bookId)
          }
          request.onerror = function () {
            console.log('数据库打开失败')
          }
          request.onupgradeneeded = function (e) {
            let result = e.target.result
            if(!result.objectStoreNames.contains('bookInfoList')){
              let store = result.createObjectStore('bookInfoList', { autoIncrement: true })
              store.createIndex('bookName', 'bookName', { unique: true })
            }
            that.setBookDatabase(result)
          }
        },
        toggleTitleAndMenu: function () {
            this.setTitleAndMenuShow(!this.isTitleAndMenuShow)
            if(!this.isTitleAndMenuShow){
              this.$refs.MenuBar.hideSetting();
            }
        },
        prevPage: function(){
            this.book.prevPage().then(() => {
                this.getProcess();
            });
        },
        nextPage: function(){
            this.book.nextPage().then(() => {
                this.getProcess();
            });
        },
        showEpub: function() {

          this.book = ePub({
              bookPath: "/books/" + this.bookId + "/book.epub",
              width: window.innerWidth,
              height: window.innerHeight,
              restore: false,
              spreads: false,
          });

          console.log(this.book)

          this.book.getToc().then(toc => {
            this.setCurrentNavigation(toc)
          })

          this.book.ready.all.then(() => {
            return this.book.locations.generate();
          }).then(() => {
            this.locations = this.book.locations;


            let bookProgress = this.$route.query.progress 

            if( bookProgress )
              this.book.goto(bookProgress);

            document.getElementById("readerLoader").style.display = "none";
            this.setBookAvailable(true);

            // if(this.currentBookInfo.currentProgress > 0){
            //   const loc = this.locations.cfiFromPercentage(this.currentBookInfo.currentProgress / 100);          
            //   this.book.goto(loc);
            //   this.loadingInstance.close();
            // }
          })
          
          this.book.renderer.forceSingle(false)
          
          this.book.on('renderer:locationChanged', locationCfi => {
            console.log('Location ch')
            console.log(locationCfi)
            this.locationCfi = locationCfi
          })
          // 设置默认字体大小
          this.setFontSize(this.currentFontSize);
          this.setTheme(this.currentThemeId);
          // 获取locations对象
          // 通过epubjs的钩子函数来实现
          this.book.renderTo("read", { flow: "scrolled-doc", width: "100%", height: "200%" }).then(() => {
              this.book.setStyle('padding-left', '2rem')
              this.book.setStyle('padding-right', '2rem')
              this.book.setStyle('margin-top', '1rem')
              this.book.setStyle('margin-bottom', '1rem')
          });
        },
        setFontSize: function (fontSize) {
        this.setCurrentFontSize(fontSize)
        this.book.setStyle('font-size', fontSize + 'px')
      },
      setTheme: function (themeId) {
        let themesInfo = CONST.bookConfig.themesList[themeId]
        this.setCurrentThemeId(themeId)
        this.book.setStyle('color', themesInfo.style.color)
        this.book.setStyle('background-color', themesInfo.style.background)
      },
      // progress （0-100）
      onProgressChange: function (progress) {
        const percentage = progress / 100;
        const location = percentage > 0 ? this.locations.cfiFromPercentage(percentage) : 0;
        this.book.goto(location);
        this.updateBookProgress(progress)
      },
      navigateTo: function (item) {
        this.book.goto(item.href)
        this.hideTitleAndMenu();
        this.getProcess();
      },
      hideTitleAndMenu: function () {
        this.setTitleAndMenuShow(false)
        this.$refs.MenuBar.hideSetting();
        this.$refs.MenuBar.hideContent();
      },
      getProcess: function () {
        if(this.isBookAvailable) {
          let currentPage = this.locations.percentageFromCfi(this.locationCfi);
          this.$refs.MenuBar.progress = Math.round(currentPage*1000) / 10;
          this.setCurrentHref(this.locationCfi);
          this.updateBookProgress(Math.round(currentPage*1000) / 10)
        }
      },
      readBookInfo: function (bookId) {
        let request = this.bookDatabase.transaction(['bookInfoList']).objectStore('bookInfoList').get(bookId)
        let that = this
        request.onerror = function () {
          console.log('书籍信息获取失败')
        }
        request.onsuccess = function () {
          let result = request.result
          //result.id = bookId
          that.setCurrentBookInfo(result)
          that.showEpub();
        }
      },
      updateBookProgress: function (progress) {
        let currentBookInfo = this.currentBookInfo
        currentBookInfo.currentProgress = progress
        this.setCurrentBookInfo(currentBookInfo);
        let request = this.bookDatabase.transaction(['bookInfoList'], 'readwrite').objectStore('bookInfoList').put(currentBookInfo, this.bookId)
        request.onsuccess = function () {
          console.log('Success')
        }
        request.onerror = function (e) {
          console.log('Error')
        }
      },
      saveTheProgress: function (){
        console.log('Location on destroy')
        console.log( this.locationCfi )
        console.log("Save progress action on index.js, the received book id is: ", this.bookId)

        console.log( this.bookId )

        return new Promise((resolve, reject) => {
                axios.post("/api/book/progress", {
                  book_id: this.bookId,
                  progress: this.locationCfi
                }).then(res => {
                  console.log("successfully saved the progress")
                  resolve(res);
                }).catch(e => {
                  console.log("could not save the progress")
                  reject(e);
                });
            });

      }
    },
    mounted() {
      let bookProgress = this.$route.query.progress 
      if( bookProgress )
        document.getElementById("readerLoader").style.display = "block";

      this.init();
    },
    destroyed() {
      // send request to save the progress.
      this.saveTheProgress();
      this.book && this.book.destroy()
    },
}
</script>

<style scoped>
  .eBook {
    position: relative;
    overflow: hidden;
    box-sizing: border-box;
  }
  .reader-wrapper {
    width: 100%;
    height: 100%;
  }
  .mask {
    position: absolute;
    left: 0;
    top: 0;
    z-index: 99;
    display: flex;
    width: 100%;
    height: 100%;
  }
  .mask-left {
    width: 4rem;
    flex: 0 0 px2rem(200);
  }
  .mask-center {
    flex: 1;
  }
  .mask-right {
    width: 4rem;
    flex: 0 0 px2rem(200);
  }

  .readerLoader {
    display: none;
    position: absolute;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    background: black;
    opacity: 0.65;

    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 26px;
    font-weight: 800;
    color: white;
  }

  .loading {
    height: 0;
    width: 0;
    padding: 15px;
    border: 6px solid #ccc;
    border-right-color: #888;
    border-radius: 22px;
    -webkit-animation: rotate 0.25s infinite linear;
    /* left, top and position just for the demo! */
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  @-webkit-keyframes rotate {
    /* 100% keyframe for  clockwise. 
      use 0% instead for anticlockwise */
    100% {
      -webkit-transform: translate(-50%, -50%) rotate(360deg);
    }
  }

</style>
