<template>
    <div class="inner-content  animated-background">
        <div 
            @click="openTest(test.id)" 
            class="test_content" 
            :class="colorStyle"
        >
            <img 
                :src='test.img'
                class="test_content_img"
            >
            <p class="test_content_title"> {{test.title}} </p>
            <p v-if="test.progress!=0" class="test_content_progress"> {{test.progress}}% </p>
            <button 
                v-else 
                type="button" 
                class="btn btn-light btn-xs test_content_start"
                :class="colorStyle"
                @click="openTest(test.id)"
                > 
                тапсыру 
            </button>
        </div>
    </div>
    
</template>

<script>

    import routingBetween from '../../mixins'
    import { mapActions, mapGetters } from 'vuex';

    export default {
        props: ['test', 'index'],

        mixins: [
            routingBetween,
        ],
        data(){
            return {
                palettes : [ 
                    "first",
                    "second",
                    "third",
                    "fourth",
                ],
            }
        },
        
        computed: {      
            colorStyle(){
                return this.palettes[this.index % 4];
            },
        },

        methods: {
            ...mapActions(['setColorStyle']),

             openTest(id) {
                this.setColorStyle(this.colorStyle);
                this.routingBetween('test_intro', id);
            },
    
        }
    }
</script>

<style scoped>

    .inner-content {
        min-width: 105px;
        /* width: 105px; */

        height: calc(100%);

        border-radius: 5px;
    }

    .test_content {
        display: flex;
        flex-flow: column nowrap;  
        align-items: center;
        
        height: 100%;
        width: 100%;
    }

    
    .test_content .test_content_img {
        height: 48px;
        margin-bottom: 20px;
        margin-top: 32px;
    }
    

    .test_content .test_content_title {
        text-align: center;
        text-transform: uppercase;
        font: Condensed Bold 14px/15px 'Nunito';
        letter-spacing: 0.13px;
        color: #FFFFFF;
        text-shadow: 0px 3px 6px #00000029;
        opacity: 1;
        
        margin-bottom: 10px;
    }

    .test_content .test_content_progress {
        text-align: center;
        text-transform: uppercase;
        font: Condensed Bold 10px/12px 'Nunito';
        line-height: 20px;
        letter-spacing: 0.1px;
        color: #FFFFFF;
        opacity: 1;
    }

    .test_content .test_content_start {
        text-transform: uppercase;
        font-weight: 800;
        font-size: 8px;  
        padding: 2px 5px;
        /* height: 16px; */
        /* width: 48px;; */

        text-align: center;
        text-shadow: 0px 3px 6px #00000029;
        background: white !important;
    }


</style>