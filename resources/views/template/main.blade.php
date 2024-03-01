<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-
scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="RPL">
    <title>
        <?= $title ?> | MyApp
    </title>
    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INVENTORY</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            @include('template.nav')
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria- haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>

                                <img class="img-profile rounded-circle" src="template/img/undraw_profile.svg">

                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <button class="dropdown-item" data-toggle="modal" data-target="#akun">
                                    <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>Akun Saya</button>
                                <a class="dropdown-item" href="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('konten')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Yofonislinging 2069</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @yield('modals')

    <div class="modal fade" id="akun" tabindex="-1" role="dialog" aria- labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog modal-dialog-centered modal- dialog-scrollable" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My Account</h5>

                <button class="close" type="button" data-dismiss="modal" aria- label="Close">

                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/akun/save" method="POST"> @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" aria-describedby="nama"
                            name="nama" value="{{ Auth::user()->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input type="text" class="form-control" aria-describedby="username"
                            name="username" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data- dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">

                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="template/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="template/js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('dataAkun'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Data Akun Berhasil di Edit'
        })
    </script>
@endif
    @yield('js')
