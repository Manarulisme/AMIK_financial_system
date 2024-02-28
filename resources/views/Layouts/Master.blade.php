<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISKEU AMIK - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="Assets/Images/favicon/logoamik.ico">
    <link href="{{ asset('Assets/Bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{ asset('Assets/Bootstrap/js/bootstrap.bundle.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/be49d4b94e.js" crossorigin="anonymous"></script>

        <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('Admin_lte/fontawesome-free/css/all.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Admin_lte/dist/css/adminlte.css') }}">

{{-- data tables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    {{-- image preview --}}

</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('Layouts.Part.Header')

        @include('Layouts.Part.Sidebar')

        <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
        @include('Layouts.Part.content_header')
      <!-- /.content-header -->

            <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
        @yield('konten')
         </div>
        </div>




    </div>
    @include('Layouts.Part.control_sidebar')
    @include('Layouts.Part.Footer')

 <!-- jQuery -->
    <script src="{{ asset('Admin_lte/Plugin/jquery/jquery.min.js') }}"></script>

 <!-- Bootstrap 4 -->
    <script src="{{ asset('Assets/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- AdminLTE App -->
    <script src="{{ asset('Admin_lte/dist/js/adminlte.js') }}"></script>


    <script src="https://kit.fontawesome.com/be49d4b94e.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@stack('notif_berhasil')

@stack('format_rupiah')

@stack('image_viewer')

@stack('script_image')

@stack('ckeditor')


</body>
</html>
