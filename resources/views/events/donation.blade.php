@extends('layouts.donasi')

@section('donasi')
    <div class="card rounded-0 border-0 card2" id="paypage">
    @if ($eventsAvailable)
        <h1>Halaman Donasi</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="mb-0">
            <span class="text-danger" id="i4" aria-label="Required question">*</span>
            <span class="ml-2 text-danger">Wajib diisi</span>
        </p>
        <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="payment_method" class="form-label">
                    Metode Pembayaran:
                    <span class="text-danger vnumgf" id="i4" aria-label="Required question">*</span>
                </label>

                <div class="radio-group">
                    <label class="d-inline-block col-md-3">
                        <input type="radio" name="payment_method" class="d-none" value="bca">
                        <img src="{{ asset('assets/Donasi/img/bca.png') }}" width="150px" height="45px" class='radio'>
                    </label>
                    <label class="d-inline-block col-md-3">
                        <input type="radio" name="payment_method" value="bni" class="d-none">
                        <img src="{{ asset('assets/Donasi/img/bni.png') }}" width="150px" height="45px" class='radio'>
                    </label>
                    <label class="d-inline-block col-md-3">
                        <input type="radio" name="payment_method" value="bri" class="d-none">
                        <img src="{{ asset('assets/Donasi/img/bri.png') }}" width="150px" height="45px" class='radio'>
                    </label>
                    <label class="d-inline-block col-md-3">
                        <input type="radio" name="payment_method" value="dana" class="d-none">
                        <img src="{{ asset('assets/Donasi/img/dana.png') }}" width="150px" height="45px" class='radio'>
                    </label>
                    <label class="d-inline-block col-md-3">
                        <input type="radio" name="payment_method" value="gopay" class="d-none">
                        <img src="{{ asset('assets/Donasi/img/gopay.png') }}" width="150px" height="45px" class='radio'>
                    </label>
                    <label class="d-inline-block col-md-3">
                        <input type="radio" name="payment_method" value="linkaja" class="d-none">
                        <img src="{{ asset('assets/Donasi/img/shopeepay.png') }}" width="150px" height="45px" class='radio'>
                    </label>
                </div>
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

            <button type="submit" class="btn btn-primary" class="btn btn-info placeicon">DONASI &nbsp; &#xf178;</button>
        </form>
    </div>
    @else
        <h1>Periode donasi belum dibuka.</h1>
        <script>
            @if(!$eventsAvailable)
                    alert('No events available for donation today.');
            @endif
        </script>
    @endif
@endsection