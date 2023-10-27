<template>
    <div class="container">
        <div v-for="item in data" class="col-md-4">
            <div class="card appointment-card">
                <span class="appointment-number">Randevu
                <span class="new-appointment" v-if="!item.isActive">Yeni</span>
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
            axios.post('http://kurs-sitesi.local:443/public/admin/process',{
                type:1,
                id:id
            }).then((res)=>{
                console.log(res);
            })
        },
        appointmentCancel:function (id){
            axios.post('http://kurs-sitesi.local:443/public/admin/process',{
                type:1,
                id:id
            }).then((res)=>{
                console.log(res);
            })
        }
    }
}
</script>

<style></style>
