@extends('Layouts.Master')



@section('konten')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <h1>
                    @section('title')
                    Rekening Bank
                    @endsection
                </h1>
<!-- Button trigger modal -->
        <button class="btn btn-success mb-3"><a href="{{ route('rekeningbank.create') }}" class="text-white text-decoration-none">Tambah Rekening</a></button>


                    <table class="table table-bordered table-striped text-center" id="example" style="width: 100%;">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 40px;">NO.</th>
                            <th scope="col" style="width: 200px;">NAMA BANK</th>
                            <th scope="col" style="width: 300px;">NO. REKENING</th>
                            <th scope="col" style="width: 300px;">NAMA PEMILIKI</th>
                            <th scope="col" style="width: 150px;">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($rekenings as $rekening)
                            <tr>
                                <td class="text-center">{{ ++$i; }}</td>
                                <td>
                             {{ $rekening->nama_bank }}
                                </td>
                                <td>
                             {{ $rekening->no_rek }}
                                </td>
                                <td>
                             {{ $rekening->nama_pemilik }}
                                </td>

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('rekeningbank.destroy', $rekening->id) }}" method="POST">
                                        <a href="{{ route('rekeningbank.show', $rekening->id) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('rekeningbank.edit', $rekening->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-gear"></i></a>

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



