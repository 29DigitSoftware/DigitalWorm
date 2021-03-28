<template>
    <button 
        type="button" 
        class=" btn btn-light btn-sm custom_button"    
        :class="[buttonSize, buttonColorStyle]"           
        @click="libraryManipulator()"                
    > 
        <i class="mr-2 fa fa-book"></i> 
        <span> {{buttonText}} </span>
    </button>
</template>

<script>
    import { mapGetters } from 'vuex';
    
    export default {        
        name: 'Library BTN',
        data(){
            return {
                isAddedValue: null
            };
        },
        created(){
            this.isAddedValue = this.isAdded
        },
        computed:{
            ...mapGetters(['isAuthorized']),

            buttonColorStyle(){
                if( this.isAddedValue )
                    return 'custom_button_red'
                else 
                    return 'custom_button_green'
            },
            buttonText(){
                if( this.isAddedValue )
                    return 'өшіру'
                else 
                    return 'қосу'
            }
        },
        props: {
            buttonSize: {
                default: 'custom_button_small'
            },
            isAdded: {
                default: false
            },
            book: {
                default: {
                    id: -1
                }
            }
        },

        methods: {
            // click(){
            //     this.$emit('simpleButtonFunction')
            // },
            libraryManipulator() {

                if( !this.isAuthorized ){
                    this.$router.push('login')
                    return
                }

                if( this.book.id === -1 )
                    return

                console.log("Doing something on ", this.book)

                if ( !this.isAddedValue ) {
                    this.$store.dispatch("addBook", this.book).then(
                        response => this.isAddedValue = true,
                        error => {
                            console.log('BookInfoCompressed.vue: book add rejected: ' + error.message);
                        }
                    )
                }
                else {
                    this.$store.dispatch("deleteBook", this.book).then(
                        response => this.isAddedValue = false,
                        error => {
                            console.log('BookInfoCompressed.vue: book delete rejected: ' + error.message);
                        }
                    )
                }
            },
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
        color: #F18F01;
    }
    
    .custom_button_green:active, .custom_button_green:hover {
        background: #3C6E71;
    }

    .custom_button_red:active, .custom_button_red:hover {
        background: #F18F01;
    }
   
    .custom_button:active, .custom_button:hover {
        /* background: #3C6E71; */
        color: white;
        text-decoration: none;
    }
</style>