<template>
    <div class="container">
        <appointment-item :data="items.data"></appointment-item>
        <div class="row mt-3">
            <div class="col-md-12">
                <pagination :data="items" @pagination-change-page="getData"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: {
                    data: []
                }
            }
        },
        created() {
            this.getData();
        },
        mounted() {

        },
        methods: {
            getData(page){
                if(typeof page === 'undefined'){
                    page = 1;
                }
                axios.get(`http://kurs-sitesi.local:443/public/api/admin/list/?page=${page}`)
                    .then((res) => {
                        this.items = res.data;
                    })
            }
        }
    }
</script>

<style></style>
