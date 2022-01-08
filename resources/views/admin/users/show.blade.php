@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="bg-light p-4 rounded">
                <h1>Show user</h1>
                <div class="lead">
                    
                </div>
                
                <div class="container mt-4">
                    <div>
                        Fullname: {{ $user->nama_user }}
                    </div>
                    <div>
                        Email: {{ $user->email }}
                    </div>
                    <div>
                        No HP: {{ $user->no_hp }}
                    </div>
                    <div>
                        Jenis Kelamin: {{ $user->jenis_kelamin }}
                    </div>
                    <div>
                        Kota: {{ $user->kota }}
                    </div>
                    <div>
                        Verify: {{ $user->email_verified_at ? $user->email_verified_at : 'Belum Verifikasi Email'}}
                    </div>
                </div>
        
            </div>
            <div class="mt-4">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
  
@endsection
