<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun SITIKET</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #4CAF50;
        }

        .content {
            font-size: 16px;
            line-height: 1.6;
        }

        .button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Selamat datang di SITIKET!</h1>
        </div>
        <div class="content">
            <p>Halo {{ $data['name'] }},</p>
            <p>Terima kasih telah mendaftar di SITIKET! Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda.</p>

            <a href="{{ $data['link'] }}" class="button">Verifikasi Email Saya</a>

            <p>Jika Anda tidak mendaftar di SITIKET, Anda bisa mengabaikan email ini.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} SITIKET. Semua hak cipta dilindungi.</p>
        </div>
    </div>

</body>
</html>
