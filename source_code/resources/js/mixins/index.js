import { mapMutations, mapGetters } from 'vuex';

export default {
    computed: {
        ...mapGetters(['base_url']),
    },
    methods: {
        ...mapMutations(['setSection']),

        fetchData(id) {
            // console.log("Doing request");
            var url = "/api/sections/" + id;
            axios.get(url).then(
                response => {
                    console.log(response.data);
                    this.setSection(response.data);
                });
        },

        routingBetween(path, id) {
            if (id === undefined || id === -1) return;
            this.$router.push({
                name: path,
                query: {
                    id: id,
                },
            });
        },

        isValid(a) {
            if (!a) return false;
            if (a === undefined) return false;
            if (a === null) return false;
            if (a.length === 0) return false;
            return true;
        },

        isEmpty(a) {
            if (!a) return false;
            if (a === undefined) return false;
            if (a === null) return false;
            if (a.length === 0) return true;
            return false;
        },

    }
};