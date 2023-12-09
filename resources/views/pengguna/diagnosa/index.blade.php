@extends('layouts.pengguna.main')

@section('content')
    <section class="inn">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4 mb-4">Identitas Pengguna</h3>
                    <table border="0" class="table">
                        <tr>
                            <td>Identitas Pengguna &nbsp; : {{ Str::title(Session('biodata')['nama_pemilik']) }}</td>
                        </tr>
                        <tr>
                            <td>No. HP &emsp; &emsp; &emsp; &emsp; &emsp; : {{ Session('biodata')['no_hp'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat &emsp; &emsp; &emsp; &emsp; &emsp; : {{ Str::title(Session('biodata')['alamat']) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class='alert alert-primary alert-dismissible'>
                        <h4><i class="bi bi-exclamation-triangle"></i>&nbsp;Perhatian !</h4>
                        <p>Silahkan Pilih Gejala yang Sesuai dengan Anda</p>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    </div>
                    <form action="{{ route('pengguna.diagnosa.analisa') }}" method="post">
                        @csrf
                        <table class="table tabled-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gejala yang dialami</th>
                                    <th scope="col">Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gejalas as $gejala)

                                    <tr>
                                        <th scope="row" width="10%">{{ $loop->iteration }}</th>
                                        <td>{{ Str::title($gejala->nama) }}</td>
                                        <td width="25%">
                                            <div class="form-group">
                                                <select name="kondisi[]" id="kondisi" class="form-control">
                                                    <option disabled selected>Pilih</option>
                                                    <option value="{{ $gejala->id }}_1">Yes</option>
                                                    <option value="{{ $gejala->id }}_0">No</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('pengguna.diagnosa.reset') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#diagnosaModal">Analisa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // Function to show the Bootstrap modal
        function showDiagnosaModal() {
            var myModal = new bootstrap.Modal(document.getElementById('diagnosaModal'));
            myModal.show();
        }
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
@endpush

@push('js')
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endpush
