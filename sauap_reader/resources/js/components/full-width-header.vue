<template>
    <div class="container main_header">

        <div class="row custom-header">
            <div class="col-1">
                <div class="back-button" >
                    <back-button-item 
                        color="white" 
                        :goTo="goTo"
                    />
                </div>
            </div>
        </div>

        
    </div>
</template>

<script>

    import BackButtonItem from '../components/items/back-button-item'

    export default {
        data(){
            return {
            };
        },  
        props: {
            goTo: {
                defaut: -1
            },
        },
        computed: {
        }, 
        mounted(){
        },

        components: {
            BackButtonItem,
        },

        methods: {
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
        background: #3C6E71;
        padding: 16px 30px;     
        margin: 0px auto;
        height: 128px;

        color: white !important;
    }

    .custom-header {
        min-height: 48px;
    }
    

    .header_title {
        text-align: center;
        height: 100%;

        display: flex;
        align-items: center;

        /* line-height: 250%; */

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

</style>