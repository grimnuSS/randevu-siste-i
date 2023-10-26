<template>
    <div class="container">
        <div class="row">
            <div v-for="item in items.data" :key="item.id" class="col-md-4">
                <div class="card appointment-card">
                    <span class="appointment-number">Randevu #{{item.id}}</span>
                    <div class="appointment-detail">
                        <span>{{ item.fullName }}</span>
                        <span>{{ item.date }}</span>
                        <span>{{ item.working }}</span>
                    </div>
                </div>
            </div>
        </div>
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
