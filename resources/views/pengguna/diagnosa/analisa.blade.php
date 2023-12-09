<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

@extends('layouts.pengguna.main')

@section('content')
    <section class="inn">
        <div class="container">
            <div class="no-print">
                <button type="button" class="btn btn-primary" style="float: right" onclick="window.print()">Cetak Hasil Diagnosa</button>
            </div>
            <h2 class="text-center mb-2 fw-bold">Hasil Diagnosa</h2>
            <hr class="mb-4">
            <div class="pilihan" class="mt-4">
                <h3 style="font-size: 25px" class="mb-2">Pilihan Pengguna</h3>
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejalas as $gejala)
                            @foreach ($kepastian as $key => $kp)
                                @if ($gejala->id == $key)
                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <td>{{$gejala->nama}}</td>
                                    <td>
                                        @if($kp == 1)
                                        Yes
                                        @else
                                        No
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-4"></div>
            @foreach ($penyakits as $penyakit)
                @if ($penyakit->id == array_key_first($cfHasil))
                    <div class="row bg-light rounded-sm mt-4">
                        <div class="col-md-6 p-3">
                            <h3 style="font-size: 25px" class="mb-4">Hasil Diagnosa</h3>
                            <p>Berdasarkan daftar gejala yang Anda alami, Anda sakit :</p>
                                <h4 style="font-size: 22px" class="mb-3 text-success">{{ $penyakit->nama }}</h4>
                                <p style="font-size: 20px" class="text-success">Presentase : {{$cfHasil[array_key_first($cfHasil)] * 100}}%</p>
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-size: 25px" class="mb-2">Deskripsi penyakit</h3>
                            <br>
                            {!!$penyakit->deskripsi!!}
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-size: 25px" class="mb-2">Saran Obat</h3>
                            <br>
                            {!!$penyakit->solusi!!}
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="my-4"></div>
            <div id="kemungkinan" class="mt-4 no-print">
                <div class="card">
                    <div class="card-body">
                        <h3 style="font-size: 25px" class="mb-2">Kemungkinan penyakit lain</h3>
                        <br>
                        <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kemungkinan Penyakit Lain</th>
                                    <th>Presentase</th>
                                </tr>
                            </thead>
                            <tbody id="plain">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($cfHasil as $key => $cf)
                                    @foreach ($penyakits as $penyakit)
                                        @if ($key == $penyakit->id)
                                        @if($i <= 3)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$penyakit->nama}}</td>
                                            <td>{{$cf * 100}}%</td>
                                        </tr>
                                        @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <!-- Bootstrap Modal -->
            <div class="modal fade" id="diagnosaModal" tabindex="-1" aria-labelledby="diagnosaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-body-secondary">
                            <h5 class="modal-titley" id="diagnosaModalLabel">Hasil Diagnosa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach ($penyakits as $penyakit)
                                @if ($penyakit->id == array_key_first($cfHasil))
                                    <div class="row rounded-sm">
                                        <div class="col-md-6 pl-3">
                                            <h4 style="font-size: 22px" class="">{{ $penyakit->nama }}</h4>
                                            <p style="font-size: 20px" class="">Presentase: {{ $cfHasil[array_key_first($cfHasil)] * 100 }}%</p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 style="font-size: 25px" class="">Saran Obat</h3>
                                            <br>
                                            {!! $penyakit->solusi !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="modal-footer bg-body-secondary">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Include Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

@endSection

@push('script')
    <script>
        // Function to show the Bootstrap modal
        function showDiagnosaModal() {
            var myModal = new bootstrap.Modal(document.getElementById('diagnosaModal'));
            myModal.show();
        }

        // Show the modal when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('diagnosaModal'));
            myModal.show();
        });
    </script>
@endpush