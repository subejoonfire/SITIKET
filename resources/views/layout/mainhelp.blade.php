<!DOCTYPE html>
<html lang="en">

<head>
    @vite([])
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title ?? 'SI-TIKET' }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" type="image/jpeg" href="{{ asset('JG.png') }}">

    <!-- Fonts and icons -->
    <script src="{{ url('back-end/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            }
            , custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"]
                , "urls": ["{{ url('back-end/assets/css/fonts.css') }}"]
            }
            , active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('back-end/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('back-end/assets/css/azzara.min.css') }}">
    <link rel="stylesheet" href="{{ url('back-end/assets/css/demo.css') }}">
    <style>
        .main-header {
            background-color: #70c55b !important;
        }

        .btn-custom {
            background-color: #70c55b;
            color: white;
            border-radius: 25px;
        }

    </style>


    <style>
        .text-danger {
            color: red;
        }

        /* #keluhan, */
        #email,
        #username,
        #phone,
        #subjek,
        #kategori,
        #company,
        #department,
        #kode_perusahaan,
        #tanggal_diajukan {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 1px solid #D1D1D1 !important;
            padding: 8px;
            font-weight: normal !important;
            pointer-events: none;
        }

        textarea#keluhan {
            max-height: 300px;
            overflow-y: auto;
            resize: none;
            /* Nonaktifkan resize manual */
            background-color: #ffffff !important;
            /* Pastikan latar belakang putih */
            color: #000000 !important;
            /* Pastikan warna teks gelap */
            cursor: text;
            /* Tetap tampilkan kursor teks */
            border: 2px solid #000000;
            /* Border standar */
            font-family: inherit;
            /* Selaraskan font */
            font-size: inherit;
            /* Selaraskan ukuran font */
            padding: 8px;
            /* Tambahkan padding untuk kenyamanan */
        }

        #idmodule {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 2px solid #4CAF50 !important;
            padding: 8px;
            cursor: pointer;
        }

        #iduser_pic {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 2px solid #4CAF50 !important;
            padding: 8px;
            cursor: pointer;
        }


        #iduser_pic:focus {
            border-color: #70c55b !important;
            box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
        }

        .iduser_pic {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 2px solid #4CAF50 !important;
            padding: 8px;
            cursor: pointer;
        }

        .iduser_pic:focus {
            border-color: #70c55b !important;
            box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
        }

        #priority {
            background-color: #ffffff !important;
            color: #000000 !important;
            border: 2px solid #4CAF50 !important;
            padding: 8px;
            cursor: pointer;
        }

        #priority:focus {
            border-color: #70c55b !important;
            box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
        }

        #idmodule:focus {
            border-color: #70c55b !important;
            box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
        }

        #subjek {
            background-color: #ffffff !important;
            color: #000000 !important;
            padding: 8px;
            cursor: pointer
        }

        #kategori {
            background-color: #ffffff !important;
            color: #000000 !important;
            padding: 8px;
            cursor: pointer
        }

        .no-cursor {
            pointer-events: none;
            caret-color: transparent;
            background-color: #f5f5f5;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main Header -->
        <div class="main-header" data-background-color>
            <!-- Logo Header -->
            <div class="logo-header">
                <a href="/" class="logo">
                    <span class="navbar-brand" style="color: white;">SI-TIKET</span>
                </a>

                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>{{ auth()->user()->name }}</h4>
                                            <p class="text-muted">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        @include('partial/sidebar/helpdesk')

        @yield('content')

    </div>

    <!-- JS Files -->
    <script src="{{ url('back-end/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ url('back-end/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('back-end/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ url('back-end/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ url('back-end/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url('back-end/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ url('back-end/assets/js/plugin/moment/moment.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ url('back-end/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ url('back-end/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ url('back-end/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ url('back-end/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ url('back-end/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ url('back-end/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ url('back-end/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('back-end/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ url('back-end/assets/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('back-end/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Azzara JS -->
    <script src="{{ url('back-end/assets/js/ready.min.js') }}"></script>

    <!-- Azzara DEMO methods -->
    <script src="{{ url('back-end/assets/js/setting-demo.js') }}"></script>
    <script src="{{ url('back-end/assets/js/demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});
            $('#multi-filter-select').DataTable({
                "pageLength": 5
                , initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>');
                        });
                    });
                }
            });

            $('#add-row').DataTable({
                "pageLength": 5
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(), $("#addPosition").val(), $("#addOffice").val(), action
                ]);
                $('#addRowModal').modal('hide');
            });
        });

    </script>
</body>

</html>
