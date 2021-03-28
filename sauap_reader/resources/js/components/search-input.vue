<template>
    <div class="row mt-3">
        <div class="col-12 search">
            <input 
                v-if="Search"
                class="form-control" 
                :class="search_style" 
                type="search" 
                placeholder="Іздеу..." 
                aria-label="Search"
                ref="search"
                v-model.trim="fragment"
                
                @input="search()"
            >
            <input 
                v-else
                class="form-control" 
                :class="search_style" 
                type="search" 
                placeholder="Іздеу..." 
                aria-label="Search"
                
                @click="navigate()"
            >
            <!-- <button type="button" class="btn btn-link question"><i class="fas fa-question"></i></button> -->
        </div>
    </div>
</template>

<script>

    import {mapActions} from 'vuex';

    export default {
        data(){
            return {
                fragment: '',
            };
        },
        mounted() {
            this.focusInput();
        },
        props: {
            search_style: {
                default: "none",
            },
            colorStyle: {
                default: ""
            },
            Search: {
                default: false
            }
        },
        methods: {
            ...mapActions(['searchFragment']),

            navigate(){
                this.$router.push("/search");
            },

            search(){
                console.log(this.fragment)
                this.searchFragment(this.fragment + ' ');
            },

            focusInput() {
                this.$refs.search.focus();
            }
            
        }
    }
</script>

<style scoped>
    .search {
        /* width: 90%; */
        opacity: 1;
        /* background-color: #F0F0F0; */
        border: 1px black;
    }

    .search_colored {
        background: #353535;

        font-size: 12px;

        border: none;
        border-radius: 5px;
        
        padding: 10px;
        padding-bottom: 10px;

        width: 100%;
        height: 100%;
    }

    .search_colored::placeholder {
        color: white;
    } 

    .question {
        margin-top: 3px;
        padding: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #F0F0F0;
        color: #3C6E71;
        align-items: center;
    }

    /* from colored header */

/*
    .search_field {
        background: #353535;

        font-size: 10px;

        border: none;
        border-radius: 5px;
        
        padding: 10px;
        padding-bottom: 10px;

        width: 100%;
        height: 100%;
    }

    .search_field::placeholder {
        color: white;
    } */
/*
    .question_panel {
        padding: 0px;

        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .question {
        padding: 0;

        min-width: 25px;
        min-height: 25px;
        border-radius: 50%; 
        background-color: #353535;
        color: white; 
    } */

</style>