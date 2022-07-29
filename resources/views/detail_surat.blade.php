@extends('master')

@section('title-link', 'Beranda')
@section('sub-title-link', Request::segment(5) == 1 ? 'Detail Surat Keluar' : 'Detail Surat Masuk')
@section('title', Request::segment(5) == 1 ? 'Detail Surat Keluar' : 'Detail Surat Masuk')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card p-5 rounded mb-3">
                    <div class="form-group">
                        <div class="col-lg-12 d-flex justify-content-between">
                            <a href="/dashboard/report/output/surat/{{ $letter->id }}?type={{ Request::segment(5) }}"
                                id="printPDF" class="btn btn-primary">Print Surat</a>
                            <button id="view-pdf" class="btn btn-outline-primary">View PDF</button>
                        </div>
                        <div class="row">
                            <div class="col-lg-12  pb-4 col-sm-12 col-md-12">
                                <label for="exampleInputEmail1">No Surat</label>
                                <div class="input-group">
                                    <span style="z-index: 1" class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                            <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        </svg>
                                    </span>
                                    <input disabled value="{{ $letter->no_surat }}" required type="text" name="no_surat"
                                        class="form-control" id="exampleInputno_surat1" required
                                        aria-describedby="no_suratHelp" placeholder="Format : R/01/KP.01/VI/2022">
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">No Agenda</label>
                            <div class="input-group">
                              <span style="z-index: 1" class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                    <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"/>
                                  </svg>
                              </span>
                              <input disabled value="{{$letter->no_agenda}}" required type="number" name="no_agenda" class="form-control" id="exampleInputno_agenda1" aria-describedby="no_agendaHelp" placeholder="No Agenda">
                            </div>
                          </div> --}}

                            <div
                                class="{{ Request::segment(5) == 0 ? 'col-lg-6 col-md-6' : 'col-lg-12 col-md-12' }} pb-4 col-sm-12">
                                <label
                                    for="exampleInputEmail1">{{ Request::segment(5) == 0 ? 'Tanggal Terima' : 'Tanggal Surat' }}</label>
                                <div class="input-group">
                                    <span style="z-index: 1" class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        </svg>
                                    </span>
                                    <input disabled value="{{ $letter->tgl_terima }}" required type="date"
                                        name="tgl_terima" class="form-control" id="exampleInputtanggal_terima1"
                                        aria-describedby="tanggal_terimaHelp" placeholder="Tanggal Terima">
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 pb-4 col-sm-12 col-md-6">
                            <label for="exampleInputEmail1">Tanggal Surat</label>
                            <div class="input-group">
                              <span style="z-index: 1" class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                  </svg>
                              </span>
                              <input disabled value="{{$letter->tgl_surat}}" required type="date" name="tgl_surat" class="form-control" id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp" placeholder="Tanggal Surat">
                            </div>
                          </div> --}}
                            @if (Request::segment(5) == 0)
                                <div
                                    class="{{ Request::segment(5) == 1 ? 'col-lg-6' : 'col-lg-3' }} pb-4 col-sm-12 col-md-6">
                                    <label
                                        for="exampleInputEmail1">{{ Request::segment(5) == 1 ? 'Kepada' : 'Dari' }}</label>
                                    <div class="input-group">
                                        <input type="text" readonly class="form-control"
                                            value="{{ $letter->id_instansi }}">
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12  pb-4 col-sm-12 col-md-6">
                                    <label for="exampleInputEmail1">Kepada</label>
                                    <div class="input-group">
                                        <span style="z-index: 1" class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            </svg>
                                        </span>
                                        <input disabled
                                            value="{{ Request::segment(5) == 1 ? $letter->kepada : $letter->id_instansi . ' / ' . 'Kepala Sekolah' }}"
                                            required type="text" name="no_surat" class="form-control"
                                            id="exampleInputno_surat1" required aria-describedby="no_suratHelp"
                                            placeholder="Format : R/01/KP.01/VI/2022">
                                    </div>
                                </div>
                            @endif

                            @if (Request::segment(5) == 0)
                                <div class="col-lg-3 pb-4 col-sm-12 col-md-6">
                                    <label for="exampleInputEmail1">Kepada</label>
                                    <div class="input-group">
                                        {{-- <input required type="date" name="tanggal_surat" class="form-control" id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp" placeholder="Tanggal Surat"> --}}
                                        <input type="text" value="Kepala Sekolah" readonly id=""
                                            class="form-control">
                                        {{-- <select disabled class="form-select" name="id_users" aria-label="Default select example">
                                <option selected="">Pilih Data</option>
                                @foreach ($users as $user)
                                  <option value="{{$user->id}}" {{ $letter->id_users == $user->id ? 'selected' : '' }}  >{{$user->full_name." - ". $user->role}}</option>
                                @endforeach
                              </select> --}}
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12  pb-4 col-sm-12 col-md-12">
                                <label for="exampleInputEmail1">Perihal Surat</label>
                                <div class="input-group">
                                    <span style="z-index: 1" class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                            <path
                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                            <path
                                                d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </span>
                                    <textarea disabled rows="5" type="text" name="perihal" class="form-control" id="exampleInputperihal1"
                                        aria-describedby="perihalHelp" placeholder="Perihal Surat">{{ $letter->perihal }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                                <label for="exampleInputEmail1">Jumlah Surat</label>
                                <div class="input-group">
                                    <span style="z-index: 1" class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                            <path
                                                d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input disabled value="{{ $letter->lampiran }}" required id="number-photo"
                                        type="number" name="lampiran" class="form-control" id="exampleInputlampiran1"
                                        aria-describedby="no_agendaHelp" placeholder="Tekan Enter Jika Selesai">
                                </div>
                            </div>
                            @if (Request::segment(5) == 0)
                                <div class="col-lg-12">
                                    <label for="">Riwayat Tindak Lanjut</label>
                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    No</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Diteruskan Kepada</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Evaluasi</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tindak Lanjut</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tanggal</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tanggal Approve</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Response</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status Approve</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($eval as $e)
                                                <tr>
                                                    <td class="text-xs font-weight-bold mb-0">
                                                        {{ str_pad($i, 3, '0', STR_PAD_LEFT) . '/DS/' . str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                    <td class="text-xs font-weight-bold mb-0">
                                                        {{ $e->full_name . ' - ' . $e->role }}</td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $e->evaluasi }}</td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $e->tindak_lanjut }}</td>
                                                    <td class="text-xs font-weight-bold mb-0">{{ $e->tanggal }}</td>
                                                    <td class="text-xs font-weight-bold mb-0">
                                                        {{ $e->approve_date ?? '-' }}</td>
                                                    <td class="text-xs font-weight-bold mb-0">
                                                        {{ $e->response != null ? $e->response : 'Belum ada response' }}
                                                    </td>
                                                    <td class="text-xs font-weight-bold mb-0"><span
                                                            class="{{ $e->is_approve == 1 ? 'bg-success' : 'bg-warning' }} pt-1 pb-1 text-white"
                                                            style="padding-left: 10px;padding-right:10px;border-radius:5px">
                                                            {{ $e->is_approve == 1 ? 'Diteruskan Langsung' : 'Belum Ada Konfirmasi' }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="/dashboard/report/output/surat/{{ $e->id_eval }}?type=2"
                                                            style="margin-right:10px"
                                                            class="text-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                                                <path
                                                                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                            </svg>
                                                        </a>
                                                        @if ($e->response == null )                                                            
                                                        <button class="btn btn-link m-0 p-0" data-id="{{$e->id_eval}}" onclick="showModal('#responseModal',this)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                                            <path
                                                            d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                        </svg>
                                                    </button>
                                                    @endif
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            <?php $i = 1; ?>
                            @foreach ($letter->foto_lampiran as $foto)
                                <div class="col-lg-6  pb-4 col-sm-12 col-md-6">
                                    <label for="exampleInputEmail1">Lampiran {{ $i }}</label>
                                    <div class="input-group">
                                        <img width="80%" height="60%" src="{{ asset('uploads/' . $foto) }}"
                                            alt="">
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endforeach
                            <div class="content-upload row pb-3">
                            </div>

                            <input type="hidden" name="type" value="0">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                {{-- @if (Request::segment(5) == 0 && $isEval && $letter->isArsip <= 0)
                                  @endif --}}
                                {{-- @if ((session('users')->role == 0 && Request::segment(5) == 0 && $isEval > 0 && $isArsip <= 0) || (session('users')->role == 0 && $letter->is_out_letter_approve !== null && $letter->is_out_letter_approve && $isArsip <= 0))
                                    <button onclick="showArsip()" class="btn btn-success">Arsipkan</button>
                                @endif --}}
                                @if (session('users')->role == 4 && Request::segment(5) == 0 && $isArsip <= 0)
                                    <button onclick="add()" class="btn btn-primary">Disposisi</button>
                                @endif
                                @if (Request::segment(5) == 1 && session('users')->role == 4 && !$letter->is_out_letter_approve)
                                    {{-- <a href="/dashboard/surat/accept/{{ $letter->id }}" class="btn btn-primary">Approve
                                        Surat</a> --}}
                                        <button class="btn btn-primary" onclick="showModal('#approv-surat')">Approve Surat</button>
                                @endif
                                <a href="/dashboard/surat/{{ Request::segment(5) }}"
                                    class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
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
                    <iframe id="pdf-show" width="100%" height="500px"
                        src="{{ asset('uploads/' . $letter->soft_copy) }}" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal('#show-pdf-modal')"
                        class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="approv-surat" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Approve Surat</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <textarea rows="5" style="padding-left:10px !important" type="text" name="keterangan" class="form-control" id="exampleInputtindak_lanjut1" aria-describedby="tindak_lanjutHelp" placeholder="Keterangan"></textarea>
                    </div>
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
        function closeModal(id) {
            $(id).modal('hide')
        }
        $("#view-pdf").click(function() {
            $('#show-pdf-modal').modal('show')
        })

        function edit($id) {
            $('#addModal').modal('show')
            $('.modal-title').text('Edit Data')
            $('#form-modal').attr('action', '/dashboard/users/' + $id)
        }

        function add() {
            $('#addModal').modal('show')
        }

        function showArsip() {
            $('#arsipModal').modal('show')
        }
    </script>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Disposisi</h5>
                </div>
                <div class="modal-body">
                    <form id="form-modal" method="POST"
                        action="/dashboard/surat-masuk/disposisi/{{ Request::segment(4) }}">
                        <label for="exampleInputEmail1">Kepada</label>
                        <div class="input-group">
                            {{-- <input required type="date" name="tanggal_surat" class="form-control" id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp" placeholder="Tanggal Surat"> --}}
                            <select class="form-select" name="id_users" aria-label="Default select example">
                                <option selected="">Pilih Data</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->full_name . ' - ' . $user->role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="exampleInputEmail1">Evaluasi</label>
                        <div class="input-group">
                            <textarea rows="5" style="padding-left:10px !important" type="text" name="evaluasi" class="form-control"
                                id="exampleInputevaluasi1" aria-describedby="evaluasiHelp" placeholder="Evaluasi"></textarea>
                        </div>
                        <label for="exampleInputEmail1">Tindak Lanjut</label>
                        <div class="input-group">
                            <textarea rows="5" style="padding-left:10px !important" type="text" name="tindak_lanjut"
                                class="form-control" id="exampleInputtindak_lanjut1" aria-describedby="tindak_lanjutHelp"
                                placeholder="Tindak Lanjut"></textarea>
                        </div>
                        <label for="exampleInputEmail1">Keterangan Arsip</label>
                        <div class="input-group">
                            <textarea rows="5" style="padding-left:10px !important" type="text" name="keterangan" class="form-control"
                                id="exampleInputtindak_lanjut1" aria-describedby="tindak_lanjutHelp" placeholder="Keterangan"></textarea>
                        </div>
                        @csrf
                        <label for="exampleInputEmail1">Approval</label>
                        <div class="input-group">
                            <select class="form-select" name="approve" aria-label="Default select example">
                                <option selected="">Pilih Status Approval</option>
                                <option value="1">Langsung Diteruskan</option>
                                <option value="0">Tidak Langsung Diteruskan</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal('#addModal')" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Disposisikan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="surat-keluar-modal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Approve Surat Keluar</h5>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal('#show-pdf-modal')"
                        class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Kirim Response</h5>
                </div>
                <div class="modal-body">
                    <form id="form-modal" class="form-response" method="POST" action="">
                        <textarea name="response" class="form-control" id="" cols="30" rows="10"></textarea>
                        @csrf
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal('#responseModal')" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Response</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="arsipModal" tabindex="-1" role="dialog" aria-labelledby="arsipModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="arsipModalLabel">Arsipkan Surat</h5>
                </div>
                <div class="modal-body">
                    <form id="form-modal" method="POST" action="/dashboard/arsip">
                        <div class="col-lg-12 pb-4 col-sm-12 col-md-12">
                            <label for="exampleInputEmail1">Tanggal Arsip</label>
                            <div class="input-group">
                                <span style="z-index: 99" class="input-group-text text-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </span>
                                <input required type="date" name="tanggal_arsip" class="form-control"
                                    id="exampleInputtanggal_surat1" aria-describedby="tanggalSuratHelp"
                                    placeholder="Tanggal Arsip">
                            </div>
                        </div>
                        <input type="hidden" value="{{ Request::segment(4) }}" name="id_surat">

                        <div class="col-lg-12  pb-4 col-sm-12 col-md-12">
                            <label for="exampleInputEmail1">Keterangan Surat</label>
                            <div class="input-group">
                                <textarea style="padding-left: 10px !important" rows="5" type="text" name="keterangan"
                                    class="form-control" id="exampleInputketerangan1" aria-describedby="keteranganHelp"
                                    placeholder="Keterangan Surat"></textarea>
                            </div>
                        </div>
                        @csrf

                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal('#arsipModal')" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Arsipkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
