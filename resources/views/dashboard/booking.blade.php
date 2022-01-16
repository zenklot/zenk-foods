@extends('layouts.main')

@section('hero')
@endsection

@section('content')
<section class="bg-dark d-flex align-items-center bg-gambar ">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="p-5 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                    <h1 class="text-white mb-4">Book A Table Online</h1>
                    <h4 class="mt-4 text-white">Hallo welcome to ZenkFood...</h4>
                    <h5 class="text-white">To book a table plase fill the form</h5>
                    <h4 class="text-white mt-5 mb-1">Select Date & Time</h4>
                    <book-table user_email="{{ auth()->user()->email }}"></book-table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
