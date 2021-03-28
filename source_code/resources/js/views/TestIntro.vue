<template>
    <div class="wrapper">
    
        <coloredHeader 
            :colorStyle='colorStyle'
            :title='Test.title' 
        />

        <div class="main">
        
            <div class="image">
                <img 
                    src="/img/test_1.png" 
                    alt=""
                    class="icon"
                >
            </div>    
            
            <div class="description">
                <h1 :class="colorStyle">Түсіндірмесі</h1>
                <p> 
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur distinctio nihil natus beatae quos autem? Asperiores assumenda, laborum fugit incidunt obcaecati libero veritatis tempore vel? Doloremque dicta voluptates perferendis velit.
                </p>
            </div>    

            <custom-submit-button @clicked="startTest()" title="Тапсыру" :colorStyle='colorStyle' /> 

        </div>

    </div>
</template>

<script>

    import { mapActions, mapGetters } from 'vuex'
    import coloredHeader from '../components/colored-header'
    import customSubmitButton from '../components/customSubmitButton'

    export default {
        data(){
            return {
            };
        },
        components: {
            coloredHeader,
            customSubmitButton
        },
        created() {
            console.log("Color style");
            this.fetchTest();
            console.log(this.Test);
            console.log(this.colorStyle);
        },
        computed: {
            ...mapGetters(['Test', 'colorStyle']),
        },
        methods: {
            ...mapActions(['fetchTest']),
            
            startTest(){
                console.log("Start Test by id ");
                               
                this.$router.push('test_process');
            }

        }
    }

</script>

<style scoped>

    .wrapper {
        height: 100vh;
    }

    .main { 
        min-height: 450px;
        height: 80%;

        margin: 0 16px;

        display: flex;
        flex-flow: column;
        justify-content: space-around;

        font-size: 16px;

    }

    .main .image {
        display: flex;
        justify-content: center;
    }

    .main .icon {
        height: 112px;
    }

    .main .description {
        text-align: center;
        font: Bold 'Nunito';
        /* font-weight: 600; */
    }

    .main .description h1{
        background: white !important;
        font-size: 22px;
        margin: 10px 0;
        text-transform: uppercase;
        font-weight: bold;
    }

</style>