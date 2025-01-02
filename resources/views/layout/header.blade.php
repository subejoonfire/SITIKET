@vite(['resources/css/app.css', 'resources/js/app.js'])
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>{{ $title ?? 'SI-TIKET' }}</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" type="image/jpeg" href="{{ asset('back-end/assets/JG.png') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/message.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/azzara.min.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/pic.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/user.css') }}">
<link rel="stylesheet" href="{{ asset('back-end/assets/css/helpdesk.css') }}">
<link rel="stylesheet" href="{{ asset('templates/css/style.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<script src="{{ asset('back-end/assets/js/plugin/webfon t/webfont.min.js') }}"></script>
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
