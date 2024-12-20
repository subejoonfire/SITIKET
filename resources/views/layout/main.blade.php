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
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #f44336;
            /* Warna merah untuk notifikasi */
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Membuat tombol review relatif agar badge notifikasi bisa ditempatkan di pojok kanan atas */
        .form-button-action a {
            position: relative;
        }

        .main-header {
            background-color: #70c55b !important;
        }

        .btn-custom {
            background-color: #70c55b;
            color: white;
            border-radius: 25px;
        }


        /* ini beda cuyyy */


        <style type="text/css">body {
            margin-top: 20px;
            background: #eee;
        }

        .contacts li>.info-combo>h3.name {
            font-size: 12px;
        }

        .contacts li .message-time {
            text-align: right;
            display: block;
            margin-left: -15px;
            width: 70px;
            height: 25px;
            line-height: 28px;
            font-size: 14px;
            font-weight: 600;
            padding-right: 5px;
        }

        .contacts li>.info-combo>h5 {
            width: 180px;
            font-size: 12px;
            height: 28px;
            font-weight: 500;
            overflow: hidden;
            white-space: normal;
            text-overflow: ellipsis;
        }

        .contacts li>.info-combo>h3 {
            width: 167px;
            height: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .info-combo>h3 {
            margin: 3px 0;
        }

        .no-margin-bottom {
            margin-bottom: 0 !important;
        }

        .info-combo>h5 {
            margin: 2px 0 6px 0;
        }

        /* Messages */
        .messages-panel img.img-circle {
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .medium-image {
            width: 45px;
            height: 45px;
            margin-right: 5px;
        }

        .img-circle {
            border-radius: 50%;
        }

        .messages-panel {
            width: 100%;
            height: calc(100vh - 150px);
            min-height: 460px;
            background-color: #fbfcff;
            display: inline-block;
            border-top-left-radius: 5px;
            margin-bottom: 0;
        }

        .messages-panel img.img-circle {
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .messages-panel .tab-content {
            border: none;
            background-color: transparent;
        }

        .contacts-list {
            background-color: #fff;
            border-right: 1px solid #cfdbe2;
            width: 305px;
            height: 100%;
            border-top-left-radius: 5px;
            float: left;
        }

        .contacts-list .inbox-categories {
            width: 100%;
            padding: 0;
            margin-left: 0;
        }

        .contacts-list .inbox-categories>div {
            float: left;
            width: 76px;
            padding: 15px 5px;
            font-size: 14px;
            text-align: center;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.75);
            cursor: pointer;
            font-weight: 700;
        }

        .contacts-list .inbox-categories>div:nth-child(1) {
            color: #2da9e9;
            border-right-color: rgba(45, 129, 233, 0.06);
            border-bottom: 4px solid #2da9e9;
            border-top-left-radius: 5px;
        }

        .contacts-list .inbox-categories>div:nth-child(1).active {
            color: #fff;
            background-color: #2da9e9;
            border-bottom: 4px solid rgba(0, 0, 0, 0.15);
        }

        .contacts-list .inbox-categories>div:nth-child(2) {
            color: #0ec8a2;
            border-right-color: rgba(14, 200, 162, 0.06);
            border-bottom: 4px solid #0ec8a2;
        }

        .contacts-list .inbox-categories>div:nth-child(2).active {
            color: #fff;
            background-color: #0ec8a2;
            border-bottom: 4px solid rgba(0, 0, 0, 0.15);
        }

        .contacts-list .inbox-categories>div:nth-child(3) {
            color: #ff9e2a;
            border-right-color: rgba(255, 152, 14, 0.06);
            border-bottom: 4px solid #ff9e2a;
        }

        .contacts-list .inbox-categories>div:nth-child(3).active {
            color: #fff;
            background-color: #ff9e2a;
            border-bottom: 4px solid rgba(0, 0, 0, 0.15);
        }

        .contacts-list .inbox-categories>div:nth-child(4) {
            color: #314557;
            border-bottom: 4px solid #314557;
            border-right-color: transparent;
        }

        .contacts-list .inbox-categories>div:nth-child(4).active {
            color: #fff;
            background-color: #314557;
            border-bottom: 4px solid rgba(0, 0, 0, 0.35);
        }

        .contacts-list .panel-search>input {
            margin-left: 5px;
            background-color: rgba(0, 0, 0, 0);
        }

        .contacts-outter-wrapper {
            position: relative;
            width: 305px;
            direction: rtl;
            min-height: 405px;
            overflow: hidden;
        }

        .contacts-outter-wrapper:after,
        .contacts-outter-wrapper:nth-child(1):after {
            content: "";
            position: absolute;
            width: 100%;
            height: 5px;
            bottom: 0;
            background-color: #2da9e9;
            border-bottom-left-radius: 4px;
        }

        .contacts-outter-wrapper:nth-child(2):after {
            background-color: #0ec8a2;
        }

        .contacts-outter-wrapper:nth-child(3):after {
            background-color: #ff9e2a;
        }

        .contacts-outter-wrapper:nth-child(4):after {
            background-color: #314557;
        }

        .contacts-outter {
            position: relative;
            height: calc(100vh - 278px);
            width: 325px;
            direction: rtl;
            overflow-y: scroll;
            padding-left: 20px;
        }

        @media screen and (min-color-index:0) and(-webkit-min-device-pixel-ratio:0) {
            @media {
                .contacts-outter-wrapper {
                    direction: ltr;
                }

                .contacts-outter {
                    direction: ltr;
                    padding-left: 0;
                }
            }
        }

        .contacts {
            direction: ltr;
            width: 305px;
            margin-top: 0px;
        }

        .contacts li {
            width: 100%;
            border-top: 1px solid transparent;
            border-bottom: 1px solid rgba(205, 211, 237, 0.2);
            border-left: 4px solid rgba(255, 255, 255, 0);
            padding: 8px 12px;
            position: relative;
            background-color: rgba(255, 255, 255, 0);
        }

        .contacts li:first-child {
            border-top: 1px solid rgba(205, 211, 237, 0.2);
        }

        .contacts li:first-child.active {
            border-top: 1px solid rgba(205, 211, 237, 0.75);
        }

        .contacts li:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .contacts li.active,
        .contacts.info li.active {
            border-left: 4px solid #2da9e9;
            border-top-color: rgba(205, 211, 237, 0.75);
            border-bottom-color: rgba(205, 211, 237, 0.75);
            background-color: #fbfcff;
        }

        .contacts.success li.active {
            border-left: 4px solid #0ec8a2;
        }

        .contacts.warning li.active {
            border-left: 4px solid #ff9e2a;
        }

        .contacts.danger li.active {
            border-left: 4px solid #f95858;
        }

        .contacts.dark li.active {
            border-left: 4px solid #314557;
        }

        .contacts li>.info-combo {
            width: 172px;
            cursor: pointer;
        }

        .contacts li>.info-combo>h3 {
            width: 167px;
            height: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .contacts li .contacts-add {
            width: 50px;
            float: right;
            z-index: 23299;
        }

        .contacts li .message-time {
            text-align: right;
            display: block;
            margin-left: -15px;
            width: 70px;
            height: 25px;
            line-height: 28px;
            font-size: 14px;
            font-weight: 600;
            padding-right: 5px;
        }

        .contacts li .contacts-add .fa-trash-o {
            position: absolute;
            font-size: 14px;
            right: 12px;
            bottom: 15px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .contacts li .contacts-add .fa-paperclip {
            position: absolute;
            font-size: 14px;
            right: 34px;
            bottom: 15px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .contacts li .contacts-add .fa-trash-o:hover {
            color: #f95858;
        }

        .contacts li .contacts-add .fa-paperclip:hover {
            color: #ff9e2a;
        }

        .contacts li>.info-combo>h5 {
            width: 180px;
            font-size: 12px;
            height: 28px;
            font-weight: 500;
            overflow: hidden;
            white-space: normal;
            text-overflow: ellipsis;
        }

        .contacts li .message-count {
            position: absolute;
            top: 8px;
            left: 5px;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            background-color: #ff9e2a;
            border-radius: 50%;
            color: #fff;
            font-weight: 600;
            font-size: 10px;
        }

        .message-body {
            background-color: #fbfcff;
            height: 100%;
            width: calc(100% - 305px);
            float: right;
        }

        .message-body .message-top {
            display: inline-block;
            width: 100%;
            position: relative;
            min-height: 53px;
            height: auto;
            background-color: #fff;
            border-bottom: 1px solid rgba(205, 211, 237, 0.5);
        }

        .message-body .message-top .new-message-wrapper {
            width: 100%;
        }

        .message-body .message-top .new-message-wrapper>.form-group {
            width: 100%;
            padding: 10px 10px 0 10px;
            height: 50px;
        }

        .message-body .message-top .new-message-wrapper .form-group .form-control {
            width: calc(100% - 50px);
            float: left;
        }

        .message-body .message-top .new-message-wrapper .form-group a {
            width: 40px;
            padding: 6px 6px 6px 6px;
            text-align: center;
            display: block;
            float: right;
            margin: 0;
        }

        .message-body .message-top>.btn {
            height: 53px;
            line-height: 53px;
            padding: 0 20px;
            float: right;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            margin: 0;
            font-size: 15px;
            opacity: 0.9;
        }

        .message-body .message-top>.btn:hover,
        .message-body .message-top>.btn:focus,
        .message-body .message-top>.btn.active {
            opacity: 1;
        }

        .message-body .message-top>.btn>i {
            margin-right: 5px;
            font-size: 18px;
        }

        .new-message-wrapper {
            position: absolute;
            max-height: 400px;
            top: 53px;
            background-color: #fff;
            z-index: 105;
            padding: 20px 15px 30px 15px;
            border-bottom: 1px solid #cfdbe2;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            box-shadow: 0 7px 10px rgba(0, 0, 0, 0.25);
            transition: 0.5s;
            display: none;
        }

        .new-message-wrapper.closed {
            opacity: 0;
            max-height: 0;
        }

        .chat-footer.new-message-textarea {
            display: block;
            position: relative;
            padding: 0 10px;
        }

        .chat-footer.new-message-textarea .send-message-button {
            right: 35px;
        }

        .chat-footer.new-message-textarea .upload-file {
            right: 85px;
        }

        .chat-footer.new-message-textarea .send-message-text {
            padding-right: 100px;
            height: 90px;
        }

        .message-chat {
            width: 100%;
            overflow: hidden;
        }

        .chat-body {
            width: calc(100% + 17px);
            min-height: 290px;
            height: calc(100vh - 320px);
            background-color: #fbfcff;
            margin-bottom: 30px;
            padding: 30px 5px 5px 5px;
            overflow-y: scroll;
        }

        .message {
            position: relative;
            width: 100%;
        }

        .message br {
            clear: both;
        }

        .message .message-body {
            position: relative;
            width: auto;
            max-width: calc(100% - 150px);
            float: left;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #dbe3e8;
            margin: 0 5px 20px 15px;
            color: #788288;
        }

        .message .medium-image {
            float: left;
            margin-left: 10px;
        }

        .message .message-info {
            width: 100%;
            height: 22px;
        }

        .message .message-info>h5>i {
            font-size: 11px;
            font-weight: 700;
            margin: 0 2px 0 0;
            color: #a2b8c5;
        }

        .message .message-info>h5 {
            color: #a2b8c5;
            margin: 8px 0 0 0;
            font-size: 12px;
            float: right;
            padding-right: 10px;
        }

        .message .message-info>h4 {
            font-size: 14px;
            font-weight: 600;
            margin: 7px 13px 0 10px;
            color: #65addd;
            float: left;
        }

        .message hr {
            margin: 4px 2%;
            width: 96%;
            opacity: 0.75;
        }

        .message .message-text {
            text-align: left;
            padding: 3px 13px 10px 13px;
            font-size: 14px;
        }

        .message.my-message .message-body {
            float: right;
            margin: 0 15px 20px 5px;
        }

        .message.my-message:after {
            content: "";
            position: absolute;
            top: 11px;
            left: auto;
            right: 63px;
            float: left;
            z-index: 100;
            border-top: 10px solid transparent;
            border-left: 13px solid #fff;
            border-bottom: 10px solid transparent;
            border-right: none;
        }

        .message.my-message:before {
            content: "";
            position: absolute;
            top: 10px;
            left: auto;
            right: 62px;
            float: left;
            z-index: 99;
            border-top: 11px solid transparent;
            border-left: 13px solid #dbe3e8;
            border-bottom: 11px solid transparent;
            border-right: none;
        }

        .message.my-message .medium-image {
            float: right;
            margin-left: 5px;
            margin-right: 10px;
        }

        .message.my-message .message-info>h5 {
            float: left;
            padding-left: 10px;
            padding-right: 0;
        }

        .message.my-message .message-info>h4 {
            float: right;
        }

        .message.info .message-body {
            background-color: #70c55b;
            border: 1px solid #70c55b;
            color: #fff;
        }

        .message.info:after,
        .message.info:before {
            border-right: 13px solid #70c55b;
        }

        .message.success .message-body {
            background-color: #0ec8a2;
            border: 1px solid #0ec8a2;
            color: #fff;
        }

        .message.success:after,
        .message.success:before {
            border-right: 13px solid #0ec8a2;
        }

        .message.warning .message-body {
            background-color: #ff9e2a;
            border: 1px solid #ff9e2a;
            color: #fff;
        }

        .message.warning:after,
        .message.warning:before {
            border-right: 13px solid #ff9e2a;
        }

        .message.danger .message-body {
            background-color: #f95858;
            border: 1px solid #f95858;
            color: #fff;
        }

        .message.danger:after,
        .message.danger:before {
            border-right: 13px solid #f95858;
        }

        .message.dark .message-body {
            background-color: #314557;
            border: 1px solid #314557;
            color: #fff;
        }

        .message.dark:after,
        .message.dark:before {
            border-right: 13px solid #314557;
        }

        .message.info .message-info>h4,
        .message.success .message-info>h4,
        .message.warning .message-info>h4,
        .message.danger .message-info>h4,
        .message.dark .message-info>h4 {
            color: #fff;
        }

        .message.info .message-info>h5,
        .message.info .message-info>h5>i,
        .message.success .message-info>h5,
        .message.success .message-info>h5>i,
        .message.warning .message-info>h5,
        .message.warning .message-info>h5>i,
        .message.danger .message-info>h5,
        .message.danger .message-info>h5>i,
        .message.dark .message-info>h5,
        .message.dark .message-info>h5>i {
            color: #fff;
            opacity: 0.9;
        }

        .chat-footer {
            position: relative;
            width: 100%;
            padding: 0 80px;
        }

        .chat-footer .send-message-text {
            position: relative;
            display: block;
            width: 100%;
            min-height: 55px;
            max-height: 75px;
            background-color: #fff;
            border-radius: 5px;
            padding: 5px 95px 5px 10px;
            font-size: 13px;
            resize: vertical;
            outline: none;
            border: 1px solid #e0e6eb;
        }

        .chat-footer .send-message-button {
            display: block;
            position: absolute;
            width: 35px;
            height: 35px;
            right: 100px;
            top: 0;
            bottom: 0;
            margin: auto;
            border: 1px solid rgba(0, 0, 0, 0.05);
            outline: none;
            font-weight: 600;
            border-radius: 50%;
            padding: 0;
        }

        .chat-footer .send-message-button>i {
            font-size: 16px;
            margin: 0 0 0 -2px;
        }

        .chat-footer label.upload-file input[type="file"] {
            position: fixed;
            top: -1000px;
        }

        .chat-footer .upload-file {
            display: block;
            position: absolute;
            right: 150px;
            height: 30px;
            font-size: 20px;
            top: 0;
            bottom: 0;
            margin: auto;
            opacity: 0.25;
        }

        .chat-footer .upload-file:hover {
            opacity: 1;
        }

        @media screen and (max-width: 767px) {
            .messages-panel {
                min-width: 0;
                display: inline-block;
            }

            .contacts-list,
            .contacts-list .inbox-categories>div:nth-child(4) {
                border-top-right-radius: 5px;
                border-right: none;
            }

            .contacts-list,
            .contacts-outter-wrapper,
            .contacts-outter,
            .contacts {
                width: 100%;
                direction: ltr;
                padding-left: 0;
            }

            .contacts-list .inbox-categories>div {
                width: 25%;
            }

            .message-body {
                width: 100%;
                margin: 20px 0;
                border: 1px solid #dce2e9;
                background-color: #fff;
            }

            .message .message-body {
                max-width: calc(100% - 85px);
            }

            .message-body .chat-body {
                background-color: #fff;
                width: 100%;
            }

            .chat-footer {
                margin-bottom: 20px;
                padding: 0 20px;
            }

            .chat-footer .send-message-button {
                right: 40px;
            }

            .chat-footer .upload-file {
                right: 90px;
            }

            .message-body .message-top>.btn {
                border-radius: 0;
                width: 100%;
            }

            .contacts-add {
                display: none;
            }
        }

        /* Profile page */

        .profile-main {
            background-color: #fff;
            border: 1px solid #dce2e9;
            border-radius: 3px;
            position: relative;
            margin-bottom: 20px;
        }

        .profile-main .profile-background {

            background-repeat: no-repeat;
            background-size: 100%;
            background-position: center;
            width: 100%;
            height: 260px;
        }

        .profile-main .profile-info {
            width: calc(100% - 380px);
            max-width: 1100px;
            margin: 0 auto;
            background-color: #fff;
            height: 70px;
            border-radius: 0 0 3px 3px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-main .profile-info>div {
            margin: 0 10px;
        }

        .profile-main .profile-info>div:last-child {
            padding-right: 25px;
        }

        .profile-main .profile-info>div h4 {
            font-size: 16px;
            margin-bottom: 0;
        }

        .profile-main .profile-info>div h5 {
            margin-top: 5px;
            font-weight: 500;
        }

        .profile-main .profile-button {
            padding: 8px 0;
            position: absolute;
            right: 25px;
            bottom: 16px;
            width: 150px;
        }

        .profile-main .profile-picture {
            width: 150px;
            height: 150px;
            border: 4px solid #fff;
            position: absolute;
            left: 25px;
            bottom: 14px;
        }

        @media screen and (max-width: 767px) {

            .profile-main .profile-info .profile-status,
            .profile-main .profile-info .profile-posts,
            .profile-main .profile-info .profile-date {
                display: none;
            }
        }

        .contacts li>.info-combo {
            display: inline-block;
        }

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

        .active {
            background-color: #ffffff;
            color: white;
        }

        .attachments {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .attachment-item {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
        }

        .attachment-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .message-input {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 10px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
            flex-grow: 1;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding-right: 35px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }

        .attach-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #0056b3;
        }

        .attach-icon i {
            font-size: 20px;
        }

        button.send-btn {
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.send-btn:hover {
            background-color: #00409e;
        }

        .no-cursor {
            pointer-events: none;
            caret-color: transparent;
            background-color: #f5f5f5;
        }
        .message-notif-scroll {
    max-height: 400px; 
    overflow-y: auto;
    overflow-x: hidden;
    padding: 10px; 
}

.scrollbar-outer::-webkit-scrollbar {
    width: 8px; 
}

.scrollbar-outer::-webkit-scrollbar-thumb {
    background: #888; 
    border-radius: 4px; 
}

.scrollbar-outer::-webkit-scrollbar-thumb:hover {
    background: #555; 
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
                                @if ($notification != 0)
                                <span class="notification">{{ $notification }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                @if ($notification != 0)
                                <li>
                                    <div class="dropdown-title">Kamu punya {{ $notification }} pesan baru</div>
                                </li>
                                @else
                                <li>
                                    <div class="dropdown-title">Tidak ada pesan terbaru</div>
                                </li>
                                @endif
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            @foreach ($notificationData as $item)
                                            <a href="{{ url('pic/ticket/review/index/'. $item->idticket) }}">
                                                <div class="notif-img">
                                                    <img src={{  url('storage/profiles/' . ($item->user_from->image == '' ? 'default.jpg' : $item->user_from->image) )}} alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">{{ $item->user_from->name }}</span>
                                                    <span class="block">
                                                        {{ Str::limit($item->message, 20) }}
                                                    </span>
                                                    <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                                </div>
                                            </a>
                                            @endforeach
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

        @include('partial.sidebar.pic')

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
