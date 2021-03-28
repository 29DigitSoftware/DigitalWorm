<template>
    <div class="wrapper">

        <colored-header 
            :title='Section.title' 
            colorStyle="green"
            Search="true"
        />

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
            };
        },

        components: {
            ColoredHeader,
            BooksCollection
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
