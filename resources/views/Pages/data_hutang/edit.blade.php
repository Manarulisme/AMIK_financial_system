@extends('Layouts.Master')

@section('title')
Edit Hutang
@endsection

@push('ckeditor')
    <!-- Script -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

           $('.ckeditor').ckeditor();

        });

    </script>
@endpush


@push('format_rupiah')
    <script src="{{ asset('Assets/js/format_rupiah.js') }}"></script>
@endpush

@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('hutang.update', $hutang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="font-weight-bold @error('name') is-invalid @enderror">Nama Transaksi</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('nama transaksi',$hutang->name) }}">

                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy namanya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kepada" class="font-weight-bold @error('kepada') is-invalid @enderror">Kepada</label>
                            <input type="text" id="kepada" class="form-control" name="kepada" value="{{ old('kepada transaksi',$hutang->kepada) }}">

                            @error('kepada')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy namanya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal" class="font-weight-bold @error('tanggal') is-invalid @enderror">Tanggal</label><br>
                            <input type="date" id="tanggal" name="tanggal">
                            @error('tanggal')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy namanya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option selected>Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                @endforeach
                              </select>

                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-circle-user"></span>
                            </div>
                          </div>
                          @error('role')
                              <div class="invalid-feedback">
                                {{ ('isi cuy kategorinya') }}
                              </div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="nominal" class="font-weight-bold @error('nominal') is-invalid @enderror">Nominal Transaksi</label>
                            <input type="text" id="tanpa-rupiah" class="form-control" name="nominal" value="{{ old('nominal', $hutang->nominal) }}">

                            @error('nominal')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy nominalnya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea name="keterangan" class="ckeditor form-control" >

                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="font-weight-bold">Bukti Pembayaran</label>
                            <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                        </div>
                        <button type="submit" class="btn btn-md btn-success">UPDATE</button>
                        <button class="btn btn-md btn-warning">
                            <a href="{{ route('hutang.index') }}" class="text-white">KEMBALI</a>
                        </button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

