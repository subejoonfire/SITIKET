<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Pesan Tiket</title>
</head>
<body>
    <h1>Pesan Baru pada Tiket #{{ $data['ticketcode'] }}</h1>
    <p><strong>{{ $data['user_from'] }} :</strong></p>
    <p><strong>Dear </strong> {{ $data['user_to'] }}</p>
    <br>
    <p>{{ $data['message'] }}</p>
    <br>
    <p>Regards,<br>{{ $data['user_from'] }}</p>
    <p><strong>Reply:</strong>{{ now()->format('l, d F Y H:i') }}</p>
</body>
</html>
