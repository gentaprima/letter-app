<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        App
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.5') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
        id="sidenav-main" style="z-index: 1">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            {{-- <a class="navbar-brand m-0" href="/dashboard" >
        <span class="ms-4 font-weight-bold"><img src="{{asset('logo1.png')}}" alt="">PENGARSIPAN SURAT</span>
      </a> --}}
            <a class="navbar-brand m-0" href="/dashboard" target="_blank">
                <img src="{{ asset('logo1.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 mb-5 font-weight-bold">Pengarsipan Surat</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/dashboard/beranda"
                        class="nav-link {{ Request::is('dashboard/beranda') || Request::is('dashboard') ? 'active' : '' }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Dashboard</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('dashboard/arsip') ? 'active' : '' }}" href="/dashboard/arsip">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path class="color-background"
                                    d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Arsip Surat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('dashboard/surat/0') || Request::is('dashboard/surat/tambah/0') ? 'active' : '' }}"
                        href="/dashboard/surat/0">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path class="color-background"
                                    d="M9 8.5h2.793l.853.854A.5.5 0 0 0 13 9.5h1a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5H9v1z" />
                                <path class="color-background"
                                    d="M12 3H4a4 4 0 0 0-4 4v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7a4 4 0 0 0-4-4zM8 7a3.99 3.99 0 0 0-1.354-3H12a3 3 0 0 1 3 3v6H8V7zm-3.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0c0 .334-.164.264-.415.157z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Surat Masuk</span>
                    </a>
                </li>
                @if(session('users')['role'] == 0 || session('users')['role'] == 4 )
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('dashboard/surat/1') || Request::is('dashboard/surat/tambah/1') ? 'active' : '' }}"
                        href="/dashboard/surat/1">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send-check-fill" viewBox="0 0 16 16">
                                <path class="color-background"
                                    d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                <path class="color-background"
                                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Surat Keluar</span>
                    </a>
                </li>
                @endif
                @if (session('users')['role'] == 0 || session('users')['role'] == 4)
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('dashboard/instansi') ? 'active' : '' }}"
                            href="/dashboard/instansi">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>office</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g id="office" transform="translate(153.000000, 2.000000)">
                                                    <path class="color-background opacity-6"
                                                        d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                    </path>
                                                    <path class="color-background"
                                                        d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Data Instansi</span>
                        </a>
                    </li>
                @endif
                @if (session('users')['role'] == 0 || session('users')['role'] == 4)
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/report/0') ? 'active' : '' }} "
                            href="/dashboard/report/0">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                    <path class="color-background"
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z" />
                                </svg>

                            </div>
                            <span class="nav-link-text ms-1">Surat Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/report/1') ? 'active' : '' }} "
                            href="/dashboard/report/1">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
                                    <path class="color-background"
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Surat Keluar</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengguna</h6>
                </li>
                @if (session('users')['role'] == 0 || session('users')['role'] == 4)
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('dashboard/data-pengguna') ? 'active' : '' }}"
                            href="/dashboard/data-pengguna">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path class="color-background"
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path class="color-background" fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path class="color-background" d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Petugas</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#" id="edit-akun">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/users/auth/logout">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>spaceship</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(4.000000, 301.000000)">
                                                <path class="color-background"
                                                    d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            {{-- <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
        
        </div>
      </div> --}}
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('title')</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    {{-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div> --}}
                    <ul class="navbar-nav ms-md-auto justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ session('users')->full_name }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @if (Session::has('message'))
            <p hidden="true" id="message">{{ Session::get('message') }}</p>
            <p hidden="true" id="icon">{{ Session::get('icon') }}</p>
            <p hidden="true" id="title">{{ Session::get('title') }}</p>
        @endif
        @yield('content')
    </main>

    <script>
        $(document).ready(function() {
            $('#edit-akun').click(function() {
                $('#modalAkun').modal('show');
            })
            $('#closemodal').click(function() {
                $('#modalAkun').modal('hide');
            })
            table = $('#table').DataTable({
                paging: false,
                ordering: false,
                info: false,
                searching: true,
                dom: 'lrt',
                "buttons": ['excelHtml5', 'print', 'pdfHtml5']

            });
            $('table').removeClass('dataTable')
            $('table').removeClass('no-footer')
            $('#searchBox').keyup(function() {
                table.search($(this).val()).draw();
            });
            $('#pdf').click(function() {
                table.buttons(0, 2).trigger()
            });
            $('#excel').click(function() {
                table.buttons(0, 0).trigger()
            })
            $('#print').click(function() {
                table.buttons(0, 1).trigger()
            })
        });
    </script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        let icon = document.getElementById('icon');
        let title = document.getElementById('title');
        if (icon != null) {
            let message = document.getElementById('message');
            swal({
                title: title.innerHTML,
                text: message.innerHTML,
                icon: icon.innerHTML,
            });
        }
    </script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
</body>
<div class="modal fade" id="modalAkun" tabindex="-1" role="dialog" aria-labelledby="modalAkunLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAkunLabel">Akun Anda</h5>
            </div>
            <div class="modal-body">
                <form id="form-modal" method="POST" action="/dashboard/users/{{ Session::get('users')->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </span>
                            <input value="{{ Session::get('users')->full_name }}" type="text" name="fullName"
                                class="form-control" id="exampleInputfullName1" aria-describedby="fullNameHelp"
                                placeholder="Nama Lengkap">

                            <input value="{{ Session::get('users')->role }}" type="hidden" name="role"
                                class="form-control" id="exampleInputrole1" aria-describedby="roleHelp"
                                placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <div class="input-group">
                            <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                            </span>
                            <input value="{{ Session::get('users')->email }}" type="text" name="email"
                                class="form-control" id="exampleInputemail1" aria-describedby="emailHelp"
                                placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Telepon</label>
                        <div class="input-group">
                            <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                            </span>
                            <input value="{{ Session::get('users')->phone_number }}" type="phone" name="phoneNumber"
                                class="form-control" id="exampleInputphoneNumber1" aria-describedby="phoneNumberHelp"
                                placeholder="Nomor Telepon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                            </span>
                            <input value="{{ Session::get('users')->date_birth }}" type="date" name="birthDate"
                                class="form-control" id="exampleInputbirthDate1" aria-describedby="birthDateHelp"
                                placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <div class="input-group">
                            <div class="form-check form-check-inline">
                                <input name="gender" {{ Session::get('users')->gender == 0 ? 'checked' : '' }}
                                    class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="0">
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="gender" {{ Session::get('users')->gender == 1 ? 'checked' : '' }}
                                    class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    @csrf
            </div>
            <div class="modal-footer">
                <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
