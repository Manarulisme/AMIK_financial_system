@extends('Layouts.Master')

@push('image_viewer')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Zoom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Assets/css/zoom.css') }}">

<!-- Zoom Js -->
<script src="{{ asset('Assets/js/zoom.js') }}"></script>

@endpush

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
                    Data Pemasukan
                    @endsection
                </h1>
<!-- Button trigger modal -->
                <h4>Tanggal :
                    {{ Carbon\Carbon::parse($pemasukan->tanggal)->translatedFormat('d F Y');  }}</h4>
                <div class="row mb-3">
                    <div class="col-2">
                        <span>Keperluan</span><br>
                        <span>Nominal</span><br>
                        <span>Keterangan</span><br>
                        <span>Bukti Pembayaran</span><br>
                    </div>
                    <div class="col-10">
                        <span>: {{ $pemasukan->name }}</span><br>
                        <span>: Rp.{{ number_format($pemasukan->nominal,0,',','.') }}</span><br>
                        <span>: {!! $pemasukan->keterangan !!}</span><br>
                        <span>:
                            <img src="{{ asset('storage/bukti_pembayaran/'.$pemasukan->bukti_pembayaran ) }}" class="w-50 rounded" id="bukti_pembayaran" data-action="zoom">

                        </span><br>



                    </div>
                </div>
                {{-- <button class="btn btn-warning">
                    <a class="text-decoration-none text-dark" href="/dashboard/datapengguna/{{ $pemasukan->id }}/edit">Update</a>
                </button> --}}
                <button class="btn btn-info">
                    <a class="text-decoration-none text-white" href="{{ route('pemasukan.index') }}">Kembali</a>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



