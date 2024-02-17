@extends('Layouts.Master')



@section('konten')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <h1>
                    @section('title')
                    Kategori
                    @endsection
                </h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Kategori
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="font-weight-bold @error('name') is-invalid @enderror">Nama Kategori</label>
                    <input type="text" id="name" class="form-control" name="name">

                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy judulnya') }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subname" class="font-weight-bold @error('subname') is-invalid @enderror">Nama Sub Kategori</label>
                    <input type="text" id="subname" class="form-control" name="subname">

                    @error('subname')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy judulnya') }}
                    </div>
                    @enderror
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
                            <th scope="col">NAMA KATEGORI</th>
                            <th scope="col">NAMA SUB KATEGORI</th>
                            <th scope="col" style="width: 150px;">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($kategoris as $kategori)
                            <tr>
                                <td class="text-center">{{ ++$i; }}</td>
                                <td>
                             {{ $kategori->name }}
                                </td>
                                <td>
                             {{ $kategori->subname }}
                                </td>

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-gear"></i></a>

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

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>





@endsection



