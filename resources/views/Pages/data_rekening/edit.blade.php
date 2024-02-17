@extends('Layouts.Master')

@section('title')
Edit Rekening
@endsection

@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('rekeningbank.update', $rekening->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_pemilik" class="font-weight-bold @error('nama_pemilik') is-invalid @enderror">Nama Pemilik</label>
                            <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik" value="{{ old('name', $rekening->nama_pemilik) }}">

                            @error('nama_pemilik')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy nama pemiliknya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="kode_bank" class="font-weight-bold @error('kode_bank') is-invalid @enderror">Kode Bank</label>
                                    <input type="text" id="kode_bank" class="form-control" name="kode_bank" value="{{ old('kode_bank', $rekening->kode_bank) }}">

                                    @error('kode_bank')
                                    <div class="alert alert-danger mt-2">
                                        {{ ('isi cuy kode banknya') }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="nama_bank" class="font-weight-bold @error('nama_bank') is-invalid @enderror">Nama Bank</label>
                                    <input type="text" id="nama_bank" class="form-control" name="nama_bank" value="{{ old('nama_bank', $rekening->nama_bank) }}">

                                    @error('nama_bank')
                                    <div class="alert alert-danger mt-2">
                                        {{ ('isi cuy nama banknya') }}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="no_rek" class="font-weight-bold @error('no_rek') is-invalid @enderror">No. Rekening</label>
                            <input type="text" id="no_rek" class="form-control" name="no_rek" value="{{ old('no_rek', $rekening->no_rek) }}">

                            @error('no_rek')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy no reknya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kcp" class="font-weight-bold @error('kcp') is-invalid @enderror">Kantor Pembantu Cabang (KCP)</label>
                            <input type="text" id="kcp" class="form-control" name="kcp" value="{{ old('kcp', $rekening->kcp) }}">

                            @error('kcp')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy kcp nya') }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="font-weight-bold @error('alamat') is-invalid @enderror">Alamat Pemilik</label>
                            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $rekening->alamat) }}</textarea>

                            @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ ('isi cuy alamatnya') }}
                            </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label class="font-weight-bold">Gambar Sampul</label>
                            <input type="file" class="form-control @error('foto_rek') is-invalid @enderror" name="foto_rek">

                            <!-- error message untuk title -->
                            @error('foto_rek')
                                <div class="alert alert-danger mt-2">
                                    {{ ('isi cuy foto sampulnya') }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

