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
                        @if (session('users')->role === 0)
                            <div class="input-group">
                                <a class="btn btn-outline-primary size-btn"
                                    href="/dashboard/surat/tambah/{{ Request::segment(3) }}">Tambah Data</a>
                            </div>
                        @endif
                        <div class="ms-md-auto d-flex">
                            <div class="input-group" style="margin-right: 10px;width:100%;z-index:1">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input id="searchBox" type="text" class="form-control" placeholder="Cari Data">
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
                                        {{ Request::segment(3) == 1 ? 'Kepada' : 'Dari/Kepada' }}</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perihal
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah
                                        Surat</th>
                                    @if (Request::segment(3) == 1)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                    @endif
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($letter as $row)
                                    <tr>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->no }}.</td>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->no_surat }}</td>
                                        {{-- @if (Request::segment(3) == 0) --}}
                                            <td class="text-xs font-weight-bold mb-0">{{ $row->tgl_terima }}</td>
                                        {{-- @endif --}}
                                        <td class="text-xs font-weight-bold mb-0">
                                            {{ Request::segment(3) == 1 ? $row->kepada : 'Kepala Sekolah' }}
                                        </td>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->perihal }}</td>
                                        <td class="text-xs font-weight-bold mb-0">{{ $row->lampiran }}</td>
                                        @if (Request::segment(3) == 1)
                                            <td class="text-xs font-weight-bold mb-0">
                                                {{ $row->is_out_letter_approve == 1 ? 'Sudah Diapprove' : 'Belum Diapprove' }}
                                            </td>
                                        @endif
                                        <td class="text-xs font-weight-bold mb-0">
                                            {{-- <a href="#" onclick="edit({{$row->id}})"  style="margin-right:10px" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"> --}}
                                            {{-- Edit --}}
                                            {{-- </a> --}}

                                            <a href="/dashboard/surat/detail/{{ $row->id }}/{{ Request::segment(3) }}"
                                                style="margin-right:10px" class="text-success font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Lihat detail
                                            </a>
                                            <a href="/dashboard/surat/hapus/{{ $row->id }}"
                                                class="text-danger font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                Hapus
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-row ms-md-auto">
                        @if (!$letter->onFirstPage())
                            <a rel="prev" href="{{ $letter->previousPageUrl() }}" style="margin-right:20px"
                                class="btn btn-primary size-btn" data-toggle="modal" data-target="#modal-form">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg>
                                Previous
                            </a>
                        @else
                            <a rel="prev" style="margin-right:20px" class="btn btn-secondary size-btn"
                                data-toggle="modal" data-target="#modal-form">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg>
                                Previous
                            </a>
                        @endif
                        @if ($letter->hasMorePages())
                            <a href="{{ $letter->nextPageUrl() }}" rel="next" class="btn btn-primary size-btn"
                                data-toggle="modal" data-target="#modal-form">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-secondary size-btn" data-toggle="modal" data-target="#modal-form">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
