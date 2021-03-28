<template>
    <div class="items_container">
        <div>
            <slot> </slot>

            <horizontal-scroll class="horizontal-scroll">

                <author-item 
                    :img="author.img"
                    v-for="author in authors" 
                    :key="author.id" 
                    class="outer"
                    @click="routingBetween('author_info', author.id)"
                />

            </horizontal-scroll>

        </div>
    </div>
</template>

<script>
    import HorizontalScroll from 'vue-horizontal-scroll'
    import 'vue-horizontal-scroll/dist/vue-horizontal-scroll.css'
    import AuthorItem from '../items/author-item'
    import routingBetween from '../../mixins'

    export default {
        data(){
            return {
            };
        },
        
        props: {
            authors: {
                default: function(){
                    return [{}, {}, {}, {}]
                }
            }, 
        },
        mixins: [
            routingBetween,
        ],
        components: {
            HorizontalScroll,
            AuthorItem,
        },
    }
</script>

<style scoped>
    
    .horizontal-scroll {
        height: 80px;
    }

    
    .outer {
        display: flex;
        align-items: center;
        margin-right: 5px;
    }

</style>