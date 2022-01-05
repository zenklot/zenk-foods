@extends('layouts.main')


@section('hero')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft"><span class="fs-1">Welcome Back</span><br>{{ auth()->user()->nama_user }}</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Tempat yang tepat saat perut lapar dan nyaman untuk mengadakan pertemuan pentingmu dengan kolegamu. Setara dengan rumah makan kelas bintang 5 yang memiliki ciri khas masakan sunda dan jawa</p>
                <a href="/dashboard/order" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Pesan Sekarang!</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row mb-3">
                    <div class="col text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Advantage</h5> 
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">                       
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-building text-primary mb-4"></i>
                                <h5>Facility</h5>
                                <p>Tempat nyaman dengan pilihan meja dengan kursi atau untuk bersantai pilih meja dengan lesehan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p>Masakan sekelas rumah makan bintang 5 dengan ciri khas masakan sunda dan jawa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p>Butuh tempat untuk rencana meeting mu ?, atau lagi cari makanan sekarang ?, Pesan sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Zenk Foods</h1>
                        <p class="mb-4">Zenk Food adalah projek revisi dari tugas kerja praktek saya di RM Monggo Mampir, Tasikmalaya. yang sebelumnya bernama Aplikasi Reservasi Tempat dan Makanan di RM Monggo Mampir Berbasis WEB.</p>
                        <p class="mb-4">Adapun revisi yang saya lakukan ini yaitu mengubah framework PHP yang dari sebelumnya menggunakan CodeIgniter V3 dan sekarang menggunakan Laravel 8, yang diharapkan dapat meningkatkan kualitas dan performa dari aplikasi booking meja dan pesan online makanan ini dengan nama baru.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">12</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Place of</p>
                                        <h6 class="text-uppercase mb-0">Big Table</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">25</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Menu of</p>
                                        <h6 class="text-uppercase mb-0">Sunda & Jawa Foods</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="/dashboard/booking">Booking Sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
@endsection