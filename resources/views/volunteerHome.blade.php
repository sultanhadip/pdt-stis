<x-index>
<div>
<section>
<div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Pendaftaran Volunteer</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('volunteers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="name">USER ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="user_id" placeholder="222xxxxxx">
                                </div>
                            </div>
                            <!-- error message untuk nim -->
                            @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="name">Created at</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="date" name="created_at" placeholder="222xxxxxx">
                                </div>
                            </div>
                            <!-- error message untuk nim -->
                            @error('created_at')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="name">NIM</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="nim" placeholder="222xxxxxx">
                                </div>
                            </div>
                            <!-- error message untuk nim -->
                            @error('nim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="name">Nomor Whatsapp</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="no_wa" placeholder="08xxxxxxxxxx">
                                </div>
                            </div>
                            <!-- error message untuk No Wa -->
                            @error('no_wa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="name">Divisi yang Ingin Didaftar</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="devisi" placeholder="devisi">
                                </div>
                            </div>
                            <!-- error message untuk Devisi -->
                            @error('devisi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Upload CV</div>
                            <div class="value">
                                <input type="file" class="form-control @error('link') is-invalid @enderror" name="link">
                                <div class="label--desc">Upload CV Anda. Max ukuran file 50 MB</div>
                            </div>
                            
                            <!-- error message untuk Upload CV -->
                            @error('link')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Kirim Formulir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</x-index>
