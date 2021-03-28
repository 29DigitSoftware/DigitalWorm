<template>
    <div class="wrapper">

        <author-header 
            :Author='Content'
        />

        <books-collection 
            :Content="Content.books"
        />
        
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

                axios.get("/api/author/" + id)
                .then(
                    response => {
                        console.log(response.data);
                        this.Content = response.data
                    });   
            },
            
        },
        
    }
</script>

