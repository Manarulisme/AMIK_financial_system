@extends('Layouts.Master')



@section('konten')
<style>
    td {
        height: 5px;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded p-3">
                <div class="card-body">
                <h1>
                    @section('title')
                    Data Pengguna : {{ $user->name }}
                    @endsection
                </h1>
<!-- Button trigger modal -->
                <h4>Data Pengguna : {{ $user->name }}</h4>
                <div class="row mb-3">
                    <div class="col-2">
                        <span>Nama Lengkap</span><br>
                        <span>Username</span><br>
                        <span>Role</span><br>
                        <span>Email</span><br>
                    </div>
                    <div class="col-10">
                        <span>: {{ $user->name }}</span><br>
                        <span>: {{ $user->username }}</span><br>
                        <span>: {{ $user->role }}</span><br>
                        <span>: {{ $user->email }}</span><br>



                    </div>
                </div>
                <button class="btn btn-warning">
                    <a class="text-decoration-none text-dark" href="/dashboard/datapengguna/{{ $user->id }}/edit">Update</a>
                </button>
                <button class="btn btn-info">
                    <a class="text-decoration-none text-white" href="{{ route('datapengguna.index') }}">Kembali</a>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



