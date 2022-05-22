@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Data Surat Keluar')
@section('title','Data Surat Keluar')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card p-5 rounded mb-3">
                 <div class="d-flex">
                       <button class="btn btn-outline-primary size-btn" onclick="addData()" data-toggle="modal" data-target="#modal-form">Tambah Data</button>
                       
                       <div class="ms-md-auto pe-md-5 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Cari Data">
                        </div>
                       </div>
                 </div>                        
                 <table id="example1" class="table table-striped">
                  <thead>
                      <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      {{-- @foreach($dataPengguna as $row) --}}
                      <tr>
                          <td class="text-xs font-weight-bold mb-0">1.</td>
                          <td class="text-xs font-weight-bold mb-0">
                            <a href="#" {{--onclick="edit({{$row->id}})" --}} style="margin-right:10px" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Edit
                            </a>                    

                            <a {{-- href="/dashboard/users/{{ $row->id}} "--}} class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Delete
                            </a>                                               
                          </td>
                      </tr>
                      {{-- @endforeach --}}
                    </tbody>
                  </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $('#delete-data').click(function(){
        console.log("oke");
    })
</script>
@endsection

