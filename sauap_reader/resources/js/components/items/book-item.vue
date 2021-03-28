<template functional>
    <div 
        class="inner-content animated-background" 
        @click="listeners['click']"
    >

        <img 
            v-if="props.img"
            :src='props.img' 
            onerror="this.style.display='none'"
            onsuspense="this.style.display='none'"
            class="book_cover " 
            alt=""
        >

    </div>
</template> 

<script>

    export default {
        functional: true,
        props: ['img']
    }

</script>

<style scoped>
    
    .inner-content {
        /* position: relative; */
        min-width: 100px;
        width: 100px;
        height: calc(100%);

        border-radius: 5px;
    }

    .inner-content .book_cover {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        min-width: 100px;
        height: 100%;
        background-color: #eee;
    }


</style>