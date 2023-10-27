@extends('layouts.app')
@section('content')
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
                <appointment-today></appointment-today>
            </div>
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <appointment-today></appointment-today>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <appointment-list></appointment-list>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <appointment-last></appointment-last>
            </div>
            <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                <appointment-cancel></appointment-cancel>
            </div>
        </div>
    </div>
@endsection
