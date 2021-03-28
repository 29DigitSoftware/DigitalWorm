<template>
    <div class="container header-container">
        <div class="row custom-header">
            <div class="col-2">
                <div v-if="isCloseWindow" id="back_button" class="back-button" >
                    <back-button-item 
                        color="black" 
                        path="close"
                    />
                </div>
                <div v-else id="back_button" class="back-button" >
                    <back-button-item 
                        color="black" 
                        :ResetSection="ResetSection"
                    />
                </div>
            </div>
            <div class="col-8">
                <div class="page-title">
                    <p>{{title}}</p>
                </div>
            </div>
            <div class="col-2">
                <div class="profile-button" >
                    <profile-button-item 
                        color="black" 
                    />
                </div>
            </div>
        </div>
        
        <searchInput 
            :Search="Search"
        />
    </div>
</template>

<script>

    import BackButtonItem from '../components/items/back-button-item';
    import ProfileButtonItem from '../components/items/profile-button-item';
    import searchInput from '../components/search-input';
    import { mapGetters } from 'vuex'

    export default {
        data(){
            return {
            };
        },
        
        props: {
            title: {
                default: 'Loading'
            },
            ResetSection: {

            },
            isCloseWindow: {
                default: false
            },
            Search: {
                default: false
            }
        },

        components: {
            BackButtonItem,
            ProfileButtonItem,
            searchInput
        },
        computed: {
            ...mapGetters(['isAuthorized'])
        },
        methods: {
        }
    }

</script>

<style scoped>

    .custom-header {
        margin-top: 3%;
        padding: 0px 2px;   
        display: flex;
        align-items: center;
    }

    .back-button .btn:focus, .btn:active, .btn:hover { outline: none; }

    .page-title {
        vertical-align: auto;
        padding: 0px;
        height: 100%;
    }
    .page-title p {
        text-align: center;
        font-family: 'Roboto'; font-weight: bold; font-style: normal;
        font-size: 20px;
        color: #2F3138;
        text-transform: uppercase;
        margin: 0px;
        line-height: 250%;
    }

    .back-button button {
        color: #2F3138;
        font-size: 20px;
    }

    .back-button {
        text-align: left;
        margin-top: 5px;
    }

    .profile-button {
        text-align: right;
        margin-top: 5px;
        padding-right: 5px;
    }
</style>