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
                    <div class="form-group">
                        <form action="/dashboard/surat/tambah/{{Request::segment(4)}}" method="POST"  enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6  pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">No Surat</label>
                            <div class="input-group">
                              <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                                    <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                                    <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                  </svg>
                              </span>
                              <input required type="text" name="no_surat" class="form-control" id="exampleInputno_surat1" required aria-describedby="no_suratHelp" placeholder="Format : R/01/KP.01/VI/2022">
                            </div>
                          </div>          
                          <div class="col-lg-6 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">No Agenda</label>
                            <div class="input-group">
                              <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                    <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"/>
                                  </svg>
                              </span>
                              <input required type="number" name="no_agenda" class="form-control" id="exampleInputno_agenda1" aria-describedby="no_agendaHelp" placeholder="No Agenda">
                            </div>
                          </div>          
                          <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">Tanggal Terima</label>
                            <div class="input-group">
                              <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                  </svg>
                              </span>
                              <input required type="date" name="tgl_terima" class="form-control" id="exampleInputtanggal_terima1" aria-describedby="tanggal_terimaHelp" placeholder="Tanggal Terima">
                            </div>
                          </div>          
                          <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">Tanggal Surat</label>
                            <div class="input-group">
                              <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                  </svg>
                              </span>
                              <input required type="date" name="tgl_surat" class="form-control" id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp" placeholder="Tanggal Surat">
                            </div>
                          </div>         
                          @if(Request::segment(4) == 0) 
                          <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">Dari</label>
                            <div class="input-group">
                              <select class="form-select" name="id_instansi" aria-label="Default select example">
                                <option selected="">Pilih Data</option>
                                @foreach($instance as $ins)
                                    <option value="{{$ins->id}}">{{$ins->nama_instansi}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>  
                          @endif       
                          <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">Kepada</label>
                            <div class="input-group">
                              {{-- <input required type="date" name="tanggal_surat" class="form-control" id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp" placeholder="Tanggal Surat"> --}}
                                  <select class="form-select" name="id_users" aria-label="Default select example">
                                    <option selected="">Pilih Data</option>
                                    @foreach($users as $user)
                                      <option value="{{$user->id}}">{{$user->full_name." - ". $user->role}}</option>
                                    @endforeach
                                  </select>
                            </div>
                          </div>
                          <div class="col-lg-12  pb-4 col-sm-12 col-md-12">
                            <label for="exampleInputEmail1">Perihal Surat</label>
                            <div class="input-group">
                              <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                  </svg>
                              </span>
                              <textarea rows="5" type="text" name="perihal" class="form-control" id="exampleInputperihal1" aria-describedby="perihalHelp" placeholder="Perihal Surat"></textarea>
                            </div>
                          </div>        
                          <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                            <label for="exampleInputEmail1">Jumlah Lampiran</label>
                            <div class="input-group">
                              <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                    <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"></path>
                                  </svg>
                              </span>
                              <input required id="number-photo" type="number" name="lampiran" class="form-control" id="exampleInputlampiran1" aria-describedby="no_agendaHelp" placeholder="Tekan Enter Jika Selesai">
                            </div>
                            <div class="content-upload row pb-3">
  
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/dashboard/surat-masuk" class="btn btn-secondary">Kembali</a>
                          </div>
                      </div>
                        </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $('#number-photo').on('keypress',function(e){
         $('.content-upload').empty()
         var number = $('#number-photo').val()
      if(e.which == 13) {
        for(i =1 ; i <=number;i++){
        var form = ' <div class="col-lg-6 pt-2 pb-4 col-sm-12 col-md-6">'+
                    '<label for="exampleInputEmail1">Lampiran '+i+'</label>'+
                    '<div class="input-group">'+
                    '<span class="input-group-text text-body">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-break-fill" viewBox="0 0 16 16">'+
                    '<path d="M4 0h8a2 2 0 0 1 2 2v7H2V2a2 2 0 0 1 2-2zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>'+
                    '</svg>'+
                    '</span>'+
                    '<input required id="lamp-photo" type="file" name="foto_lampiran[]" class="form-control" id="exampleInputfoto_lampiran1" aria-describedby="foto_lampirandaHelp" placeholder="Tekan Enter Jika Selesai">'+
                    '</div></div>'
        $('.content-upload').append(form)
                }
      }
    });

</script>
@endsection

