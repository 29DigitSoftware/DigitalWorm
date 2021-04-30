<template>
    <div class="wrapper">

        <colored-header 
            :title='Section.title' 
            colorStyle="green"
            Search="true"
        />

        <p 
            v-if="numberOfBooks"
            class="text-center mb-4 font-weight-bold first-text"
        >
          Number of books in section  {{ numberOfBooks }}
        </p>

        <books-collection 
            :Content="Section.body"
        />
        
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import ColoredHeader from '../components/colored-header.vue';
    import BooksCollection from '../components/books-collection.vue';
    import fetchData from '../mixins'

    export default {
        data(){
            return {
                title: 'Loading',
                numberOfBooks: null
            };
        },

        components: {
            ColoredHeader,
            BooksCollection
        },
        mounted(){
            this.NumberOfBooksInSection()
        },
        methods: {
            NumberOfBooksInSection(){
                console.log("fsdfsd");
                // var token = localStorage.getItem('access_token')
                let id = this.$route.query.id;
                axios.get("/api/numbookInsec/" + id,
                ).then(response => {
                    console.log("number of books");
                    console.log(response.data[0]["count(*)"]);
                    this.numberOfBooks = response.data[0]["count(*)"];
                });
            }
        },
        mixins: [fetchData],
        computed: {
            ...mapGetters(['Section', 'isSectionLoaded']),
        }, 
        created(){
            if( !this.isSectionLoaded )
                this.fetchData(this.$route.query.id);
        },

    }
</script>
