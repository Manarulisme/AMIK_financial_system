@extends('Layouts.Master')

@section('title')
Dashboard
@endsection

@section('konten')
<div class="card">
    <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary bg-gradient">
                <div class="inner">
                  <h3>Rp.{{ number_format($pemasukan_today->pluck('nominal')->sum(),0,',','.')  }}</h3>

                  <p>Pemasukan Hari ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    <h3>Rp.{{ number_format($pemasukan_current_month->pluck('nominal')->sum(),0,',','.')  }}</h3>

                  <p>Pemasukan Bulan ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box" style="background-color: #3db4d8;">
                <div class="inner">
                    <h3>Rp.{{ number_format($pemasukan_current_year->pluck('nominal')->sum(),0,',','.')  }}</h3>

                  <p>Pemasukan Tahun ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                    <h3>Rp.{{ number_format($pemasukan_semua->pluck('nominal')->sum(),0,',','.')  }}</h3>


                  <p>Seluruh Pemasukan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box" style="background-color: #ffb515;">
                <div class="inner">
                    <h3>Rp.{{ number_format($pengeluaran_today->pluck('nominal')->sum(),0,',','.')  }}</h3>


                  <p>Pengeluaran Hari ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Rp.{{ number_format($pengeluaran_current_month->pluck('nominal')->sum(),0,',','.')  }}</h3>


                  <p>Pengeluaran Bulan ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box" style="background-color: #fccf52;">
                <div class="inner">
                    <h3>Rp.{{ number_format($pengeluaran_current_year->pluck('nominal')->sum(),0,',','.')  }}</h3>


                  <p>Pengeluaran Tahun ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Rp.{{ number_format($pengeluaran_semua->pluck('nominal')->sum(),0,',','.')  }}</h3>


                  <p>Seluruh Pengeluaran</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
    </div>
  </div>

@endsection
