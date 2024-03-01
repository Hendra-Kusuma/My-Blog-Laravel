<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Content</title>
    <style>
        /* Styling untuk body */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        /* Container untuk email */
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling untuk header */
        .header {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        /* Styling untuk konten */
        .content {
            padding: 20px;
        }

        /* Styling untuk tombol */
        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Selamat Datang!</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Halo,</p>
            <p>Terima kasih telah bergabung dengan layanan kami. Kami sangat senang melihat Anda di sini!</p>
            <p>Silakan klik tombol di bawah ini untuk mulai menjelajahi layanan kami:</p>
            <a href=# class="btn">Jelajahi Layanan</a>
            <p>Jika Anda memiliki pertanyaan atau masalah, jangan ragu untuk menghubungi kami.</p>
            <p>Terima kasih,</p>
            <p>{{ $name }}</p>
        </div>
    </div>
</body>
</html>
