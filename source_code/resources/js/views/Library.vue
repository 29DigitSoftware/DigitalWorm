<template>
    <div class="wrapper">

        <colored-header 
            title='Library' 
            colorStyle="green"
           :Search="true"
        />

        <p 
            v-if="library.length == 0"
            class="text-center font-weight-bold first-text"
        >
            Kitap joq!
        </p>

        <books-collection 
            v-else
            :Content="library"
        />

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1> By section ID </h1>
                    <input v-model="selected" placeholder="enter section title">
                    <p>section title is: {{ selected }}</p>
                    <button class="btn primary" @click="fetchBooksBySection" >
                        Sort by ID
                    </button>
                </div>
            </div>
            <div class="row">
                <div v-if="BooksInSection.length > 0" >
                    <h1> Books By Section ID </h1>
                    <books-collection 
                        :Content="BooksInSection"
                    />
                </div>
            </div>
        </div>

        
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import ColoredHeader from '../components/colored-header.vue';
    import BooksCollection from '../components/books-collection.vue';

    export default {
        data(){
            return {
                title: 'Loading',
                BooksInSection: [],
                selected: ''
            };
        },

        created(){
            this.$store.dispatch("fetchLibrary");
        },

        mounted(){
            console.log(this.library.books)
        },

        components: {
            ColoredHeader,
            BooksCollection
        },

        methods: {
            fetchBooksBySection(){
                var token = localStorage.getItem('access_token')

                axios.post("/api/MyBooksInSection",
                    {
                        "id": this.selected
                    },
                ).then(response => {
                    console.log("library books");
                    console.log(response.data);
                    this.BooksInSection = response.data;
                });
            }
        },

        computed: {
            ...mapGetters(['library', 'profile']),
        }, 
    }
</script>
