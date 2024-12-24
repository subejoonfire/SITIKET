<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>{{ $title ?? 'SI-TIKET' }}</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" type="image/jpeg" href="https://sitiket-development.up.railway.app/back-end/assets/JG.png">
<link rel="stylesheet" href="https://sitiket-development.up.railway.app/back-end/assets/css/message.css">
<link rel="stylesheet" href="https://sitiket-development.up.railway.app/back-end/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://sitiket-development.up.railway.app/back-end/assets/css/azzara.min.css">
<link rel="stylesheet" href="https://sitiket-development.up.railway.app/back-end/assets/css/demo.css">
<link rel="stylesheet" href="https://sitiket-development.up.railway.app/back-end/assets/css/pic.css">
<link rel="stylesheet" href="https://sitiket-development.up.railway.app/back-end/assets/css/helpdesk.css">
<link href="https://sitiket-development.up.railway.app/templates/css/style.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://sitiket-development.up.railway.app/back-end/assets/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {
            "families": ["Open+Sans:300,400,600,700"]
        }
        , custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"]
            , "urls": ["https://sitiket-development.up.railway.app/back-end/assets/css/fonts.css"]
        }
        , active: function() {
            sessionStorage.fonts = true;
        }
    });

</script>
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
