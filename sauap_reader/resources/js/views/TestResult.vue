<template>
    <div class="wrapper">
    
        <div class="ml-2 mr-2">
            <colored-header 
                :colorStyle='colorStyle'
                :title='Test.title' 
                :NoBackButton="true"
            />
        </div>

        <div class="main">
            <div class="result_block">

                <div class="Result">
                    <p>
                        Cіз 
                    <span :class="colorStyle" class="white_bg">
                        {{testScore}}
                    </span> 
                        ұпай жинадыңыз
                    </p>

                </div>
            </div>

            <books-scroll :section="testResult.Result.sections[0]" isMore="false" >
                <section-header 
                    title="Сізге арналған кітаптар" 
                />
            </books-scroll>

            <div class="ml-4 mr-4">
                <custom-submit-button 
                    class="mt-4"
                    :colorStyle='colorStyle'
                    @clicked="goMenu()" 
                    title="Қайту" 
                />
            </div>
        </div>

    </div>
</template>

<script>

    import { mapGetters, mapMutations } from 'vuex'

    import SectionHeader from '../components/section-item-header';
    import coloredHeader from '../components/colored-header'
    import customSubmitButton from '../components/customSubmitButton'
    import HorizontalBooksSlider from '../components/section-items/HorizontalBooksSlider';

    export default {
        data(){
            return {
            };
        },
        components: {
            coloredHeader,
            customSubmitButton,
            'books-scroll': HorizontalBooksSlider,
            SectionHeader
        },
        mounted() {
            console.log("Color style");
            console.log(this.colorStyle);
            console.log(this.Test);
            console.log(this.testResult);
        },
        computed: {
            ...mapGetters(['Test', 'testScore', 'colorStyle', 'testResult']),
        },
        methods: {
            ...mapMutations(['resetTest']),
    
            goMenu(){
                this.resetTest();
                this.$router.push('catalog');
            }

        }
    }

</script>

<style scoped>

    .wrapper {
        padding: 0;
    }

    .items_container {
        margin: 10px 0px
    }

    .main {
        min-height: 450px;
        max-height: 80%;
        display: flex;
        flex-flow: column;
        justify-content: space-between;
    }

    .result_block { 
        display: flex;
        flex-flow: column;
        justify-content: start;
        font-size: 16px;
    }

    .result_block .Result {
            
        background: white;
        color: black;

        width: auto 0;
        height: 48px;

        text-align: center;

        font-size: 22px;
        text-transform: uppercase;
        font-weight: bold;

        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;;

    }

</style>