<!DOCTYPE html>
<html lang="en">
<head>
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

        /* dibawah ini udah buat pesan buanyakk */

        <style type="text/css">body {
            background: #eee
        }

        .email-app {
            display: flex;
            flex-direction: row;
            background: #fff;
            border: 1px solid #e1e6ef;
        }

        .email-app nav {
            flex: 0 0 200px;
            padding: 1rem;
            border-right: 1px solid #e1e6ef;
        }

        .email-app nav .btn-block {
            margin-bottom: 15px;
        }

        .email-app nav .nav {
            flex-direction: column;
        }

        .email-app nav .nav .nav-item {
            position: relative;
        }

        .email-app nav .nav .nav-item .nav-link,
        .email-app nav .nav .nav-item .navbar .dropdown-toggle,
        .navbar .email-app nav .nav .nav-item .dropdown-toggle {
            color: #151b1e;
            border-bottom: 1px solid #e1e6ef;
        }

        .email-app nav .nav .nav-item .nav-link i,
        .email-app nav .nav .nav-item .navbar .dropdown-toggle i,
        .navbar .email-app nav .nav .nav-item .dropdown-toggle i {
            width: 20px;
            margin: 0 10px 0 0;
            font-size: 14px;
            text-align: center;
        }

        .email-app nav .nav .nav-item .nav-link .badge,
        .email-app nav .nav .nav-item .navbar .dropdown-toggle .badge,
        .navbar .email-app nav .nav .nav-item .dropdown-toggle .badge {
            float: right;
            margin-top: 4px;
            margin-left: 10px;
        }

        .email-app main {
            min-width: 0;
            flex: 1;
            padding: 1rem;
        }

        .email-app .inbox .toolbar {
            padding-bottom: 1rem;
            border-bottom: 1px solid #e1e6ef;
        }

        .email-app .inbox .messages {
            padding: 0;
            list-style: none;
        }

        .email-app .inbox .message {
            position: relative;
            padding: 1rem 1rem 1rem 2rem;
            cursor: pointer;
            border-bottom: 1px solid #e1e6ef;
        }

        .email-app .inbox .message:hover {
            background: #f9f9fa;
        }

        .email-app .inbox .message .actions {
            position: absolute;
            left: 0;
            display: flex;
            flex-direction: column;
        }

        .email-app .inbox .message .actions .action {
            width: 2rem;
            margin-bottom: 0.5rem;
            color: #c0cadd;
            text-align: center;
        }

        .email-app .inbox .message a {
            color: #000;
        }

        .email-app .inbox .message a:hover {
            text-decoration: none;
        }

        .email-app .inbox .message.unread .header,
        .email-app .inbox .message.unread .title {
            font-weight: bold;
        }

        .email-app .inbox .message .header {
            display: flex;
            flex-direction: row;
            margin-bottom: 0.5rem;
        }

        .email-app .inbox .message .header .date {
            margin-left: auto;
        }

        .email-app .inbox .message .title {
            margin-bottom: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .email-app .inbox .message .description {
            font-size: 12px;
        }

        .email-app .message .toolbar {
            padding-bottom: 1rem;
            border-bottom: 1px solid #e1e6ef;
        }

        .email-app .message .details .title {
            padding: 1rem 0;
            font-weight: bold;
        }

        .email-app .message .details .header {
            display: flex;
            padding: 1rem 0;
            margin: 1rem 0;
            border-top: 1px solid #e1e6ef;
            border-bottom: 1px solid #e1e6ef;
        }

        .email-app .message .details .header .avatar {
            width: 40px;
            height: 40px;
            margin-right: 1rem;
        }

        .email-app .message .details .header .from {
            font-size: 12px;
            color: #9faecb;
            align-self: center;
        }

        .email-app .message .details .header .from span {
            display: block;
            font-weight: bold;
        }

        .email-app .message .details .header .date {
            margin-left: auto;
        }

        .email-app .message .details .attachments {
            padding: 1rem 0;
            margin-bottom: 1rem;
            border-top: 3px solid #f9f9fa;
            border-bottom: 3px solid #f9f9fa;
        }

        .email-app .message .details .attachments .attachment {
            display: flex;
            margin: 0.5rem 0;
            font-size: 12px;
            align-self: center;
        }

        .email-app .message .details .attachments .attachment .badge {
            margin: 0 0.5rem;
            line-height: inherit;
        }

        .email-app .message .details .attachments .attachment .menu {
            margin-left: auto;
        }

        .email-app .message .details .attachments .attachment .menu a {
            padding: 0 0.5rem;
            font-size: 14px;
            color: #e1e6ef;
        }

        @media (max-width: 767px) {
            .email-app {
                flex-direction: column;
            }

            .email-app nav {
                flex: 0 0 100%;
            }
        }

        @media (max-width: 575px) {
            .email-app .message .header {
                flex-flow: row wrap;
            }

            .email-app .message .header .date {
                flex: 0 0 100%;
            }
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        /* Styling the content section */
        .message-content {
            margin-bottom: 20px;
        }

        /* Styling the toolbar buttons */
        .toolbar-buttons {
            display: flex;
            gap: 10px;
        }

        .toolbar-buttons button {
            display: flex;
            align-items: center;
            padding: 5px 10px;
        }

        /* Styling the textarea and send button */
        .message-input {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .message-input textarea {
            flex-grow: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
            min-height: 50px;
        }

        .message-input button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .message-input button:hover {
            background-color: #0056b3;
        }

        /* dibawha ini css profile */

        .message-container {
            display: flex;
            align-items: flex-start;
        }

        .profile-picture {
            margin-right: 15px;
            /* Jarak antara gambar dan konten pesan */
        }

        .profile-img {
            width: 50px;
            /* Atur ukuran gambar sesuai keinginan */
            height: 50px;
            border-radius: 50%;
            /* Membuat gambar bulat */
            object-fit: cover;
        }

        .message-content {
            max-width: 90%;
            /* Membatasi lebar konten pesan */
        }

        .header {
            font-weight: bold;
        }

        .title {
            font-size: 18px;
            margin-top: 5px;
        }

        .description {
            margin-top: 10px;
            font-size: 14px;
        }

        .signature {
            font-style: italic;
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
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">Kamu punya 4 pesan baru</div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src={{  url('back-end/assets/img/jm_denis.jpg')}} alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jimmy Denis</span>
                                                    <span class="block">
                                                        How are you ?
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src={{  url('back-end/assets/img/chadengle.jpg')}} alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Chad</span>
                                                    <span class="block">
                                                        Ok, Thanks !
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src={{  url('back-end/assets/img/mlane.jpg')}} alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jhon Doe</span>
                                                    <span class="block">
                                                        Ready for the meeting today...
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src={{  url('back-end/assets/img/talha.jpg')}} alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Talha</span>
                                                    <span class="block">
                                                        Hi, Apa Kabar ?
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
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

        @include('partial.sidebar.user')

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

    </script>
</body>
</html>
