<template>

    <div class="items_container" >
        <div class="container author">
            <div class="row">
                <div class="col-12">
                    <div class="author_block">
                        <div 
                            class="author_block_cover animated-background animated-background-circle ml-3"
                        >
                            <author-item 
                                :img="Content.img"
                                @click="routingBetween('author_info', Content.id)"       
                            />
                        </div>

                        <div 
                            class="author_block_titles"
                             @click="routingBetween('author_info', Content.id)" 
                        >
                            <p class="author_block_titles_name" >{{ fullname }}</p>
                            <p class="author_block_titles_job"> {{ Content.title }} </p>
                        </div>
                    </div>
                    <more-details 
                        :id="Content.id"
                        path="author_info"
                    />
                </div>
            </div>
        </div>
            
        <books :books="Content.books" />

    </div>
</template>

<script>
    import HorizontalBooksSlider from './HorizontalBooksSlider';
    import AuthorItem from '../items/author-item.vue';
    import MoreDetails from '../../components/more-details';
    import routingBetween from '../../mixins'

    export default {
        data(){
            return {
            };
        },
        
        props: {
            Content: {
                default: function(){
                    return {}
                },
            }
        },

        mixins: [
            routingBetween,
        ],
        components: {
            'books': HorizontalBooksSlider,
            AuthorItem,
            MoreDetails,
        },
        computed: {
            fullname(){
                var result = '';
                if(this.Content.name)
                    result = result + this.Content.name;
                if(this.Content.name)
                    result = result + ' ' + this.Content.surname
                
                if(result === '')
                    result = 'Loading';
                return result;
            },
        },
    }
</script>

<style scoped>
    
    .container, .container-fixed, .container-fluid {
        margin-bottom: 0;
        padding: 0px;
    }

    .items_container {
        margin-top: 8px;
    }

    .author {
        margin-top: 10px;
    }

    .outer { 
        margin-right: 5px;
    }

    .horizontal-scroll {
        height: 160px;
    }

    .author_block {
        
        margin-bottom: -5px;

        display: flex;
        align-items: center;

        min-width: 128px;
        max-width: 256px;
        height: 64px;
    }

    .author_block_cover {
        position: relative;
        height: 64px;
        width: 64px;
        border-radius: 50%;
        margin-right: 10px;
    
        box-shadow: 0px 3px 6px #00000029;
    }

    .author_block .author_block_titles_name {
        font-size: 16px;
        font-weight: 800;
        text-transform: capitalize;
        margin-bottom: 5px;;
    }

    
    .author_block .author_block_titles_job {
        font-size: 12px;
        font-weight: 700;
        text-transform: capitalize;
    }

</style>