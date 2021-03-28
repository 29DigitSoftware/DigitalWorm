<template>
    <div id="search" class="wrapper">
        
        <customHeader 
            title="Іздеу" 
            Search="true" 
        />

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

    .chips{
        display: flex;
        align-items: center;
        flex: 1;
        flex-flow: row wrap;
        margin: 0;
        padding: 0;
    }
    .chip {
        display: flex;
        align-items: center;
        padding:5px 15px;
        height: auto;
        font-size: 50px;
        line-height: 50px;
        border: 1px solid #3C6E71;
        border-radius: 6px;
        opacity: 1;
        margin : 5px;
    }
    .chip p{
        margin:0px;
        text-align: center;
        font: Condensed Bold 9px/11px Nunito;
        letter-spacing: 0px;
        color: #3C6E71;
        text-transform: lowercase;
        opacity: 1;
    }
</style>