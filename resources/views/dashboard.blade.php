@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Beranda')
@section('title','Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
                <div class="card">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-8">
                            <div class="numbers">
                              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Surat Masuk</p>
                                <span class="font-weight-bolder mb-0 text-success text-sm font-weight-bolder">55</span>
                            </div>
                          </div>
                          <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- ./col -->
                <div class="col-xl-4 col-sm-7 mb-xl-0 mb-4">
                  <div class="card">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-8">
                            <div class="numbers">
                              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Surat Masuk</p>
                                <span class="font-weight-bolder mb-0 text-success text-sm font-weight-bolder">55</span>
                            </div>
                          </div>
                          <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                              <i class="ni ni-coins text-md opacity-10" aria-hidden="true"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                                <span class="font-weight-bolder mb-0 text-success text-sm font-weight-bolder">55</span>
                              </h5>
                            </div>
                          </div>
                          <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="alert alert-primary mt-5 text-white" role="alert">
              Ada Surat Masuk Baru Yang Didisposisikan Kepada mu. <a class="text-success text-bold" href="">Lihat Disini</a>
            </div>
        </div>
    </section>
</div>
@endsection