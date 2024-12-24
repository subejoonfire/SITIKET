<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title ?? 'SI-TIKET' }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" type="image/jpeg" href="{{ asset('JG.png') }}">

    <!-- Fonts and icons -->
    <script src="{{ asset('back-end/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            }
            , custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"]
                , "urls": ["{{ asset('back-end/assets/css/fonts.css') }}"]
            }
            , active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('back-end/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/assets/css/azzara.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/assets/css/pic.css') }}">
    <style>
        .main-header {
            background-color: #70c55b !important;
        }

        .btn-custom {
            background-color: #70c55b;
            color: white;
            border-radius: 25px;
        }

        .text-danger {
            color: red;
        }

        .no-cursor {
            pointer-events: none;
            caret-color: transparent;
            background-color: #f5f5f5;
        }

        .dropdown-menu {
            display: none;
            /* Hide dropdown by default */
            opacity: 0;
            /* Start with opacity 0 */
            transition: opacity 0.3s ease;
            /* Smooth transition */
        }

        .nav-item:hover .dropdown-menu {
            display: block;
            /* Show dropdown on hover */
            opacity: 1;
            /* Fade in */
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Main Header -->
        <div class="main-header" data-background-color>
            <!-- Logo Header -->
            <div class="logo-header">
                <a href="{{ url('/') }}" class="logo">
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
                    <div class="collapse" id="search-nav"></div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="{{ asset('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>{{ auth()->user()->name }}</h4>
                                            <p class="text-muted">{{ auth()->user()->email}}</p>
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

        @include('partial.sidebar.admin')

        @yield('content')

    </div>

    <!-- JS Files -->
    <script src="{{ asset('back-end/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('back-end/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('back-end/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ asset('back-end/assets/js/plugin/moment/moment.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('back-end/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('back-end/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('back-end/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('back-end/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('back-end/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ asset('back-end/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('back-end/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('back-end/assets/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('back-end/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Azzara JS -->
    <script src="{{ asset('back-end/assets/js/ready.min.js') }}"></script>

    <!-- Azzara DEMO methods -->
    <script src="{{ asset('back-end/assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});
            $('#multi-filter-select').DataTable({
                "pageLength": 5
                , initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    });
                }
            });

            $('#add-row').DataTable({
                "pageLength": 5
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val()
                    , $("#addPosition").val()
                    , $("#addOffice").val()
                    , action
                ]);
                $('#addRowModal').modal('hide');
            });
        });

        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('mouseenter', () => {
                const dropdown = item.querySelector('.dropdown-menu');
                if (dropdown) {
                    dropdown.style.display = 'block';
                    setTimeout(() => {
                        dropdown.style.opacity = '1';
                    }, 10); // Allow time for display to take effect
                }
            });

            item.addEventListener('mouseleave', () => {
                const dropdown = item.querySelector('.dropdown-menu');
                if (dropdown) {
                    dropdown.style.opacity = '0';
                    setTimeout(() => {
                        dropdown.style.display = 'none';
                    }, 300); // Match the transition duration
                }
            });
        });

    </script>
</body>
</html>
