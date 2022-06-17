@extends('master')

@section('title-link', 'Beranda')
@section('sub-title-link', 'Beranda')
@section('title', 'Dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (session('users')['role'] == 0 || session('users')['role'] == 4)
                        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Surat Masuk
                                                </p>
                                                <span
                                                    class="font-weight-bolder mb-0 text-success text-sm font-weight-bolder">{{ $letterIn }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- ./col -->
                    @if (session('users')['role'] == 0 || session('users')['role'] == 4)
                        <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="numbers">
                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Surat Keluar
                                                </p>
                                                <span
                                                    class="font-weight-bolder mb-0 text-success text-sm font-weight-bolder">{{ $letterOut }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4 text-end">
                                            <div
                                                class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Instansi</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <span
                                                    class="font-weight-bolder mb-0 text-success text-sm font-weight-bolder">{{ $instance }}</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="alert alert-primary mt-5 text-white" role="alert">
              Ada Surat Masuk Baru Yang Didisposisikan Kepada mu. <a class="text-success text-bold" href="">Lihat Disini</a>
            </div> --}}
            </div>
        </section>
    </div>
@endsection
