<template>
    <div id="kokzhiek-alemi" class="wrapper">            
        <custom-header 
            title="Digital Worm" 
            :isCloseWindow='true' 
        />
    
        <div>
            <books-scroll 
                v-if="library.Loaded === undefined && library.books.length > 0"
                :books="library.books"
            >
                <section-header 
                    title="Кітапхана" 
                    :id="0"
                    path="library"
                />
            </books-scroll>
        </div>

        <div 
            v-for="section in sections"
            :key="section.id"
        >

            <books-scroll 
                v-if="isBook(section.sectionType)" 
                :books="section.sectionBody"
            >
                <section-header 
                    :title="section.sectionTitle" 
                    :id="section.id"
                    :path="toPath(section.sectionType)"
                />
            </books-scroll>

            <tests-scroll v-once
                v-if="isTest(section.sectionType)" 
                :tests="section.sectionBody"
            >
                <section-header 
                    :title="section.sectionTitle" 
                    :id="section.id"
                    :path="toPath(section.sectionType)"
                />
            </tests-scroll>

            <authors-scroll v-once 
                v-if="isAuthor(section.sectionType)" 
                :authors="section.sectionBody"
            >
                <section-header 
                    :title="section.sectionTitle" 
                    :id="section.id"
                    :path="toPath(section.sectionType)"
                />
            </authors-scroll>

        </div>
    </div>
</template>

<script>

    import SectionHeader from '../components/section-item-header';
    import BookTree from '../components/BookTree';
    import CustomHeader from '../components/custom-header.vue';
    import { mapActions, mapGetters, mapMutations } from 'vuex'
    import BooksScroll from '../components/section-items/HorizontalBooksSlider';
    import AuthorsScroll from '../components/section-items/HorizontalAuthorsSlider';
    import TestsScroll from '../components/section-items/HorizontalTestsSlider';

    export default {
        data(){
            return {
            };
        },
        components: {
            BookTree,
            SectionHeader,
            CustomHeader,
            BooksScroll,
            AuthorsScroll,
            TestsScroll,
        },
        created() {
            // console.log(this.isLoaded);
            this.resetData();
            this.fetchLibrary();
            
            if( !this.isLoaded ){
                console.log("Fetching sections for main page");            
                this.fetchSections();
            }
        },
        computed: {
            ...mapGetters(['sections', 'isLoaded', 'library']),
        },
        methods: {
            ...mapActions(['fetchSections', 'fetchProfile', 'fetchLibrary']),
            ...mapMutations(['resetData', ]),

            toPath(type) {
                if( type === "category" )
                    return "books";
                return type;
            },

            isBook(type) {
                return ( type === "category" );
            },

            isTest(type) {
                return ( type === "tests" );
            },
            
            isAuthor(type) {
                return ( type === "authors" );
            },
        }
    }

</script>

<style scoped>
    .wrapper {
        padding: 0;
    }

    .container {
        margin-bottom: 5%;
    }

    .row {
        margin-bottom: 3%;
    }
</style>