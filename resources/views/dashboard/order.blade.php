@extends('layouts.main')

@section('hero')
<div class="container-xxl py-5 bg-dark mb-3">
</div>
@endsection

@section('content')


<div class="container-xxl py-5">
   <order-menu :user="{{ auth()->user() }}"></order-menu>
   <vue-progress-bar></vue-progress-bar>
</div>
<!-- Menu End -->
@endsection