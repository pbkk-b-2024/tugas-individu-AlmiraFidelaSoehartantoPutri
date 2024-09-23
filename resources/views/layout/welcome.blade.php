<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PBKK (B)</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PBKK (B)</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Almira Fidela Soehartanto Putri</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pertemuan 1</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tugas:</h6>
                        <a class="collapse-item" href="{{ route('genap-ganjil') }}">GenapGanjil</a>
                        <a class="collapse-item" href="{{ route('fibonacci') }}">Fibonacci</a>
                        <a class="collapse-item" href="{{ route('bilangan-prima') }}">Prima</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePertemuan2"
                    aria-expanded="true" aria-controls="collapsePertemuan2">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pertemuan 2</span>
                </a>
                <div id="collapsePertemuan2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tugas:</h6>
                        <a class="collapse-item" href="{{ route('/') }}">Universitas</a>
                        <a class="collapse-item" href="{{ route('/') }}">Fakultas</a>
                        <a class="collapse-item" href="{{ route('/') }}">ProgramStudi</a>
                        <a class="collapse-item" href="{{ route('/') }}">Mahasiswa</a>
                        <a class="collapse-item" href="{{ route('/') }}">Dosen</a>
                        <a class="collapse-item" href="{{ route('/') }}">Tendik</a>
                        <a class="collapse-item" href="{{ route('/') }}">Publikasi</a>
                        <a class="collapse-item" href="{{ route('/') }}">Mata Kuliah</a>
                        <a class="collapse-item" href="{{ route('/') }}">Akreditasi</a>
                        <a class="collapse-item" href="{{ route('/') }}">Kurikulum</a>
                    </div>
                </div>
            </li>
        </ul>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/chart-area-demo.js"></script>
    <script src="/assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>