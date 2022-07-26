@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Arsip Surat')
@section('title','Arsip Surat')
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
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Arsip</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dari/Kepada</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perihal</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Surat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Surat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      
                      @foreach($letter as $row)
                      <tr>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no}}.</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no_surat}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->tgl_surat}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->tanggal_arsip}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->type == 1 ? $row->kepada : $row->nama_instansi." - ".$row->full_name.' - '.$row->role}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->perihal}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->keterangan}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->lampiran}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->type  == 0 ? "Surat Masuk" : "Surat Keluar"}}</td>
                          <td class="text-xs font-weight-bold mb-0">
                            {{-- <a href="#" onclick="edit({{$row->id}})"  style="margin-right:10px" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> --}}
                              {{-- Edit --}}
                            {{-- </a>                     --}}

                            <a  href="/dashboard/surat/detail/{{$row->id}}/{{$row->type}}" style="margin-right:10px" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Lihat detail
                            </a>                      
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex flex-row ms-md-auto">
                  @if (!$letter->onFirstPage())
                  <a rel="prev" href="{{ $letter->previousPageUrl() }}" style="margin-right:20px" class="btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                      Previous 
                  </a>
                  @else 
                  <a rel="prev" style="margin-right:20px" class="btn btn-secondary size-btn" data-toggle="modal" data-target="#modal-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                      Previous 
                  </a>
                  @endif
                  @if($letter->hasMorePages())
                  <a href="{{ $letter->nextPageUrl() }}" rel="next" class="btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
                    Next 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                  </a>
                  @else
                  <a  class="btn btn-secondary size-btn" data-toggle="modal" data-target="#modal-form">
                    Next 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                  </a>
                  @endif
                </div>   
                </div>
        </div>
    </section>
</div>
@endsection


