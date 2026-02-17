<x-index>
    <section>
        <!-- Favicons -->
        <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon" />
        <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
        
        <!-- Vendor CSS Files -->
        <link href="{{ asset('/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}" rel="stylesheet" />
        

        <!-- Template Main CSS File -->
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/css/donasi.css') }}" rel="stylesheet" />
        <main class="py-4">
            @if ($events)
                <script>console.log({{$events}})</script>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-11">
                            <div class="card card0 rounded-0">
                                <div class="row">
                                    <div class="col-md-5 d-md-block d-none p-0 box">
                                        <div class="card rounded-0 border-0 card1" id="bill">
                                            <h3 id="heading1"><i></i></h3>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12 p-0 box">
                                        <div class="card rounded-0 border-0 card2" id="paypage">
                                             
                                            <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="form-card">
                                                <h2 id="heading2" class="text-danger">Metode Pembayaran</h2>

                                                <div class="radio-group" id="paymentMethods">
                                                    <label class="d-inline-block col-md-3">
                                                        <input type="radio" name="payment_method" class="d-none" value="bca" onclick="showPopup('assets/img/bca.png', 'BCA Bank: Pembayaran donasi dilakukan dengan cara Transfer ke nomor rekening xxx-xxx-xxxx')">
                                                        <img src="{{ asset('assets/Donasi/img/bca.png') }}" width="150px" height="45px" class='radio' >
                                                    </label>
                                                    <label class="d-inline-block col-md-3">
                                                        <input type="radio" name="payment_method" value="bni" class="d-none" onclick="showPopup('assets/img/bni.png', 'BNI Bank: Pembayaran donasi dilakukan dengan cara Transfer ke nomor rekening xxx-xxx-xxxx')">
                                                        <img src="{{ asset('assets/Donasi/img/bni.png') }}" width="150px" height="45px" class='radio'>
                                                    </label>
                                                    <label class="d-inline-block col-md-3">
                                                        <input type="radio" name="payment_method" value="bri" class="d-none" onclick="showPopup('assets/img/bri.png', 'BRI Bank: Pembayaran donasi dilakukan dengan cara Transfer ke nomor rekening xxx-xxx-xxxx')">
                                                        <img src="{{ asset('assets/Donasi/img/bri.png') }}" width="150px" height="45px" class='radio'>
                                                    </label>
                                                    <label class="d-inline-block col-md-3">
                                                        <input type="radio" name="payment_method" value="dana" class="d-none" onclick="showPopup('assets/img/qr.jpg', 'DANA: Pembayaran donasi dilakukan dengan cara Scan kode QR diatas pada aplikasi DANA')">
                                                        <img src="{{ asset('assets/Donasi/img/dana.png') }}" width="150px" height="45px" class='radio'>
                                                    </label>
                                                    <label class="d-inline-block col-md-3">
                                                        <input type="radio" name="payment_method" value="gopay" class="d-none" onclick="showPopup('assets/img/qr.jpg', 'Gopay: Pembayaran donasi dilakukan dengan cara Scan kode QR diatas pada aplikasi Gopay')">
                                                        <img src="{{ asset('assets/Donasi/img/gopay.png') }}" width="150px" height="45px" class='radio'>
                                                    </label>
                                                    <label class="d-inline-block col-md-3">
                                                        <input type="radio" name="payment_method" value="linkaja" class="d-none" onclick="showPopup('assets/img/qr.jpg', 'Shopeepay: Pembayaran donasi dilakukan dengan cara Scan kode QR diatas pada aplikasi Shopeepay')">
                                                        <img src="{{ asset('assets/Donasi/img/shopeepay.png') }}" width="150px" height="45px" class='radio'>
                                                    </label>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label" >
                                                        Nama:
                                                    </label>
                                                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nominal" class="form-label">
                                                        Nominal:
                                                        <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                                                    </label> 
                                                    <input type="number" class="form-control" name="nominal" value="{{ old('nominal') }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="file" class="form-label">
                                                        Upload Bukti pembayaran:
                                                        <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                                                    </label>
                                                    <input type="file" class="form-control" name="file" accept=".jpg, .png, .jpeg">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message" class="form-label">Message:</label>
                                                    <textarea class="form-control" name="message" rows="4">{{ old('message') }}</textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                <div class="overlay" id="overlay" onclick="hidePopup()">
                                                    <div class="popup" id="popup">
                                                        <img id="popupImg" src="" alt="Popup Image" />
                                                        <p id="popupMessage"></p>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @else
              <div class="container">
                  <div class="alert alert-info mt-5" role="alert">
                      <h4 class="alert-heading">Periode donasi belum dibuka.</h4>
                      <p>Mohon maaf, saat ini tidak ada event yang tersedia untuk donasi.</p>
                      <a href="{{ route('welcome') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
                  </div>
              </div>
            @endif
      
      <script>
            function highlightRadio(radio) {
                var radios = document.querySelectorAll('.radio-group label');
                radios.forEach(function (label) {
                    label.classList.remove('highlight');
                });

                radio.parentNode.classList.add('highlight');
            }
        </script>
        <script>
        function highlightRadio(radio) {
            var radios = document.querySelectorAll('.radio-group label');
            radios.forEach(function (label) {
                label.classList.remove('highlight');
            });

            radio.parentNode.classList.add('highlight');
        }

        document.addEventListener('DOMContentLoaded', function () {
            var paymentMethods = document.getElementById('paymentMethods');
            var radioButtons = paymentMethods.querySelectorAll('input[type="radio"]');

            radioButtons.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    highlightRadio(radio);
                });
            });
        });
    </script>

    <style>
        .radio-group label.highlight {
            border: 4px solid #d2f704; 
            border-radius: 5px;
        }
    </style>


    <script src="{{ asset('/assets/js/donasijs.js') }}"></script>
  </section>
</x-index>