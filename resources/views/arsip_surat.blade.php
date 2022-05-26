@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Data Surat Masuk')
@section('title','Data Surat Masuk')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card p-5 rounded mb-3">
              <div class="d-flex align-items-center">
                <div class="ms-md-auto d-flex">
                  <div class="input-group" style="margin-right: 10px;width:100%;z-index:1">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Cari Data">
                  </div>
                </div>
              </div>                        
              <div class="table-responsive p-0">
                 <table id="example1" class="table table-striped">
                  <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Surat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Agenda</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Surat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Arsip</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dari/Kepada</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perihal</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Lampiran</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      
                      @foreach($letter as $row)
                      <tr>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no}}.</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no_surat}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->no_agenda}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->tgl_surat}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->tanggal_arsip}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->nama_instansi." / ".$row->full_name.' - '.$row->role}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->perihal}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->keterangan}}</td>
                          <td class="text-xs font-weight-bold mb-0">{{$row->lampiran}}</td>
                          <td class="text-xs font-weight-bold mb-0">
                            {{-- <a href="#" onclick="edit({{$row->id}})"  style="margin-right:10px" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> --}}
                              {{-- Edit --}}
                            {{-- </a>                     --}}

                            <a  href="/dashboard/surat-masuk/detail/{{$row->id}}" style="margin-right:10px" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Lihat detail
                            </a>                      
                            <a  href="/dashboard/surat-masuk/{{ $row->id}}"  class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Hapus
                            </a>               

                          </td>
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


