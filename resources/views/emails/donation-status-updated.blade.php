<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style type="text/css">
  </style>
</head>

<body class="clean-body u_body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #edf4f5; color: #000000;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="text-center mt-5 mb-0"><strong>Perubahan Status Donasi<br />PDT STIS</strong></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <p class="font-size-15">Dear {{ $donation->nama }},</p>
        <p class="font-size-14">Donasi anda pada tanggal {{ $donation->created_at->format('d F Y') }}</p>
        <p class="font-size-14">nominal {{ $donation->nominal }}</p>
        <p class="font-size-14">Telah diubah menjadi {{ $donation->status }}</p>
        <p class="font-size-14"><br /><br />Terima kasih atas kontribusi Anda!</p>
      </div>
    </div>

    <div class="row">
      <div class="col text-center mt-4">
        <a href="#" target="_blank" class="btn btn-primary">Lihat status donasi</a>
      </div>
    </div>

    <!-- Footer -->
    <div class="row">
      <div class="col text-center mt-4">
        <p class="text-white">PDT Polstat STIS</p>
      </div>
    </div>
  </div>
</body>

</html>
