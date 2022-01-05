@extends('layouts.main')

@section('hero')
<div class="container-xxl py-5 bg-dark mb-3"></div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
          
          @include('layouts.templates.messages')

            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                <form action="{{ route('login.perform') }}" method="POST">
                    @csrf
                    

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}" />
                        <label for="email">Email address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            required />
                        <label for="password">Password</label>
                    </div>

                    <div class="form-group mb-3">
                      <label for="remember">Remember me</label>
                      <input type="checkbox" name="remember" value="1">
                  </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
                        Login
                    </button>
                </form>


                <small class="d-block text-center mt-3">Not Registered?
                    <a href="{{ route('register.index') }}">Register Now!</a></small>
            </main>
        </div>
    </div>
</div>
@endsection
