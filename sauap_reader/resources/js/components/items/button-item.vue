<template>
    <button 
        type="button" 
        class=" btn btn-light btn-sm custom_button"    
        :class="[buttonSize, buttonColor]"           
        @click="click()"                
        > 
        <i class="mr-2 fa fa-book"></i> 
        <span> {{text}} </span>
    </button>
</template>

<script>
    export default {        
        name: 'SimpleButton',
        data(){
            return {
            };
        },
        props: {
            color: {
                type: String,
                default: 'white'
            },
            text: {
                default: 'қосу'
            }, 
            buttonSize: {
                default: 'custom_button_small'
            },
            buttonColor: {
                default: 'custom_button_green'
            }
        },

        methods: {
            click(){
                this.$emit('simpleButtonFunction')
            }
        },
        
    }
</script>

<style scoped>
    .custom_button {
        text-transform: uppercase;
        font-weight: 600; 
        text-align: center;

        box-shadow: 0px 3px 6px #00000029;
        /* background: white; */
        background: #F8F8F8;
        color: #3C6E71;
        /* margin-right: 15px; */
    }

    .custom_button_small {
        height: 32px;
        font-size: 12px;
    }

    .custom_button_large {
        width: 100%;
        height: 64px;
        font-size: 14px;
        border-radius: 10px;
    }

    .custom_button_green {
        color: #3C6E71;
    }

    .custom_button_red {
        color: #FF0000;
    }
    
    .custom_button_green:active, .custom_button_green:hover {
        background: #3C6E71;
    }

    .custom_button_red:active, .custom_button_red:hover {
        background: #FF0000;
    }
   
    .custom_button:active, .custom_button:hover {
        /* background: #3C6E71; */
        color: white;
        text-decoration: none;
    }
</style>