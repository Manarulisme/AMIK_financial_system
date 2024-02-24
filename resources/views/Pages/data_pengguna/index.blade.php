@extends('Layouts.Master')



@section('konten')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <h1>
                    @section('title')
                    Data Pengguna
                    @endsection
                </h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModalUser">
    Tambah Pengguna
  </button>


  <!-- Modal -->
  <div class="modal fade" id="addModalUser" tabindex="-1" aria-labelledby="addModalUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModalUserLabel">Tambah Pengguna</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('datapengguna.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="font-weight-bold @error('name') is-invalid @enderror">Nama Lengkap</label>
                    <input type="text" id="name" class="form-control" name="name">

                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy nama lengkap') }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username" class="font-weight-bold @error('username') is-invalid @enderror">Username</label>
                    <input type="text" id="username" class="form-control" name="username">

                    @error('username')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy username') }}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <select name="role" id="role" class="form-control">
                        <option selected>Pilih Role</option>
                        <option value="superadmin">Superadmin</option>
                        <option value="admin">Admin</option>
                        <option value="pimpinan">Pimpinan</option>
                      </select>

                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-circle-user"></span>
                    </div>
                  </div>
                  @error('role')
                      <div class="invalid-feedback">
                        {{ ('isi cuy') }}
                      </div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="Email" class="font-weight-bold @error('Email') is-invalid @enderror">Email</label>
                    <input type="text" id="Email" class="form-control" name="email">

                    @error('Email')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy emailnya') }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Password" class="font-weight-bold @error('Password') is-invalid @enderror">Password</label>
                    <input type="text" id="Password" class="form-control" name="password">

                    @error('Password')
                    <div class="alert alert-danger mt-2">
                        {{ ('isi cuy passwordnya') }}
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
                            <th scope="col" style="width: 200px;">USERNAME</th>
                            <th scope="col" style="width: 300px;">NAMA</th>
                            <th scope="col" style="width: 300px;">ROLE</th>
                            <th scope="col" style="width: 150px;">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ ++$i; }}</td>
                                <td>
                             {{ $user->username }}
                                </td>
                                <td>
                             {{ $user->name }}
                                </td>
                                <td>
                             {{ $user->role }}
                                </td>

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datapengguna.destroy', $user->id) }}" method="POST">
                                        <a href="{{ route('datapengguna.show', $user->id) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('datapengguna.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-gear"></i></a>

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

@endsection


@stack('notif_berhasil')
