<template>
    <div class="container">
        <div v-for="item in data" class="col-md-4">
            <div class="card appointment-card">
                <span class="appointment-number">Randevu

                    <span class="new-appointment bg-blue" v-if="item.isActive == null || item.isActive == 0">Yeni</span>
                    <span class="new-appointment bg-green" v-if="item.isActive == 1">Onaylı</span>
                    <span class="new-appointment bg-red" v-if="item.isActive == 2">İptal Edilen</span>
                </span>
                <div class="appointment-detail">
                    <span>{{ item.fullName }}</span>
                    <span>{{ item.date }}</span>
                    <span>{{ item.working }}</span>
                </div>
                <div class="appointment-buttons" v-if="!item.isActive">
                    <button class="btn btn-success" @click="appointmentOkey(item.id)">Onayla</button>
                    <button class="btn btn-danger" @click="appointmentCancel(item.id)">İptal Et</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
    created() {
    },
    methods:{
        appointmentOkey:function (id){
            this.$emit('updateOkey',id);
        },
        appointmentCancel:function (id){
            this.$emit('updateCancel',id);
        }
    }
}
</script>

<style></style>
