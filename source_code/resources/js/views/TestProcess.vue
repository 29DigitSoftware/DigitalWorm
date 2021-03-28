<template>
    <div class="wrapper">
    
        <colored-header 
            :colorStyle='colorStyle'
            :title='Test.title' 
            :Timer="true"
        />            

        <div v-if="testState == 2" class="timeIsUp">

            <div class="bg"></div>
            <div class="main">
                <h1> Уақыт бітті </h1>
                <custom-submit-button 
                    @clicked="endTest" 
                    title="Аяқтау"
                    :colorStyle='colorStyle' 
                /> 
            </div>

        </div>

        <div class="questionBox container">
    
            <div class="progressContainer mb-3">
                <div class="progress" 
                    :value="percentage" 
                    max="100"
                >
                    <div 
                        :class='colorStyle'
                        class="progress-bar" 
                        role="progressbar" 
                        :style='"width: max(8%," + percentage + "%);"'
                        :aria-valuenow='percentage' 
                        aria-valuemin="0" 
                        aria-valuemax="100"
                    >
                        <span class="white_text">{{percentage}}%</span> 
                    </div>
                </div>
            </div>

            <!--qusetionContainer-->
            <transition name="slide-fade" mode="out-in">
                <div 
                    class="questionContainer" 
                    v-if="questionIndex<Test.questions.length" 
                    :key="questionIndex"
                >
                    
                    <!-- questionTitle -->
                    <h2 class="titleContainer title">
                        {{ Test.questions[questionIndex].question }}
                    </h2>

                    <!-- quizOptions -->
                    <div class="optionContainer">
                        <div 
                            class="option" 
                            v-for="(response, index) in Test.questions[questionIndex].answers" 
                            @click="selectOption(index)" 
                            :class="{ 
                                        'right_answer': questionState == 1 && userResponses[questionIndex] == index,
                                        'wrong_answer': questionState == -1 && userResponses[questionIndex] == index
                                    }" 
                            :key="index"
                        >
                            {{ response.answer }}
                        </div>
                    </div>

                        
                    <custom-submit-button 
                        v-if="
                            questionIndex + 1 == userResponses.length && 
                            userResponses.length < Test.questions.length
                        "
                        @clicked="nextQ" 
                        title="Келесі сұрақ"
                        :colorStyle='colorStyle' 
                    /> 

                    <custom-submit-button 
                        v-else-if="
                            questionIndex + 1 == userResponses.length && 
                            userResponses.length == Test.questions.length
                        "
                        @clicked="nextQ" 
                        title="Аяқтау"
                        :colorStyle='colorStyle' 
                    />  

                    <custom-submit-button 
                        v-else
                        @clicked="Warn"
                        title="Cұраққа жауап беріңіз" 
                    /> 

                </div>
                
            </transition>
        </div>

    </div>
</template>

<script>

    import { mapActions, mapGetters, mapMutations } from 'vuex'
    
    import coloredHeader from '../components/colored-header'
    import customSubmitButton from '../components/customSubmitButton'

    export default {
        data(){
            return {        
                questionIndex: 0,
                questionState: 0,
                userResponses: [],
                score: 0,
                isActive: false,
            };
        },
        components: {
            coloredHeader,
            customSubmitButton,
        },      
        filters: {
            charIndex: function(i) {
                return String.fromCharCode(97 + i);
            }
        },
        mounted() {
            console.log("Color style");
            
            this.resetOnlyProgress();

            console.log(this.testState);

            console.log(this.Test);
            console.log(this.colorStyle);

        },
        computed: {
            ...mapGetters([
                'Test', 
                'testState', 
                'colorStyle', 
                'fetchTestResult',
            ]),
            
            percentage(){
                return (this.questionIndex / this.Test.questions.length) * 100;
            },
        },
        methods: {
            ...mapMutations(['resetOnlyProgress']),
            ...mapActions(['sendTestScore']),

            selectOption(index) {
                
                // if already answered
                if( this.questionState != 0 ) return;

                // if it is right answer
                if( this.Test.questions[this.questionIndex].answers[index].is_correct === 1 ){
                    this.questionState = 1;
                    this.score++;
                    console.log("right");
                }
                else{
                    this.questionState = -1;
                    console.log("wrong!");
                }

                console.log(this.questionState)
                // add response
                Vue.set(this.userResponses, this.questionIndex, index);
                console.log(this.userResponses);
            },

            endTest() {
                console.log('test has been finished');
                this.sendTestScore(this.score);
                this.$router.push('/test_result');
            },

            nextQ() {
                if( this.questionIndex + 1 != this.userResponses.length )
                    return;
                
                this.questionState = 0;

                if (this.questionIndex + 1 < this.Test.questions.length)
                    this.questionIndex++;
                else{
                    this.endTest();
                }
            },

            prevQ: function() {
                if (this.Test.questions.length > 0) 
                    this.questionIndex--;
            },

            Warn: function() {
                console.log('Suraqqa jauap berwiw')
            }
        }
    }

</script>

<style scoped>

    body {
        font-family: "Open Sans", sans-serif;
        font-size: 14px;
        height: 100vh;
        background: #CFD8DC;
        cursor: default !important;
        user-select: none;
        user-drag: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
 
    .button {
        transition: 0.3s;
    }

    .title,
    .subtitle {
        font-family: Montserrat, sans-serif;
        font-weight: normal;
    }

    .animated {
      transition-duration: 0.15s;
    }

    .questionBox {
        width: auto;
        
        /* min-height: 450px; */
        max-height: 85%;
        
        position: relative;
        
        display: flex;
        flex-flow: column;

        overflow: hidden;

        /*box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);*/
    }

    .questionBox h1 {
        font-weight: bold;
        margin-bottom: 1rem !important;
    }
    .questionBox .progressContainer {
        margin: 0 auto;
        width: 100%;
    }


    .questionBox .titleContainer {

        min-height: 64px;
        max-height: 112px;

        display: flex;
        align-items: center;
        justify-content: center;

        text-align: center;

        margin: 0 0px;
        margin-bottom: 24px;
        padding: 10px 10px;
        
        transition: 0.3s;
        cursor: pointer;

        background-color: #EAEAF6;
        color: rgba(0, 0, 0, 0.85);
        
        border-radius: 5px;
        border: transparent 1px solid;

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.19), 0 3px 3px rgba(0, 0, 0, 0.23);

    }
    .questionBox .quizForm {
        display: block;
        white-space: normal;
        height: 100%;
        width: 100%;
    }
    .questionBox .quizForm .quizFormContainer {
        height: 100%;
        margin: 15px 18px;
    }
    .questionBox .quizForm .quizFormContainer .field-label {
        text-align: left;
        margin-bottom: 0.5rem;
    }
    .questionBox .quizCompleted {
        width: 100%;
        padding: 1rem;
        text-align: center;
    }
    .questionBox .quizCompleted > .icon {
        color: #FF5252;
        font-size: 5rem;
    }
    .questionBox .quizCompleted > .icon .is-active {
        color: #00E676;
    }
    .questionBox .questionContainer {
        white-space: normal;
        height: 100%;
        width: 100%;
    }
    .questionBox .questionContainer .optionContainer {
        margin-bottom: 24px;
        flex-grow: 1;
    }
    .questionBox .questionContainer .optionContainer .option {      
        position: relative;  
        min-height: 10vh;
        padding: 5px 10px;
        text-align: center;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 8px;
        margin-bottom: 12px;
        
        transition: 0.3s;
        cursor: pointer;

        background-color: #EAEAF6;
        color: rgba(0, 0, 0, 0.85);
        
        border-radius: 5px;
        border: transparent 1px solid;
    }
    .questionBox .questionContainer .optionContainer .option.right_answer {
        border-color: rgba(0, 0, 0, 0.25);
        background-color: #42C284;
        color: white;
    }
    .questionBox .questionContainer .optionContainer .option.wrong_answer {
        border-color: rgba(0, 0, 0, 0.25);
        background-color: #FD8362;
        color: white;
    }
    .questionBox .questionContainer .optionContainer .option.is-selected {
        border-color: rgba(0, 0, 0, 0.25);
        background-color: white;
    }
    /*
    .questionBox .questionContainer .optionContainer .option:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }
    */
    .questionBox .questionContainer .optionContainer .option:active {
        transform: scaleX(0.9);
    }
    .questionBox .questionContainer .questionFooter {
        background: rgba(0, 0, 0, 0.025);
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        width: 100%;
        align-self: flex-end;
    }
    .questionBox .questionContainer .questionFooter .pagination {
        margin: 15px 25px;
    }

    .pagination {
        display: flex;
        justify-content: space-between;
    }

    .button {
        padding: 0.5rem 1rem;
        border: 1px solid rgba(0, 0, 0, 0.25);
        border-radius: 5rem;
        margin: 0 0.25rem;
        transition: 0.3s;
    }
    .button:hover {
        cursor: pointer;
        background: #ECEFF1;
        border-color: rgba(0, 0, 0, 0.25);
    }
    .button.is-active {
        background: #3D5AFE;
        color: white;
        border-color: transparent;
    }
    .button.is-active:hover {
        background: #0a2ffe;
    }
    /*
    @media screen and (min-width: 769px) {
    .questionBox {
        align-items: center;
        justify-content: center;
    }
    .questionBox .questionContainer {
        display: flex;
        flex-direction: column;
    }
    }
    @media screen and (max-width: 768px) {
    .sidebar {
        height: auto !important;
        border-radius: 6px 6px 0px 0px;
    }
    }
    */

    .timeIsUp {   
        position: fixed;

        font-size: 24px;
        color: white;

        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
        cursor: pointer;
    }

    .timeIsUp .bg{

        background-color: rgba(0,0,0,0.75);
        background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAAA1BMVEUAAACnej3aAAAASElEQVR4nO3BMQEAAADCoPVPbQhfoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABeA8XKAAFZcBBuAAAAAElFTkSuQmCC');

        opacity: 0.8;

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    .timeIsUp .main {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }


    .timeIsUp h1{   
        margin-bottom: 12px;
        font: Condensed Bold 23px/24px 'Nunito';
    }

    /deep/ .timeIsUp .submit_button {
        min-width: 256px;
        max-width: 384px;
    }

    /deep/ .submit_button {
        margin: 0 8px;
    }

</style>