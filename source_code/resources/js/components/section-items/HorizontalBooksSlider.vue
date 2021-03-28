<template>
    
    <div class="items_container">
        <div>

            <slot> </slot>

            <horizontal-scroll class="horizontal-scroll">

                <bookItem 
                    v-for="book in books" 
                    :key="book.id" 
                    :img="book.img"
                    class="outer"
                    @click="routingBetween('book_info', book.id)"
                /> 

            </horizontal-scroll>

        </div>
    </div>
    
</template>

<script>
    import HorizontalScroll from 'vue-horizontal-scroll'
    import 'vue-horizontal-scroll/dist/vue-horizontal-scroll.css'
    import bookItem from '../items/book-item'
    import routingBetween from '../../mixins'
    
    export default {
        data(){
            return {
            };
        },
        
        props: {
            books: {
                default: function(){
                    return [
                        {
                            id: -1,
                        }, 
                        {
                            id: -1,
                        }, 
                        {
                            id: -1,
                        }, 
                    ]
                }
            }, 
        },
        mixins: [
            routingBetween,
        ],
        components: {
            HorizontalScroll,
            bookItem
        },
    }
</script>

<style scoped>
    
    .horizontal-scroll {
        height: 160px;
    }

    .outer { 
        margin-right: 5px;
    }
    
</style>