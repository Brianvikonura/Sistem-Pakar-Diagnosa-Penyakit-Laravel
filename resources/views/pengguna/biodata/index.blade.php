@extends('layouts.pengguna.main')

@section('content')
    <section class="inn">
        <div class="container">
            <form action="{{ route('pengguna.biodata.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Identitas Pengguna</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                                        placeholder="Masukkan Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        placeholder="Masukkan Nomor Handphone" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" cols="15" rows="5"
                                        placeholder="Masukkan Alamat" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('pengguna.dashboard') }}" class="btn btn-danger btn-md">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-md" id="kirim">Kirim</button>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endpush

@push('js')
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/pengguna/js/nik_parse.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script> --}}
@endpush

@push('script')
    <script>
    </script>
@endpush
