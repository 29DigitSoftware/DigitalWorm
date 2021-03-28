<template functional>
    <div 
        class="inner-content animated-background animated-background-circle"    
        @click="listeners['click']"
    >

        <img 
            :src='props.img' 
            onerror="this.style.display='none'"
            onsuspense="this.style.display='none'"  
            class="author_avatar " 
            alt=""
        >

    </div>
</template> 

<script>

    export default {
        functional: true,
        props: {
            img: {
                type: String,
                required: true,
                default: 'http://www.landscapingbydesign.com.au/wp-content/uploads/2018/11/img-person-placeholder.jpg',
            },
        },
    }
</script>

<style scoped>

    .inner-content {
        position: relative;
        min-width: 64px;
        width: 64px;
        height: 64px;

        border-radius: 50%;
    }

    .inner-content .author_avatar {
        position: absolute;

        max-width: 64px;
        max-height: 64px;
    }

</style>