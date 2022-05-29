@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Data Pengguna')
@section('title','Data Pengguna')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card p-5 rounded mb-3">
              <div class="d-flex d-flex align-items-center">
                <button class="btn btn-outline-primary size-btn" onclick="add()" data-toggle="modal" data-target="#modal-form">Tambah Data</button>
                <div class="ms-md-auto d-flex">
                  <div class="input-group" style="margin-right: 10px;width:100%">
                    <span style="z-index: 1" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input id="searchBox" type="text" class="form-control" placeholder="Cari Data">
                  </div>
                </div>
              </div>                        
              <div class="table-responsive p-0">
              <table id="table" class="table table-striped">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPengguna as $row)
                        <tr>
                            <td class="text-xs font-weight-bold mb-0">{{$loop->iteration}}.</td>
                            <td class="text-xs font-weight-bold mb-0">{{$row->full_name}}</td>
                            <td class="text-xs font-weight-bold mb-0">{{$row->email}}</td>
                            <td class="text-xs font-weight-bold mb-0">{{$row->phone_number}}</td>
                            <td class="text-xs font-weight-bold mb-0">
                              <a href="#" onclick="edit({{$row->id}})" style="margin-right:10px" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                              </a>                    
                              <a href="/dashboard/users/{{ $row->id}} " class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Delete
                              </a>                            
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
                    <div class="d-flex flex-row ms-md-auto">
                      @if (!$dataPengguna->onFirstPage())
                      <a rel="prev" href="{{ $dataPengguna-previousPageUrl() }}" style="margin-right:20px" class="text-xs btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
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
                      @if($dataPengguna->hasMorePages())
                      <a href="{{ $dataPengguna->nextPageUrl() }}" rel="next" class="btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
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
<script>
  function closeModal(){
    $('#addModal').modal('hide')
  }
  function edit($id){
      $('#addModal').modal('show')
      $('.modal-title').text('Edit Data')
      $('#form-modal').attr('action','/dashboard/users/'+$id)
  }
  function add(){
    $('.modal-title').text('Tambah Data')
    $('#addModal').modal('show')
    $('#form-modal').attr('action','/dashboard/users')
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
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              </span>
              <input type="text" name="fullName" class="form-control" id="exampleInputfullName1" aria-describedby="fullNameHelp" placeholder="Nama Lengkap">
            </div>
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <div class="input-group">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                </svg>
              </span>
              <input type="text" name="email" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Nomor Telepon</label>
            <div class="input-group">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
              </span>
              <input type="phone" name="phoneNumber" class="form-control" id="exampleInputphoneNumber1" aria-describedby="phoneNumberHelp" placeholder="Nomor Telepon">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <div class="input-group">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
              </span>
              <input type="password" name="password" class="form-control" id="exampleInputpassword1" aria-describedby="passwordHelp" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Konfirmasi Password</label>
            <div class="input-group">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
              </span>
              <input type="password" name="confirmPassword" class="form-control" id="exampleInputconfirmPassword1" aria-describedby="confirmPasswordHelp" placeholder="Konfirmasi Password">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Lahir</label>
            <div class="input-group">
              <span class="input-group-text text-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                </svg>
              </span>
              <input type="date" name="birthDate" class="form-control" id="exampleInputbirthDate1" aria-describedby="birthDateHelp" placeholder="Tanggal Lahir">
            </div>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <div class="input-group">
              <div class="form-check form-check-inline">
                <input name="gender" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0">
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="gender" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>   
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <div class="input-group">
              <select class="form-select" name="role" aria-label="Default select example">
                <option selected>Pilih Role</option>
                <option value="0">Admin</option>
                <option value="1">Waka Kesiswaan</option>
                <option value="2">Waka Kurikulum</option>
                <option value="3">Waka Hubin</option>
                <option value="4">Kepala Sekolah</option>
              </select>
            </div>
          </div>
          
        @csrf
        </div>
        <div class="modal-footer">
          <button type="button" id="close" onclick="closeModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  
</script>
@endsection

