<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    {{-- <link rel="stylesheet" href="{{ asset ('assets/Donasi/donasi.css') }}"> --}}
    <style>
        .radio-group input[type="radio"]:checked + img {
            border: 2px solid #007BFF;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">
                <div class="card card0 rounded-0">
                    <div class="row">
                        <div class="col-md-5 d-md-block align-items-center d-none p-0 box">
                            <div class="card rounded-0 border-0 card1" id="bill">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <h3 id="heading1">Donasi</h3>
                                    <p>Halo</p>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-7 col-sm-12 p-0 box"> 
                            <main>
                                <div class="container">
                                    @yield('donasi')
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/Donasi/donasijs.js') }}"></script>
</body>
</html>
