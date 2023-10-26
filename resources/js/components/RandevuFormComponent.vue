<template>
    <div class="container">
        <div v-if="completeForm">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <ul class="errors-ul">
                        <li v-for="error in errors" class="errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="name" placeholder="Ad Soyad">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="email" placeholder="E-Posta">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="phone" v-mask="'+90 (###) ### ## ##'" placeholder="Telefon">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <input type="date" @change="selectDate" class="form-control" v-bind:min="this.date" v-model="date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <ul class="select-time-ul">
                        <li v-for="item in workingHours" class="select-time">
                            <input v-if="item.isActive" v-model="workingHour" v-bind:value="item.id" type="radio">
                            <span> {{ item.hours }} </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <textarea class="form-control" v-model="text" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">SMS &nbsp;</label>
                        <input type="radio" value="0" v-model="notification_type">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">E-Posta &nbsp;</label>
                        <input type="radio" value="1" v-model="notification_type">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button v-on:click="store" class="btn btn-success">Randevu Oluştur</button>
                </div>
            </div>
        </div>
        <div v-if="!completeForm">
            <div class="completeForm">
                <i class="fa fa-check-circle"></i>
                <span>Randevunuz Alınmıştır.</span>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            completeForm: true,
            errors: [],
            workingHour: 0,
            notification_type: null,
            name: null,
            email: null,
            phone: null,
            text: null,
            date: new Date().toISOString().slice(0, 10),
            workingHours: []
        }
    },
    mounted() {
        axios.get('http://kurs-sitesi.local:443/public/api/working-hours')
            .then((res) => {
                this.workingHours = res.data;
            })
    },
    methods: {
        store: function () {
            if(this.notification_type && this.name && this.email && this.validEmail(this.email) && this.phone && this.workingHour != 0){
                axios.post('http://kurs-sitesi.local:443/public/api/appointment-store',{
                    fullName: this.name,
                    phone: this.phone,
                    email: this.email,
                    date: this.date,
                    workingHour: this.workingHour,
                    notification_type: this.notification_type
                }).then((res) => {
                    if(res.status == 200){
                        this.completeForm = false;
                    }
                })
            }

            this.errors = [];

            if(!this.notification_type){
                this.errors.push('Lütfen bir bildirim türü seçiniz!');
            }
            if(!this.name){
                this.errors.push('Ad Soyad alanı boş bırakılamaz.');
            }
            if(!this.email || !this.validEmail(this.email)){
                this.errors.push('Lütfen geçerli bir e-posta adresi giriniz.');
            }
            if(!this.phone){
                this.errors.push('Telefon alanı boş bırakılamaz.');
            }
            if(!this.workingHour){
                this.errors.push('Lütfen bir randevu saati seçiniz!');
            }
        },
        selectDate: function () {
            axios.get('http://kurs-sitesi.local:443/public/api/working-hours/${this.date}')
                .then((res) => {
                    console.log(res.data);
                    this.workingHours = res.data;
                })
        },
        validEmail: function (email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
    }
}
</script>

<style></style>
