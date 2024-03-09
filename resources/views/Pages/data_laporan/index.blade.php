@extends('Layouts.Master')



@section('konten')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <h1>
                    @section('title')
                    Laporan Keuangan
                    @endsection
                </h1>
<!-- Button trigger modal -->
<h3>Cetak Pemasukan</h3>
<div class="form-group">
    <label for="tanggal" class="font-weight-bold">Tanggal Awal</label><br>
    <input type="date" id="tanggalAwal" name="tanggalAwal" class="form-control mb-2">
    <label for="tanggal" class="font-weight-bold">Tanggal Akhir</label><br>
    <input type="date" id="tanggalAkhir" name="tanggalakhir" class="form-control mb-2">
    <button class="btn btn-info"><i class="fa-solid fa-print"></i><a href="" onclick="this.href='cetak_pemasukan/'+document.getElementById('tanggalAwal').value+'/'+ document.getElementById(tanggalakhir).value" target="_blank" class="text-white text-decoration-none ml-2">Cetak</a></button>
</div>



<h3>Cetak Pengeluaran</h3>
<button class="btn btn-info mb-3"><i class="fa-solid fa-print"></i> Cetak</button>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@stack('notif_berhasil')
