<template>
    <div class="wrapper">
        
        <full-header 
            goTo='/catalog'
        />

        <div class="main__info">

            <div class="user__avatar">
                <img src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1214428300?k=6&m=1214428300&s=612x612&w=0&h=rvt5KGND3z8kfrHELplF9zmr8d6COZQ-1vYK9mvSxnc=" alt="">
            </div>

            <div class="user__info">                
                <h1 class="font-weight-bold"> {{profile.email}} </h1>
            </div>
            
            <div class="button__group">
                <profile-page-button
                    v-for="button in buttonsBefore" 
                    :key="button.text_value"  
                    :text_value="button.text_value"
                    :svg_name="button.svg_name"
                    :path="button.path"
                    :signout_style="button.signout_style"
                    :spoiler="button.spoiler"
                    v-on:click="routingBetween(button.path)"
                >
                    <div v-html="button.template"></div>
                </profile-page-button>
                <profile-page-button 
                    :key="'Подписка 2'"  
                    :text_value="'Подписка 2'"
                    :svg_name="'fa-money-check'"
                    :path="'/library'"
                    :spoiler="true"
                >
                    <div>
                        <div class="subscription_info">
                            <span class="font-weight-bold first-text"> Tөленбеді: </span>
                            <button class="btn btn-primary" v-on:click="buttonClicked()"> Төлеу </button>
                        </div>
                    </div>
                </profile-page-button>
                <profile-page-button
                    v-for="button in buttonsAfter" 
                    :key="button.text_value"  
                    :text_value="button.text_value"
                    :svg_name="button.svg_name"
                    :path="button.path"
                    :signout_style="button.signout_style"
                    :spoiler="button.spoiler"
                >
                    <div v-html="button.template"></div>
                </profile-page-button>
            </div>

        </div>        

    </div>
</template>

<script>
    import backButtonItemVue from '../components/items/back-button-item.vue';
    import profilePageButton from '../components/items/profile-page-button.vue';
    import fullWidthHeaderue from '../components/full-width-header.vue'
    import { mapActions, mapGetters } from 'vuex';
    import routingBetween from '../mixins'

    export default {
        data(){
            return {
                buttonsBefore: [
                    {
                        text_value: 'Менің кітаптарым',
                        path: '/library',
                        svg_name: 'fa-book'
                    },
                    {
                        text_value: 'Подписка',
                        svg_name: 'fa-money-check',
                        spoiler: true,
                        template: '<div class="subscription_info"><span class="font-weight-bold green-text"> Tөленді: </span><span> 21.02.2020 </span></div>'
                    }
                ],
                buttonsAfter: [
                    {
                        text_value: 'Аккаунттан шығу',
                        svg_name: 'fa-sign-out-alt',
                        signout_style: 'first-text'
                    }
                ]
            };
        },
        created(){
            this.$store.dispatch("fetchProfile");
        },

        components: {
            backButtonItemVue,
            'full-header': fullWidthHeaderue,
            profilePageButton,
        },
        computed: {
            ...mapGetters(['profile']),
        },
        mixins: [
            routingBetween
        ],
        methods: {
            buttonClicked() {
                console.log('Hey!')
                this.$router.push('/pricing-table')
            }
        }
    }
</script>

<style scoped>

    .wrapper {
        position: absolute;
        margin: 0;
        height: 100vh;
        width: 100vw;
        padding: 0px;
        overflow-x: hidden;
        background: white;
    }

    .main__info {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        margin-top: -15px;
        background-color: #fff;
        /* height: 100%; */
    }

    .user__info::before {
        margin-top: -60px;
    }

    .user__avatar {
        position: relative;
        line-height: 32px;
        width: 200px;
        margin: 0 auto;
        height: 75px;
    }

    .user__avatar img {
        position: absolute;
        top: -55px;
        left: 50%;
        transform: translateX(-50%);
        height: 110px;
        width: 110px;
        border-radius: 50%;
        background: #fff !important;
    }

    .user__info {
        text-align: center;
        min-width: 200px;
        margin: 0 auto;
    }

    .user__info h1 {
        font-size: 22px;
        color: #2F3138;
    }

    .button__group {
        margin-top: 64px
    }

    /deep/ .subscription_info {
        padding: 16px 32px;
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        box-shadow: 0px 2px 0px 2px  rgba(0, 0, 0, .075);      
    }

</style>