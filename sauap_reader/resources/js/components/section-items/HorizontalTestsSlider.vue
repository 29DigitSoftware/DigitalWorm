<template>

    <div class="items_container">
        <div>

            <slot></slot>
            
            <horizontal-scroll class="horizontal-scroll">

                <testItem 
                    :test="test"
                    :index="index"
                    v-for="(test, index) in tests" 
                    :key="index" 
                    class="outer"
                >
                </testItem>

            </horizontal-scroll>

        </div>
    </div>
</template>

<script>

    import HorizontalScroll from 'vue-horizontal-scroll'
    import 'vue-horizontal-scroll/dist/vue-horizontal-scroll.css'    
    import testItem from '../items/test-item';

    export default {
        data(){
            return {
            };
        },
        
        props: {
            tests: {
                default: function(){
                    return [{}, {}, {}, {}]
                }
            }, 
        },

        components: {
            HorizontalScroll,
            testItem,
        },
        methods: {
            
        }
    }
</script>

<style scoped>

    .horizontal-scroll {
        height: 160px;
    }

    .outer { 
        margin-right: 0px;
    }

</style>