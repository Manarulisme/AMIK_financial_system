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
                    Rekening Bank {{ $rekening->nama_pemilik }}
                    @endsection
                </h1>
<!-- Button trigger modal -->
                <h4>Rekening Bank {{ $rekening->nama_pemilik }}</h4>
                <img src="{{ asset('/storage/fotoRekening/'. $rekening->foto_rek) }}" alt="" width="300px;" height="auto">
                <div class="row mb-3">
                    <div class="col-2">
                        <span>Kode Bank</span><br>
                        <span>Nama Bank</span><br>
                        <span>KCP</span><br>
                        <span>Nama Pemilik</span><br>
                        <span>No. Rekening</span><br>
                        <span>Alamat</span><br>
                    </div>
                    <div class="col-10">
                        <span>: {{ $rekening->kode_bank }}</span><br>
                        <span>: {{ $rekening->nama_bank }}</span><br>
                        <span>: {{ $rekening->kcp }}</span><br>
                        <span>: {{ $rekening->nama_pemilik }}</span><br>
                        <span>: {{ $rekening->no_rek }}</span><br>
                        <span>: {{ $rekening->alamat }}</span><br>


                    </div>
                </div>
                <button class="btn btn-info">
                    <a class="text-decoration-none text-white" href="{{ route('rekeningbank.index') }}">Kembali</a>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



