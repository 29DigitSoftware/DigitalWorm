<template>
    <div class="container main_header header-container" :class='colorStyle'>

        <div class="row custom-header align-items-center">
            <div class="col-2">
                <div class="back-button" >
                    <back-button-item 
                        v-if="!NoBackButton"
                        color="white" 
                        :goTo="goTo"
                    />
                </div>
            </div>
            <div class="col-8">
                <div class="header_title ">
                    <h1 class="font-weight-bold">{{title}}</h1>
                </div>
            </div>
            <div class="col-2" v-if="Profile && !Timer">
                <div class="profile-button" >
                    <profile-button-item 
                        color="white" 
                    />
                </div>
            </div>
        </div>

        <timer v-if="Timer" />

        <search-input v-if="Search" search_style="search_colored" :colorStyle="colorStyle"/>

        <slot>        
        </slot>
    
    </div>
</template>

<script>

    import timer from '../components/TestTimer'
    import BackButtonItem from '../components/items/back-button-item'
    import ProfileButtonItem from '../components/items/profile-button-item'
    import searchInput from '../components/search-input';

    export default {
        data(){
            return {
            };
        },  
        props: {
            title: {},
            Search: {
                default: false
            },
            colorStyle: {},
            Timer: {
                default: false
            },
            Profile: {
                default: true
            },
            goTo: {
                default: -1
            },
            NoBackButton: {
                default: false
            }
        },
        computed: {
        }, 
        mounted(){
        },

        components: {
            timer,
            BackButtonItem,
            ProfileButtonItem,
            searchInput
        },

        methods: {
            search: function(){
                this.$router.push("/search");
            },
        },
        
    }
</script>

<style scoped>

    button {
        color: #2F3138
    }

    .header_title .btn:focus, .btn:active, .btn:hover {
        outline: none; 
    }

    /* views */

    .main_header{
        position: relative;
        background: #3C6E71;
        
        margin-top: 3%;
        padding: 16px 25px;     

        border-radius: 5px;

        color: white !important;
    }

    .custom-header {
        min-height: 48px;
        margin: 0 auto;
    }
    
    .header_title {
        text-align: center;
        /* height: 20px; */
        /* min-height: 40px; */
    }
    
    .header_title h1{
        margin-left: auto;
        margin-right: auto;
        width: auto;

        text-align: center;
        text-transform: uppercase;

        font-weight: 600;
        letter-spacing: 0.1px;
        font-size: 20px;
    }

    .header_title button{
        z-index: 1;
        font-size: 20px;
    }
    
    .back-button, .profile-button {
        text-align: left;
    }
</style>