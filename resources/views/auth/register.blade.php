@extends('layouts.main')
@section('hero')
<div class="container-xxl py-5 bg-dark">
</div>
@endsection
@section('content')

<section class="bg-dark w-100 p-5 bg-gambar">
   <div class="container">
   
    @include('layouts.templates.messages')

       <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
           <h5 class="section-title ff-secondary text-center text-primary fw-normal">Register</h5>
           <h1 class="mb-5 text-white">Register New User</h1>
       </div>
       <div class="row justify-content-center">
           <div class="col-lg-6 col-md-8">


            <form action="{{ route('register.perform') }}" method="POST">
                @csrf                
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-person-plus-fill text-white"></i></span>

                    <input type="text" class="form-control @error('nama_user') is-invalid @enderror" placeholder="Nama Lengkap" name="nama_user" id="nama_user" value="{{ old('nama_user') }}">
                    @error('nama_user')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"  value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" >
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" placeholder="Confirm Password" name="password_confirm" >
                    @error('password_confirm')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="fas fa-phone-square-alt text-white"></i></span>
                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No HP" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                <span class="input-group-text bg-primary"><i
                        class="fas fa-venus-mars text-white"></i></span>
                        <div class="form-control">
                            <div class="form-check">
                                <div class="row">
                                    <div class="col">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L">
                                <label class="form-check-label" for="laki-laki">
                                    Laki-Laki
                                </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                                        <label class="form-check-label" for="perempuan">
                                          Perempuan
                                        </label>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="fas fa-map-marker-alt text-white"></i></span>
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" placeholder="Kota/Kabupaten Tinggal Sekarang" name="kota" value="{{ old('kota') }}">
                    @error('kota')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="d-grid col-12 mx-auto">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
                <p class="text-center mt-3 text-white">Already have an account?
                    <a href="{{ route('login.index') }}" class="text-primary">Login</a>
                </p>
            </form>


           </div>
       </div>
   </div>
    
</section>
    
</div>
@endsection