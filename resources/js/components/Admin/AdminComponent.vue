<template>
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="waiting-tab" data-bs-toggle="tab" data-bs-target="#waiting" type="button" role="tab" aria-controls="waiting" aria-selected="true">Onay Bekleyen Randevuları</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Günün Randevuları</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Gelecek Randevular</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Geçmiş Randevular</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="false">İptal Edilen Randevular</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="waiting-tab">
                <appointment-item @updateOkey="updateOkey" @updateCancel="updateCancel" :data="waiting.data"></appointment-item>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <pagination :data="waiting" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <appointment-item @updateOkey="updateOkey" @updateCancel="updateCancel" :data="today.data"></appointment-item>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <pagination :data="today" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <appointment-item @updateOkey="updateOkey" @updateCancel="updateCancel" :data="list.data"></appointment-item>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <pagination :data="list" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <appointment-item @updateOkey="updateOkey" @updateCancel="updateCancel" :data="last.data"></appointment-item>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <pagination :data="last" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                <appointment-item @updateOkey="updateOkey" @updateCancel="updateCancel" :data="cancel.data"></appointment-item>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <pagination :data="cancel" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                waiting: {
                    data: []
                },
                list: {
                    data: []
                },
                today: {
                    data: []
                },
                last: {
                    data: []
                },
                cancel: {
                    data: []
                }
            }
        },
        created() {
            this.getData();
        },
        methods: {
            updateOkey(id){
                axios.post('http://kurs-sitesi.local:443/public/api/admin/process',{
                    type:1,
                    id:id
                }).then((res)=>{
                    this.getData();
                })
            },
            updateCancel(id){
                axios.post('http://kurs-sitesi.local:443/public/api/admin/process',{
                    type:2,
                    id:id
                }).then((res)=>{
                    this.getData();
                })
            },
            getData(page){
                if(typeof page === 'undefined'){
                    page = 1;
                }
                axios.get(`http://kurs-sitesi.local:443/public/api/admin/all/?page=${page}`)
                    .then((res) => {
                        this.waiting = res.data.waiting;
                        this.list = res.data.list;
                        this.today = res.data.today;
                        this.last = res.data.last;
                        this.cancel = res.data.cancel;
                    })
            }
        }
    }
</script>
