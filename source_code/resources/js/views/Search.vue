<template>
    <div id="search" class="wrapper">
        
        <customHeader 
            title="Іздеу" 
            Search="true" 
        />

        <h1 class="counter" v-if="searchResult" > 
            Табылды: {{ searchResult.body.length }}    
         </h1>

        <books-collection 
            v-if="searchResult"
            :Content="searchResult.body"
        />

        <p v-else class="text-center"> {{errorMessage}} </p>

        <!-- <div class="container">
            <div>
                <div class="chips">
                    <div class="chip">
                        <p>жастарға</p>
                    </div>
                    <div class="chip">
                        <p>намаз</p>
                    </div>
                    <div class="chip">
                        <p>пайғамбарлар</p>
                    </div>
                    <div class="chip">
                        <p>сахабалар</p>
                    </div>
                    <div class="chip">
                        <p>ораза</p>
                    </div>
                    <div class="chip">
                        <p>қажылық</p>
                    </div>
                    <div class="chip">
                        <p>құлшылық ету</p>
                    </div>
                    <div class="chip">
                        <p>зекет</p>
                    </div>
                    <div class="chip">
                        <p>құрбандық</p>
                    </div>
                    <div class="chip">
                        <p>құрбан</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>

    import {mapGetters, mapMutations} from 'vuex';

    import customHeader from '../components/custom-header';
    import BooksCollection from '../components/books-collection.vue';

    export default {
        data(){
            return {
            };
        },
        methods: {
            ...mapMutations(['setErrorMessage']),

        },
        components: {
            BooksCollection,
            customHeader
        },
        computed: {
            ...mapGetters(['searchResult', 'errorMessage'])
        },
        beforeDestroy(){
            this.setErrorMessage('');
        },
    }
</script>

<style scoped>

    .counter {
        margin: 12px 24px;
    }
</style>