<template>
    <div 
        class="timer"
        :class="{ 'red' : seconds <= 30 }"    
    >
        {{minutesLeft}} : {{ secondsLeft }}
    </div>
</template>

<script>

    import { mapActions, mapGetters, mapMutations } from 'vuex'

    export default {
        data(){
            return {        
                // countdown 5 mins => 300 seconds
                seconds: 100,
            };
        },
        mounted() {
            console.log(this.testState);
        },
        created() {
           this.countDownTimer();
        },
        computed: {
            ...mapGetters(['testState']),
            minutesLeft(){
                return parseInt(this.seconds / 60);
            },
            secondsLeft(){
                return this.seconds - this.minutesLeft * 60;
            }
        },

        methods: {
            ...mapMutations(['startTest', 'finishTest']),
            
            countDownTimer() {

                if( this.testState == 0 )
                    this.startTest();

                if(this.seconds > 0) {
                    setTimeout(() => {
                        this.seconds -= 1
                        this.countDownTimer()
                    }, 1000)
                }

                else
                    this.finishTest();

            },

        }
    }

</script>

<style scoped>

    .timer {

        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);

        height: 36px;
        min-width: 72px;
        max-width: 96px;
        
        font-size: 16px;
        font-weight: 800;

        display: flex;
        align-items: center;
        justify-content: center;

        text-align: center;

        margin: 0 0px;
        margin-bottom: 24px;
        padding: 0 5px;
        
        transition: 0.3s;
        cursor: pointer;

        background-color: #EAEAF6;
        color: rgba(0, 0, 0, 0.85);
        
        border-radius: 5px;
        border: transparent 1px solid;

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.19), 0 3px 3px rgba(0, 0, 0, 0.23);

    }

    .red {
        color: red;
    }

</style>