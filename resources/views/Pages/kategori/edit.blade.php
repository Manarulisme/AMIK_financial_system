@extends('Layouts.Master')

@section('title')
Edit Kategori
@endsection

@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Kategori</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $kategori->name) }}" placeholder="Masukkan Nama Kategori">

                            <!-- error message untuk judul -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Sub Kategori</label>
                            <input type="text" class="form-control @error('subname') is-invalid @enderror" name="subname" value="{{ old('subname', $kategori->subname) }}" placeholder="Masukkan Nama Sub Kategori">

                            <!-- error message untuk judul -->
                            @error('subname')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-md btn-success">UPDATE</button>
                        <button class="btn btn-md btn-warning">
                            <a href="{{ route('kategori.index') }}" class="text-white">KEMBALI</a>
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

