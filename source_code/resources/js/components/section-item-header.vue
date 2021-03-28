<template >
    <div class="row">
        <div class="col-12">

            <p class="pl-2 component-title"> 
                {{title}} 
            </p>

            <more-details
                v-if="path" 
                :id="id"
                :path="path"
            />
        </div>
    </div>
</template>

<script>
    import MoreDetails from '../components/more-details';

    export default {
        data(){
            return {
            };
        },
        
        props: {
            title : {
                type: String,
                required: true,
                default: 'Loading'
            }, 
            id : {
                type: Number,
                required: true,
            },  
            path : {
                type: String,
                default: null,
            }, 
        },

        methods: {
            openSection(id) {
                if(id === undefined) return;
                console.log( this.path );
                this.$router.push({
                    name: this.path,
                    query: {
                        section_id: id,
                    }
                });
            },
            
        },

        components: {
            MoreDetails
        }
    }
</script>

<style scoped>

    .author_block {
        
        margin-bottom: -5px;

        display: flex;
        align-items: center;

        min-width: 128px;
        max-width: 256px;
        height: 64px;
    }

    .author_block .author_block_avatar {
        height: 64px;
        width: 64px;
        border-radius: 50%;
        margin-right: 10px;
    
        box-shadow: 0px 3px 6px #00000029;
    }

    .author_block .author_block_titles_name {
        font-size: 16px;
        font-weight: 800;
        text-transform: capitalize;
        margin-bottom: 5px;;
    }

    
    .author_block .author_block_titles_job {
        font-size: 12px;
        font-weight: 700;
        text-transform: capitalize;
    }

</style>