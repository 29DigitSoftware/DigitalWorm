<template>
    <div class="wrapper">

        <author-header 
            :Author='Content'
        />

        <books-collection 
            :Content="books"
        />

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1> By Year </h1>
                    <input v-model="selected" placeholder="enter section title">
                    <p> years is: {{ selected }}</p>
                    <button class="btn primary" @click="fetchBooksByYear" >
                        Sort by year
                    </button>
                </div>
            </div>
            <div class="row">
                <div v-if="BooksInSection.length > 0" >
                    <h1> Books By Year {{ selected }} </h1>
                    <books-collection 
                        :Content="BooksInSection"
                    />
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1> By Title </h1>
                    <input v-model="fragment" placeholder="enter section title">
                    <p> Title is: {{ fragment }}</p>
                    <button class="btn primary" @click="SearchByTitleAuthor" >
                        Sort by Title
                    </button>
                </div>
            </div>
            <div class="row">
                <div v-if="foundBooks.length > 0" >
                    <h1> Books By Title {{ fragment }} </h1>
                    <books-collection 
                        :Content="foundBooks"
                    />
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import BooksCollection from '../components/books-collection.vue';
    import AuthorHeader from '../components/author-header.vue';

    import { mapActions, mapGetters, mapMutations } from 'vuex'

    export default {
        data(){
            return {
                title: "Авторлар",
                Content: {
                    title: "Авторлар",
                },
                BooksInSection: [],
                selected: '',
                books: [],
                fragment: '',
                foundBooks: []
            };
        },
        
        computed: {
            ...mapGetters(['base_url']),
        }, 
        created(){
            this.fetchAuthor();
        },

        components: {
            AuthorHeader,
            BooksCollection,
        },

        methods: {
            
            fetchAuthor(){
                var id = this.$route.query.id;

                axios.get("/api/numAuthorInSec/" + id)
                .then(
                    response => {
                        console.log(response.data);
                        this.books = response.data
                    });   

                axios.get("/api/author/" + id)
                .then(
                    response => {
                        console.log(response.data);
                        this.Content = response.data
                    });   
            },
            

            fetchBooksByYear(){
                var token = localStorage.getItem('access_token')
                let id = this.$route.query.id;
                axios.post("/api/inThisYear",
                    {
                        "year": this.selected,
                        "id": id
                    },
                ).then(response => {
                    console.log("library books");
                    console.log(response.data);
                    this.BooksInSection = response.data;
                });
            },

            SearchByTitleAuthor(){
                var token = localStorage.getItem('access_token')
                let id = this.$route.query.id;
                axios.post("/api/SearchByTitleAuthor",
                    {
                        "title": this.fragment,
                        "id": id
                    },
                ).then(response => {
                    console.log("found books");
                    console.log(response.data);
                    this.foundBooks = response.data;
                });
            }

        },
        
    }
</script>

