<template>
    <div class="group">
        <button 
            type="button" 
            class="btn btn-link"
            @click="buttonAction()" 
        >
            <span>
                <i class="fa mr-1 left-icon" :class="[svg_name, signout_style]"></i>
                <span 
                    class="font-weight-bold button_text"
                >
                    {{text_value}}
                </span> 
            </span>
            <span>
                <i v-if='!pressed' class="mr-2 right fa fa-chevron-right"> </i>
                <i v-else class="mr-2 right fa fa-chevron-down"> </i>
            </span>
        </button>

        <transition name="fade">
            <slot v-if="showSpoiler">
            </slot>
        </transition>

    </div>
</template>

<script>

    export default {
        data(){
            return {
                pressed: false
            };
        },
        computed: {
            showSpoiler(){
                return this.spoiler & this.pressed
            }
        },
        props: {
            text_value: {
                default: 'AAA'
            },
            spoiler: {
                type: Boolean,
                default: false
            },
            path: {
                default: ''
            },
            svg_name: {
                default: 'user'
            },
            signout_style: {
                default: ''
            }
        },

        methods: {
            buttonAction(){
                if( this.spoiler ){
                    this.activateSpoiler();
                    return
                }
                else if( this.path ){
                    console.log('PROFILE CHANGE ROUTE PRESSED')
                    this.$router.push(this.path);
                }
                else{
                    this.$store.dispatch("destroyToken")
                    .then(
                        this.$router.push('/')
                    )
                }
            },

            activateSpoiler(){
                this.pressed = this.pressed ^ 1;
            }
        },
        
    }
</script>

<style scoped>
    
    button {
        display: flex;
        justify-content: space-between;
        color: #504c4b;
        font-size: 16px;
        margin: 16px 0;
        width: 100%;
        border-radius: 0;
    }

    button .left-icon {
        width: 32px
    }

    button:active, button:hover, button:focus, i.right{
        text-decoration: none; 
        color: #504c4b !important;
    }

    button:active .button_text, 
    button:hover .button_text, 
    button:focus .button_text{
        text-decoration: none; 
        color: #504c4b !important;
    }


    button:active, button:hover, button:focus .left-icon{
        text-decoration: none;
        /* background: #8a8888; */
        color: #3C6E71 !important   
    }
    

</style>
