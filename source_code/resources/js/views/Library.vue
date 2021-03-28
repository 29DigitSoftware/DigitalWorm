<template>
    <div class="wrapper">

        <colored-header 
            title='Library' 
            colorStyle="green"
           :Search="true"
        />

        <p 
            v-if="library.Loaded || library.books.length == 0"
            class="text-center font-weight-bold first-text"
        >
            Kitap joq!
        </p>

        <books-collection 
            v-else
            :Content="library.books"
        />
        
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

        computed: {
            ...mapGetters(['library', 'profile']),
        }, 
    }
</script>
