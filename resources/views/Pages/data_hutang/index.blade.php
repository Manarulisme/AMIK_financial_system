@extends('Layouts.Master')

@push('format_rupiah')
    <script src="{{ asset('Assets/js/format_rupiah.js') }}"></script>
@endpush

{{-- @push('ckeditor')
    <!-- Script -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

           $('.ckeditor').ckeditor();

        });

    </script>
@endpush --}}

@section('konten')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <h1>
                    @section('title')
                    Transaksi Hutang
                    @endsection
                </h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Hutang
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Hutang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('hutang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="font-weight-bold @error('name') is-invalid @enderror">Nama Transaksi</label>
                    <input type="text" id="name" class="form-control" name="name">

                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy namanya') }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kepada" class="font-weight-bold @error('kepada') is-invalid @enderror">Kepada</label>
                    <input type="text" id="kepada" class="form-control" name="kepada">

                    @error('kepada')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy kepada') }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal" class="font-weight-bold @error('tanggal') is-invalid @enderror">Tanggal</label><br>
                    <input type="date" id="tanggal" name="tanggal">
                    @error('tanggal')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy tanggal') }}
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
                    <input type="text" id="tanpa-rupiah" class="form-control" name="nominal">

                    @error('nominal')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy nominalnya') }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan" class="font-weight-bold">Keterangan</label>
                    <textarea name="keterangan" class="ckeditor form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="formFile" class="font-weight-bold">Bukti Pembayaran</label>
                    <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>

                    <table class="table table-bordered table-striped text-center" id="example" style="width: 100%;">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 40px;">NO.</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">NAMA TRANSAKSI</th>
                            <th scope="col">JUMLAH</th>
                            <th scope="col" style="width: 150px;">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($hutangs as $hutang)
                            <tr>
                                <td class="text-center">{{ ++$i; }}</td>
                                <td>
                                    {{ Carbon\Carbon::parse($hutang->tanggal)->translatedFormat('d F Y');  }}
                                </td>
                                <td>
                             {{ $hutang->name }}
                                </td>
                                <td>Rp.
                             {{-- {{ $hutang->nominal }} --}}
                             {{ number_format($hutang->nominal,0,',','.') }}
                                </td>

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('hutang.destroy', $hutang->id) }}" method="POST">
                                        <a href="{{ route('hutang.show', $hutang->id) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('hutang.edit', $hutang->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-gear"></i></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  Data Kategori belum Tersedia.
                              </div>
                          @endforelse
   </tbody>
 </table>

 <h3>
   Total: Rp.{{ number_format($hutangs->pluck('nominal')->sum(),0,',','.')  }}
 </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


@push('notif_berhasil')

<script>
//message with toastr
@if(session()->has('success'))

    toastr.success('{{ session('success') }}', 'BERHASIL!');

@elseif(session()->has('error'))

    toastr.error('{{ session('error') }}', 'GAGAL!');

@endif
</script>

@endpush
    <script>

    </script>





@endsection



