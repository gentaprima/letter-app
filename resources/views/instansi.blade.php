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
                            <th>No</th>
                            <th>Nama Instansi</th>
                            <th>Alamat Instansi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i = 1;
                      ?>
                      @foreach ($instance as $row)                     
                      <tr>
                        <td>{{$i}}.</td>
                        <td>{{ $row->nama_instansi }}</td>
                        <td>{{ $row->alamat_instansi }}</td>
                        <td>
                          <button id="edit" type="button" onclick="edit({{$row->id}})" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-edit"></i> 
                          </button>                         
                          <a href="/dashboard/instansi/{{$row->id}}" id="delete-data" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-trash"></i> 
                          </a>                         
                        </td>
                      </tr>
                      <?php  $i++ ?>
                      @endforeach
                    </tbody>

                </table>
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
              <input type="text" name="nama_instansi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Instansi">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat Instansi</label>
            <div class="input-group">
              <textarea type="password"  name="alamat_instansi" class="form-control" id="exampleInputPassword1"></textarea>
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

