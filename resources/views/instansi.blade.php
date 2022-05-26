@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Data Instansi')
@section('title','Data Instansi')

@section('content')
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
          <div class="container-fluid">
            <div class="card p-5 rounded mb-3">
                 <div class="d-flex">
                       <button id="add" onclick="add()" class="btn btn-outline-primary size-btn" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                 </div>                        
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Instansi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat Instansi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                      ?>
                      @foreach ($instance as $row)                     
                      <tr>
                        <td class="text-xs font-weight-bold mb-0">{{$i}}.</td>
                        <td class="text-xs font-weight-bold mb-0">{{ $row->nama_instansi }}</td>
                        <td class="text-xs font-weight-bold mb-0">{{ $row->alamat_instansi }}</td>
                        <td class="text-xs font-weight-bold mb-0">
                          <a  href="#" onclick="edit({{$row->id}})" style="margin-right:10px" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>                    

                          <a href="/dashboard/instansi/{{$row->id}}" href="" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Delete
                          </a>                            
                        </td>
                      </tr>
                      <?php  $i++ ?>
                      @endforeach
                    </tbody>
                </table>
                <div class="d-flex flex-row ms-md-auto">
                  @if (!$instance->onFirstPage())
                  <a rel="prev" href="{{ $instance->previousPageUrl() }}" style="margin-right:20px" class="btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
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
                  @if($instance->hasMorePages())
                  <a href="{{ $instance->nextPageUrl() }}" rel="next" class="btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
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
</div>

<script>
  function closeModal(){
    $('#addModal').modal('hide')
  }
  function edit($id){
      $('#addModal').modal('show')
      $('.modal-title').text('Edit Data')
      $('#form-modal').attr('action','/dashboard/instansi/'+$id)
  }
  function add(){
    $('.modal-title').text('Tambah Data')
    $('#addModal').modal('show')
    $('#form-modal').attr('action','/dashboard/instansi')
  }
</script>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
      </div>
      <div class="modal-body">
        <form id="form-modal" method="POST" action="/dashboard/instansi">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Instansi</label>
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-landmark" aria-hidden="true"></i></span>
              <input type="text"  name="nama_instansi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Instansi">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat Instansi</label>
            <div class="input-group">
              <textarea placeholder="Alamat Instansi" type="password"  style="padding-left: 10px !important" name="alamat_instansi" class="form-control" id="exampleInputPassword1"></textarea>
            </div>
          </div>
        @csrf
        </div>
        <div class="modal-footer">
          <button type="button" id="close" onclick="closeModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

