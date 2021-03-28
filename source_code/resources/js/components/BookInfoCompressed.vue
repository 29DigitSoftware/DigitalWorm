<template>
    <div v-if="Content" class="book container">
        <div class="row">

            <div class="col-4 col-md-2 book_cover_container">
                <div 
                    class="book_cover_panel animated-background"
                    @click="click()"
                >  
                    <img 
                        v-if="Content.img"
                        onerror="this.style.display='none'"
                        onsuspense="this.style.display='none'"
                        :src='Content.img'
                        class="book_cover " 
                        alt=""
                    > 
                </div>
            </div>
            
            <div class="col-8 col-md-9 book_text_panel">

                <div class="texts pr-4">
                    <div class="head">
                        <div class="pr-0">
                            <span 
                                v-if="Content.title"
                                class="title"                             
                                @click="click()"
                            >
                            {{Content.title}}
                            </span>
                        </div>
                        <!-- <div class="pl-0 pr-0 rating">
                            4.5
                            <i class="fa fa-star"></i> 
                        </div> -->
                    </div>
                    
                    <p
                        v-if="Content.author"
                        class="author"
                    >
                        {{Content.author}}
                    </p>
                    
                    <p v-if="Content.description" class="description">
                        {{Content.description.substring(0,80)}} ...
                    </p>
                </div>

                <div class="buttons">
                    <library-button 
                        :isAdded="Content.is_added"
                        :book="Content"
                        buttonSize="custom_button_small" 
                    />
                </div>

            </div>
            
        </div>
        <hr class="delimiter_hr">
    </div>

    <div v-else class="book container">
        <div class="row">

            <div class="col-4 col-md-2 book_cover_container">
                <div class="book_cover_panel animated-background">  
                   
                </div>
            </div>
            
            <div class="col-8 col-md-9 book_text_panel">

                <div class="empty_rectangle animated-background">

                </div>

            </div>
            
        </div>
        <hr class="delimiter_hr">
    </div>
</template>

<script>
    import LibraryButton from '../components/items/library-button';
    import addBook from '../mixins'
    import deleteBook from '../mixins'

    export default {
        data(){
            return {
                isAdded: false
            };
        },
        created(){
            this.isAdded = this.Content.is_added;
        },
        computed: {
        },
        mixins: [
            addBook,
            deleteBook
        ],
        methods: {
            click(){
                this.$emit('click')
            },
        },
        props: {
            Content: {
                default: null
            }
        },
        components: {
           LibraryButton,
        }
    }
</script>

<style scoped>

    .container, .container-fixed, .container-fluid {
        margin-bottom: 0;
    }

    .book_cover_container {
        display: flex;
        justify-content: center;
        height: 156px;
        padding: 0;
        padding-left: 6px;
    }

    .book_cover_panel {
        /* position: relative;   */
        min-width: 100px;
        width: 100px;

        border-radius: 5px;
    
        background: #3C6E71;

        box-shadow: 0px 4px 7px #00000029;
    }

    .book_cover_panel .book_cover {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
        /* width: 100px; */
        height: 100%;
    }

    .book_text_panel {
        display: flex;
        flex-flow: column;
        justify-content: space-between;

        font-weight: 700;;
        min-height: 113px;

        padding: 0px;
        padding-left: 12px;
        margin: 0px;

    }

    .book_text_panel .head{
        display: flex;
        justify-content: space-between;
    } 

    .pr-0 {
        padding-right: 0;
    }

    .pl-0 {
        padding-left: 0;
    }


    .head .rating{
        min-width: 40px;
        color: #3C6E71;
        font-size: 12px;
    }
    .head .title {
        font-size: 18px;
        width: 140px;
    }

    .book_text_panel .author{
        margin-top: 5px;
        font-size: 14px;
        color: #727272;
    }
    
    .book_text_panel .description{
        margin-top: 10px;
        font-size: 12px;
        
        letter-spacing: 0.1px;

        color: #727272;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
        max-width: 160px;
        margin-top: 16px;
    }

    .delimiter_hr {
        border-top: 1px solid #B7B7B7;
        width: 100%;
    }

    .empty_rectangle {
        margin: 0px 5px; 

        height: 85px;
        max-width: 190px;

        border-radius: 5px;
    }
</style>