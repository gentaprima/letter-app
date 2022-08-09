@extends('master')

@section('title-link', 'Beranda')
@section('sub-title-link', $title)
@section('title', $title)

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card p-5 rounded mb-3">
                    <div class="form-group">
                        <form action="/dashboard/surat/tambah/{{ Request::segment(4) }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 pb-4 col-sm-10 col-md-12">
                                    <label for="exampleInputEmail1">Upload Softcopy</label>
                                    <div class="input-group">
                                        <span style="z-index: 10" class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.035 21.035 0 0 0 .5-1.05 11.96 11.96 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.888 3.888 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 4.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                <path fill-rule="evenodd"
                                                    d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.64 11.64 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.707 19.707 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                            </svg>
                                        </span>
                                        <input type="file" accept="pdf/*" name="soft_copy" class="form-control"
                                            id="pdfInput" required aria-describedby="no_suratHelp">
                                        <button id="view-pdf" class="btn btn-primary p-0 px-3 m-0" type="button">View
                                            PDF</button>
                                    </div>
                                </div>
                                @if (Request::segment(4) == 0)
                                    <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                                        <label for="exampleInputEmail1">Sumber Surat</label>
                                        <div class="input-group">
                                            <select class="form-select" id="sumber" aria-label="Default select example">
                                                <option selected>---Pilih Sumber---</option>
                                                <option value="01">Yayasan</option>
                                                <option value="02">Dinas</option>
                                                <option value="03">Ormas</option>
                                                <option value="04">Instansi</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                                    <label for="exampleInputEmail1">No Surat
                                        {{ Request::segment(4) == 0 ? 'Masuk' : 'Keluar' }}</label>
                                    <div class="input-group">
                                        <span style="z-index: 10" class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            </svg>
                                        </span>
                                        <input readonly
                                            value="{{ str_pad($last_id, 3, '0', STR_PAD_LEFT) }}/100.{{ Request::segment(4) == 0 ? '1' : '2' }}/00/SMK-TPG2/{{ $month }}/{{ date('Y') }}"
                                            required type="text" name="no_surat" class="form-control" id="no_surat"
                                            id="exampleInputno_surat1" required aria-describedby="no_suratHelp"
                                            placeholder="Format : R/01/KP.01/VI/2022">
                                    </div>
                                </div>


                                @if (Request::segment(4) == 1)
                                    <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                                        <label for="exampleInputEmail1">Ditujukkan</label>
                                        <div class="input-group">
                                            <span style="z-index: 10" class="input-group-text text-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path class="color-background"
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                    </path>
                                                    <path class="color-background" fill-rule="evenodd"
                                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z">
                                                    </path>
                                                    <path class="color-background"
                                                        d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"></path>
                                                </svg>
                                            </span>
                                            <input required type="text" name="kepada" class="form-control"
                                                id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp"
                                                placeholder="Ditujukkan Kepada">
                                        </div>
                                    </div>
                                @endif
                                <div
                                    class="{{ Request::segment(4) == 0 ? 'col-lg-6 col-md-6' : 'col-lg-12 col-md-12' }} pb-4 col-sm-12">
                                    <label
                                        for="exampleInputEmail1">{{ Request::segment(4) == 0 ? 'Tanggal Terima' : 'Tanggal Surat' }}</label>
                                    <div class="input-group">
                                        <span style="z-index: 10" class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                        </span>
                                        <input readonly value="{{ date('Y-m-d') }}" required name="tgl_terima"
                                            class="form-control" id="exampleInputtanggal_terima1"
                                            aria-describedby="tanggal_terimaHelp" placeholder="Tanggal Terima">
                                    </div>
                                </div>

                                @if (Request::segment(4) == 0)
                                    <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                                        <label for="exampleInputEmail1"> Dari</label>
                                        <div class="input-group">
                                            {{-- <select class="form-select" name="id_instansi" aria-label="Default select example">
                                <option selected="">Pilih Data</option>
                                @foreach ($instance as $ins)
                                    <option value="{{$ins->id}}">{{$ins->nama_instansi}}</option>
                                @endforeach
                              </select> --}}
                                            <input type="text" name="id_instansi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                                        <label for="exampleInputEmail1">Kepada</label>
                                        <div class="input-group">
                                            {{-- <select class="form-select" name="id_users" aria-label="Default select example">
                                <option selected="">Pilih Data</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->full_name." - ". $user->role}}</option>
                                @endforeach
                              </select> --}}
                                            <input type="text" class="form-control" value="Kepala Sekolah" readonly>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12  pb-4 col-sm-12 col-md-12">
                                    <label for="exampleInputEmail1">Perihal Surat</label>
                                    <div class="input-group">
                                        <span style="z-index: 10" class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                <path
                                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                <path
                                                    d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                        </span>
                                        <textarea rows="5" type="text" name="perihal" class="form-control" id="exampleInputperihal1"
                                            aria-describedby="perihalHelp" placeholder="Perihal Surat"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                                    <label for="exampleInputEmail1">Jumlah Surat</label>
                                    <div class="input-group">
                                        <span style="z-index: 10" class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input required id="number-photo" type="number" name="lampiran"
                                            class="form-control" id="exampleInputlampiran1"
                                            aria-describedby="no_agendaHelp" placeholder="Tekan Enter Jika Selesai">
                                    </div>
                                    <div class="content-upload row pb-3">

                                    </div>
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard/surat/{{ Request::segment(4) }}"
                                        class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div class="modal fade" id="show-pdf-modal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">View PDF</h5>
                </div>
                <div class="modal-body">
                    <iframe id="pdf-show" width="100%" height="500px" src="" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function closeModal() {
            $('#show-pdf-modal').modal('hide')
        }
        $('#sumber').on('change', function() {
            noSurat = $("#no_surat").val();
            noSurat = noSurat.split("/");
            noSurat = noSurat[0] + "/" + noSurat[1] + "/" + this.value + "/" + noSurat[3] + "/" + noSurat[4] + "/" +
                noSurat[5]
            $("#no_surat").val(noSurat)
        });
        $("#view-pdf").click(function() {
            var file = $("#pdfInput")[0].files[0]
            var url = URL.createObjectURL(file);
            $('#pdf-show').attr('src', url);
            $('#show-pdf-modal').modal('show')
        })
        $('#number-photo').on('keypress', function(e) {
            $('.content-upload').empty()
            var number = $('#number-photo').val()
            if (e.which == 13) {
                for (i = 1; i <= number; i++) {
                    var form = ' <div class="col-lg-6 pt-2 pb-4 col-sm-12 col-md-6">' +
                        '<label for="exampleInputEmail1">Lampiran ' + i + '</label>' +
                        '<div class="input-group">' +
                        '<span style="z-index: 10" class="input-group-text text-body">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-break-fill" viewBox="0 0 16 16">' +
                        '<path d="M4 0h8a2 2 0 0 1 2 2v7H2V2a2 2 0 0 1 2-2zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>' +
                        '</svg>' +
                        '</span>' +
                        '<input required id="lamp-photo" type="file" name="foto_lampiran[]" class="form-control" id="exampleInputfoto_lampiran1" aria-describedby="foto_lampirandaHelp" placeholder="Tekan Enter Jika Selesai">' +
                        '</div></div>'
                    $('.content-upload').append(form)
                }
            }
        });
    </script>
@endsection
