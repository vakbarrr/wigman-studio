<?php
$data = [
    'konfigurasi' => $this->konfigurasi->list()
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= $title ?></title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?= base_url() ?>/img/konfigurasi/icon/Neutral-512.png">

    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/select2/dist/css/select2-bootstrap4.min.css" />
    <link href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/" class="logo">
                    <span class="logo-light">
                        <i class="mdi mdi-death-star-variant"></i> Wigman</span>
                    <span class="logo-sm">
                        <i class="mdi mdi-death-star-variant"></i>
                    </span>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">

                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url() ?>assets/images/users/user-2.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="javascript:void(0);"> admin </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" id="logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Dashboard</li>
                        <li>
                            <a href="<?= base_url() ?>/auth/dashboard" class="waves-effect">
                                <i class="icon-accelerator"></i> <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title">Master Data</li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-group"></i> <span>Blog <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url() ?>admin/category">Category</a></li>
                                <li><a href="<?= base_url() ?>admin/blog">Blog</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">SETTINGS</li>
                        <li>
                            <a href="<?= base_url() ?>admin/konfigurasi/user" class="waves-effect">
                                <i class="mdi mdi-account-switch"></i> <span> Konfigurasi User </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/konfigurasi/web" class="waves-effect">
                                <i class="mdi mdi-settings-outline"></i> <span> Konfigurasi Web </span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $contents; ?>
                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->


            <footer class="footer">
                © 2021 <span class="d-none d-sm-inline-block"> Crafted with <i class="mdi mdi-heart text-danger"></i> - <a href="http://github.com/vakbarrr">Wigman</a></span>
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    <!-- Sweet-Alert  -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- jQuery  -->

    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/metismenu.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <!-- Required datatable js -->
    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!--Summernote js-->
    <script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Datatable init js -->
    <script src="<?= base_url() ?>/assets/pages/datatables.init.js"></script>
    <script>
        const user_id = '1'
        const base_url = '<?= base_url() ?>'
        const date = '2021-11-03'
    </script>
    <script>
        $('a#logout').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url() ?>admin/auth/logout",
                        type: 'post',
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Anda berhasil logout!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1250
                            }).then(function() {
                                window.location = '<?= base_url() ?>admin/auth';
                            });
                        }
                    });
                }
            })
        })
    </script>
</body>

</html>