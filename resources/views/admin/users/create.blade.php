@extends('layouts.admin')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new user</h1>
        <div class="lead">
            Add new user and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Fullname</label>
                    <input value="{{ old('nama_user') }}" 
                        type="text" 
                        class="form-control @error('nama_user') is-invalid @enderror" 
                        name="nama_user" 
                        placeholder="Fullname" required >

                    @error('nama_user')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        placeholder="Email address" required>
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input value="{{ old('no_hp') }}"
                        type="text" 
                        class="form-control @error('no_hp') is-invalid @enderror" 
                        name="no_hp" 
                        placeholder="NO HP" required>
                        @error('no_hp')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">No HP</label>
                    <input value="{{ old('kota') }}"
                        type="text" 
                        class="form-control @error('kota') is-invalid @enderror" 
                        name="kota" 
                        placeholder="Kota" required>
                        @error('kota')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
