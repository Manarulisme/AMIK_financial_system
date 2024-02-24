@extends('Layouts.Master')

@section('title')
Edit Pengguna
@endsection

@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('datapengguna.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pengguna</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama Pengguna">

                            <!-- error message untuk judul -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" placeholder="Masukkan Nama Sub Kategori">

                            <!-- error message untuk judul -->
                            @error('username')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label class="font-weight-bold">Pilih Role</label>
                        <div class="input-group mb-3">
                            <select name="role" id="role" class="form-control">
                                <option selected>--Pilih--</option>
                                <option value="superadmin">Superadmin</option>
                                <option value="admin">Admin</option>
                                <option value="pimpinan">Pimpinan</option>
                              </select>

                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-circle-user"></span>
                            </div>
                          </div>
                          @error('role')
                              <div class="invalid-feedback">
                                {{ ('isi cuy') }}
                              </div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="Email" class="font-weight-bold @error('Email') is-invalid @enderror">Email</label>
                            <input type="text" id="Email" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                            @error('Email')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy emailnya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Password" class="font-weight-bold @error('Password') is-invalid @enderror">Password</label>
                            <input type="text" id="Password" class="form-control" name="password" value="{{ old('password', $user->password) }}">

                            @error('Password')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy passwordnya') }}
                            </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-success">UPDATE</button>
                        <button class="btn btn-md btn-warning">
                            <a href="{{ route('datapengguna.index') }}" class="text-white">KEMBALI</a>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

