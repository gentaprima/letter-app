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
                    <div class="d-flex align-items-center">
                        <div class="input-group">
                            <button id="pdf" class="btn btn-outline-primary size-btn">PDF</button>
                            <button id="excel" class="btn btn-outline-primary size-btn">EXCEL</button>
                            <button id="print" class="btn btn-outline-primary size-btn">PRINT</button>
                            <button data-toggle="modal" data-target="#modalFilter" onclick="filter()" type="button"
                                class="btn btn-outline-primary size-btn"><i class="fa fa-filter"></i> Filter</button>
                            <?php if($filter == true){ ?>
                            <a href="/dashboard/report/0" class="btn btn-outline-primary size-btn">Reset Filter</a>
                            <?php } ?>

                        </div>
                        
                        <div class="ms-md-auto d-flex">
                            <div class="input-group" style="margin-right: 10px;width:100%;z-index:1">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" id="searchBox" class="form-control" placeholder="Cari Data">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive p-0">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Surat
                                    </th>
                                    @if (Request::segment(3) == 0)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Terima</th>
                                    @else
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Surat</th>
                                    @endif
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kepada/Dari</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perihal
                                    </th>
                                    
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe
                                        Surat</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($letter as $row)
                                    <tr>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->no }}.</td>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->no_surat }}</td>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->tgl_terima }}</td>
                                        <td class="text-xs font-weight-bold mb-0">
                                            {{ Request::segment(3) == 1 ? $row->kepada :  'Kepala Sekolah - '.$row->id_instansi }}
                                        </td>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->perihal }}</td>
                                        <td class="text-xs font-weight-bold mb-0">
                                            {{ $row->type == 0 ? 'Surat Masuk' : 'Surat Keluar' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                </div>
                <div class="modal-body">
                    <form id="form-modal" method="get" action="">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Mulai</label>
                            <div class="input-group">
                                <span class="input-group-text text-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                    </svg>
                                </span>
                                <input type="date" name="startDate" class="form-control" id="exampleInputbirthDate1"
                                    aria-describedby="birthDateHelp" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Selesai</label>
                            <div class="input-group">
                                <span class="input-group-text text-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                    </svg>
                                </span>
                                <input type="date" name="endDate" class="form-control" id="exampleInputbirthDate1"
                                    aria-describedby="birthDateHelp" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" onclick="closeModal()" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Filter Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filter() {
            $('.modal-title').text('Filter Data')
            $('#modalFilter').modal('show')
            // $('#form-modal').attr('action','/dashboard/users')
        }
        $('#close').click(function() {
            $('#modalFilter').modal('hide')
        })
    </script>

@endsection
