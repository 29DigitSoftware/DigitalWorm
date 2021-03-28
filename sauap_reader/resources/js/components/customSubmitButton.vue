<template functional>
    
    <div 
        class="submit_button" 
        :class='props.colorStyle'
        @click="listeners['clicked']"
    >
        <h1>{{props.title}}</h1>
    </div>   

</template>

<script>

     export default {
        functional: true,
        props: ['title', 'colorStyle'],
    }

</script>

<style scoped>

    .submit_button{
        
        border: none;
        border-radius: 5px;

        height: 48px;
        width: auto;
        
        margin: 0 2px;
           
        background: darkgrey;    
        color: white;
        text-align: center;
        
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.75s ease;

        font-weight: bold;
    }

    /*
    .submit_button:hover, .submit_button:active{        
        box-shadow: -3px -4px 12px 1px rgba(0,0,0,0.74);
    }*/

</style>