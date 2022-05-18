@extends('master')

@section('title-link','Beranda')
@section('sub-title-link','Data Pengguna')
@section('title','Data Pengguna')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card p-5 rounded mb-3">
                <button class="btn btn-outline-primary size-btn" onclick="addData()" data-toggle="modal" data-target="#modal-form">Tambah Data</button>
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPengguna as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->full_name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone_number}}</td>
                            <td>
                            <button type="button" data-target="#modal-form" data-toggle="modal" onclick="updateData('{{$row->id}}','{{$row->full_name}}','{{$row->email}}','{{$row->phone_number}}','{{$row->gender}}','{{$row->date_birth}}')" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></button>
                                <button type="button" data-target="#modal-delete" data-toggle="modal" onclick="deleteData('{{$row->id}}')" class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" id="form" action="/add-rekening">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fullName" value="{{old('fullName')}}" name="fullName" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" value="{{old('phoneNumber')}}" name="phoneNumber" placeholder="Nomor Telepon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthDate" value="{{old('birthDate')}}" name="birthDate" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" id="gender" value="{{old('gender')}}" name="gender">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" value="{{old('password')}}" name="password" placeholder="Password">
                            <p id="textPassword" class="mt-2">(Optional) kosongkan jika tidak ingin merubah password</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Ulangi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmPassword" value="{{old('confirmPassword')}}" name="confirmPassword" placeholder="Ulangi Password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="bg-navy rounded-modal" style="color: red;height:15px;"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Anda yakin ingin menghapus data tersebut?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <a id="btnDelete" type="submit" class="btn btn-primary">Hapus</a>
                </form>
            </div>
            <div class="bg-navy rounded-modal" style="color: red;height:15px;"></div>
        </div>
    </div>
</div>

<script>
    function addData(){
        document.getElementById("form").action = '/add-users';
        document.getElementById("titleModal").innerHTML = 'Tambah Pengguna';
        document.getElementById("fullName").value = ""
        document.getElementById("email").value = ""
        document.getElementById("phoneNumber").value = ""
        document.getElementById("birthDate").value = ""
        document.getElementById("gender").value = ""
        document.getElementById("password").value = ""
        document.getElementById("confirmPassword").value = ""
        document.getElementById("textPassword").hidden = true
        document.getElementById("email").readOnly = false
    }

    function updateData(id,fullName,email,phoneNumber,gender,birthDate){
        document.getElementById("form").action = `/update-users/${id}`;
        document.getElementById("titleModal").innerHTML = 'Perbarui Pengguna';
        document.getElementById("fullName").value = fullName
        document.getElementById("email").value = email
        document.getElementById("email").readOnly = true
        document.getElementById("phoneNumber").value = phoneNumber
        document.getElementById("birthDate").value = birthDate
        document.getElementById("gender").value = gender
        document.getElementById("password").value = ""
        document.getElementById("confirmPassword").value = ""
        document.getElementById("textPassword").hidden = false
    }

    function deleteData(id){
        document.getElementById('btnDelete').href= `/delete-users/${id}`;
    }
</script>
@endsection