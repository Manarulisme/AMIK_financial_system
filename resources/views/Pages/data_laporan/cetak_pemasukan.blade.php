<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table table-bordered table-striped text-center table-striped-columns text-danger" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col" style="width: 40px;">NO.</th>
            <th scope="col" style="width: 200px;">TANGGAL</th>
            <th scope="col" style="width: 300px;">NAMA TRANSAKSI</th>
            <th scope="col" style="width: 300px;">JUMLAH</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
          @forelse ($print_pemasukans as $print_pemasukan)
            <tr>
                <td class="text-center">{{ ++$i; }}</td>
                <td>
             {{ $print_pemasukan->tanggal }}
                </td>
                <td>
             {{ $print_pemasukan->name }}
                </td>
                <td>
             {{ $print_pemasukan->nominal }}
                </td>
            </tr>
          @empty
              <div class="alert alert-danger">
                  Data Kategori belum Tersedia.
              </div>
          @endforelse
    </tbody>
    </table>
</body>
</html>

