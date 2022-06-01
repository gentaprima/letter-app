@extends('master')

@section('title-link','Beranda')
@section('sub-title-link',$title)
@section('title',$title)
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card p-5 rounded mb-3">
              <div class="d-flex align-items-center">
                <div class="input-group">
                    <button id="pdf" class="btn btn-outline-primary size-btn">PDF</button>
                    <button id="excel" class="btn btn-outline-primary size-btn">EXCEL</button>
                    <button id="print" class="btn btn-outline-primary size-btn">PRINT</button>
                </div>
                <div class="ms-md-auto d-flex">
                  <div class="input-group" style="margin-right: 10px;width:100%;z-index:1">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" id="searchBox" class="form-control" placeholder="Cari Data">
                  </div>
                </div>
              </div>                        
              <div class="table-responsive p-0">
                 <table id="table" class="table table-striped">
                  <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Surat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Surat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dari/Kepada</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perihal</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Lampiran</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Surat</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                      
                      @foreach($letter as $row)
                      <tr>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no}}.</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no_surat}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->tgl_surat}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->type == 1 ? $row->kepada : $row->nama_instansi." - ".$row->full_name.' - '.$row->role}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->perihal}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->lampiran}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->type  == 0 ? "Surat Masuk" : "Surat Keluar"}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection


