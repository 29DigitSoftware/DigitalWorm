<template>
        
    <div class="container">
        <div class="row main">  

            <div class="col-12">

                <div class="book_header centered_card">
                    
                    <div class="back-button">

                        <back-button-item 
                            color="black"
                            ResetSection
                        />
                    </div>

                    <div class="book_cover_panel animated-background">
                        <img 
                            onerror="this.style.display='none'"
                            onsuspense="this.style.display='none'"
                            class="book_cover" 
                            :src='Content.img'
                            alt=""
                        >
                     </div>

                    <!-- Book title -->
                    <div v-if="Content.title" class="book_title">
                        <h1> {{ Content.title }} </h1>

                        <div class="book_authors pt-2"> 
                            <span v-for="author in Content.authors" 
                                :key=author.id 
                                @click="routingBetween('author_info', author.id)"   
                                class = "author_name"
                            >{{author.name}}</span>
                        </div>
                    </div>
                    <div v-else class="animated-background book_title_placeholder">
                    </div>

                    <!-- Book description -->
                    <read-more v-if="Content"
                        class="book_description" 
                        more-str="толығырақ" 
                        :text='Content.description' 
                        link="#" 
                        :max-chars="192"
                    >
                    </read-more>
                    <div v-else class="animated-background book_description_placeholder">
                    </div>

                    <!-- <div class="statistics">
                    
                        <div class="statistics_item">
                            <img src="./assets/img/book.svg" alt="" srcset="">
                            <h4>4512</h4>
                            <span>Оқып жатыр</span>
                        </div>
                        
                        <div class="statistics_item">
                            <img src="./assets/img/accept.svg" alt="" srcset="">
                            <h4>9874</h4>
                            <span>Оқыды</span>
                        </div>
                        
                        <div class="statistics_item">
                            <img src="./assets/img/like.svg" alt="" srcset="">
                            <h4>874</h4>
                            <span>Ұнады</span>
                        </div>

                        <div class="statistics_item">
                            <img src="./assets/img/books.svg" alt="" srcset="">
                            <h4>100%</h4>
                            <span>Өзіне қосты</span>
                        </div>

                    </div> -->
                    
                </div>

                <div class="book-add-remove-buttons">
                    <button-item
                        v-on:simpleButtonFunction="openReader"
                        buttonSize="custom_button_large" 
                        buttonColor="custom_button_green" 
                        text="оқу"
                    />

                    <library-button
                        v-if="Content"
                        :isAdded="Content.is_added"
                        :book="Content"
                        buttonSize="custom_button_large" 
                    />

                </div>

            </div>

        </div>
    </div>

</template>

<script>
    import ReadMore from 'vue-read-more'
    import BackButtonItem from '../components/items/back-button-item'
    import ButtonItem from '../components/items/button-item'
    import LibraryButton from '../components/items/library-button'
    import routingBetween from '../mixins'

    import { mapGetters } from 'vuex'

    export default {
        data(){
            return {
                Content: null,
                id: null
            };
        },
        components: {
            'read_more': ReadMore,
            BackButtonItem,
            ButtonItem,
            LibraryButton
        },
        created() {
            this.id = this.$route.query.id;
            this.fetchBook(this.id);
            console.log("content if the book when component is created: ", this.Content);
        },
        computed: {
            ...mapGetters(['isAuthorized']),
        },
        mixins: [
            routingBetween,
        ],
        methods: {
            openReader: function () {
                
                if( !this.isAuthorized ){
                    this.$router.push('pricing-table')
                    return
                }

                let id = this.Content.id;
                id = Math.max(id % 101, 1);

                this.$router.push({ 
                    name: 'reader', 
                    query: { 
                        key: 'iCbhghNqcNM4QStD4vMxDT9pKqm8bdHGPC3totrQFdA=',
                        id: id,
                        progress: this.Content.progress
                    },
                    params: {
                        id: id,
                        progress: this.Content.progress
                    }
                });
            },
            
            fetchBook(id) {
                console.log("Book id " + id);

                axios.get("/api/book/info/" + id)
                .then(
                    response => {
                        console.log("response data: ", response.data);
                        this.Content = response.data
                        console.log("the content of the book after fetching from response : ", this.Content);
                    })
                .then(console.log("the content of the book on .then promise: ", this.Content))
            },
        }
    }

</script>

<style scoped>

    .container {
        padding-left: 0;
        padding-right: 0;
        min-height: 1000px;
        margin-left: auto;
        margin-right: auto;
    }

    .main {
        padding-bottom: 32px;
    }

    h1, h5, p {
        font-family: 'Roboto', sans-serif;
    }

    .back-button button {
        color: #2F3138;
        position: absolute;
        top: 16px;
        left: 16px;

        height: 32px;
        width: 32px;
    }

    .back-button .btn:focus, .btn:active, .btn:hover { outline: none; }
    
    .centered_card {
        position: relative;

        display: flex;
        align-items: center;
        flex-flow: column;
        text-align: center;
        justify-content: space-between;  
        padding: 64px 16px 32px 16px;
    }

    .book_header {
        min-height: 480px;
        background-color: #F8F8F8;

        
        box-shadow: 0px 3px 6px #00000029;

        color: #2F3138;
        margin: 16px 0 16px 0;
        border-radius: 10px;
        font-weight: 800;
    }

    .book_cover_panel {
        position: relative;

        width: 197px;
        height: 300px;
        border-radius: 10px;
    }

    .book_cover {
        position: absolute;
        
        /* width: 100%; */
        height: 100%;

        top: 50%;
        left: 50;

        transform: translate(-50%, -50%);

        border: none;
        outline: none;

        background-color: #eee;

        border-radius: 10px;
    }

    .author_name {
        font-weight: normal;
        font-size: 18px;
    }

    .author_name:hover {
        color: #3C6E71;
    }

    .author_name:after {
        content: ", ";
    }    

    .author_name:last-of-type:after {
        content: "";
    }

    .book_title {
        margin-top: 40px;
        margin-bottom: 24px;
    }

    .book_title_placeholder {
        margin-top: 24px;
        margin-bottom: 24px;
        
        height: 50px;
        min-width: 278px;

        border-radius: 5px;
    }

    .book_title h1 {
        font-size: 24px;
        text-transform: uppercase;
    }

    .book_title h5 {
        font-size: 18px;
        margin-top: 12px;
        font-weight: 600;
    }

    .book_description {
        font-size: 16px;
        max-width: 512px;
        margin: 0 10px 0 10px;
        font-family: 'Roboto';
        font-weight: 400;
    }

    .book_description_placeholder {
        margin: 0 10px 0 10px;
        
        height: 80px;
        min-width: 278px;

        border-radius: 5px;
    }

    .statistics {

        display: flex;
        align-items: center;
        text-align: center;
        justify-content: space-between;  

        max-width: 600px;
        margin: 32px 0px 0 0px;
        
        width: 100%;
        height: 48px;

        color: #3C6E71;
    }

    .statistics_item {
        display: flex;
        align-items: center;
        flex-flow: column;
        justify-content: space-around;
        height: 70px;
        margin-left: 2px;
    }

    .statistics_item h4 {
        font-weight: 600;
        font-size: min(calc(8px + 1.6vw), 16px);
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .statistics_item img {
        width: 24px;
    }

    .statistics_item span {
        font-size: min(calc(8px + 1.6vw), 16px);
        font-weight: 600;
    }

    .buttons_card {
        height: 64px;
    
        background-color: #F8F8F8;
        box-shadow: 0px 3px 6px #00000029;

        border-radius: 10px;
        font-weight: 800;
        padding: 0px;
        margin-bottom: 16px;
    }

    .buttons {
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: space-around;  

        max-width: 512px;

        font-size: 16px;
        font-weight: 600;

        width: 100%;
        height: 48px;
        margin: auto;

        padding-left: 5px;
        padding-right: 5px;

        color: #3C6E71;
    }

    .read_button {
        display: flex;
        align-items: center;
        flex-flow: row;
        justify-content: space-around;
        
        height: 48px;
        min-width: 80px;

        border: none;
        border-radius: 10px;
        background: #F8F8F8;
        box-shadow: 0px 3px 6px #00000029;

        outline: none;

        font-size: min(calc(8px + 1.65vw), 15px);
                
        transition: ease 1s;

        text-decoration: none;

        font-weight: 800;
        text-transform: uppercase;
        /* color: #3C6E71; */
    }

    .read_button:focus, .read_button:active, .read_button:hover { 
        transition: 0.2s;
        text-decoration: none ;
        color: #3C6E71;
        border: none;
        outline: none; 
    }
    
    .buttons_item {
        display: flex;
        align-items: center;
        flex-flow: row;
        justify-content: space-around;
        
        height: 48px;
        min-width: 80px;

        border: none;
        border-radius: 10px;
        background: #F8F8F8;

        outline: none;

        font-size: min(calc(8px + 1.65vw), 15px);
                
        transition: ease 1s;

        text-decoration: none;

        font-weight: 800;
        text-transform: uppercase;
    }


    .buttons_item:focus, .buttons_item:active, .buttons_item:hover { 
        transition: 0.2s;
        text-decoration: none ;
        color: #3C6E71;
        border: none;
        outline: none; 
    }

    a:hover, a:active {
        /* box-shadow: 0px 3px 6px #00000029; */
        text-decoration: none ;
        color: #3C6E71;
        border: none;
        outline: none; 
    }

    .buttons_item img{
        width: 20px;
        margin-right: 4px;
    }

    .book-add-remove-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
        /* justify-content: space-between; */
    }

</style>