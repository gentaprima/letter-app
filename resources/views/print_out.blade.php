<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" initial-scale="1.0">

    <title>Kop Surat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        body {
            background: rgb(204, 204, 204);

            font-size: 18px;
            color: #000000;
        }

        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }

        page[size="A4"][layout="landscape"] {
            width: 29.7cm;
            height: 21cm;
        }

        header {
            padding-left: 70px;
            padding-top: 50px;
            padding-bottom: 0px;
        }

        img {
            width: 10%;
            position: absolute;
            z-index: 3;
        }

        government {
            font-size: 25px;
        }

        district {
            font-size: 35px;
        }

        adds {
            font-size: 14px;
        }

        intern {
            font-size: 20px;
            letter-spacing: 5px;
        }

        hr {
            border: 0;
            border-top: 5px double #000000;
            width: 80%;
        }

        .content {
            padding-left: 70px;
            padding-right: 70px;
            padding-bottom: 0;
        }

        .p-custom {
            text-align: justify;
            text-indent: 0.5in;
            line-height: 25px;
            font-size: 14px;
        }

        h3 {
            text-align: center;
            margin-top: 0;
        }

        .nomor {
            font-size: 18px;
        }

        td {
            padding-bottom: 10px;
        }

        .signature {
            padding-left: 70px;
            padding-right: 70px;
            padding-top: 5px;
        }

        .table-sign {
            /* display: inline-block; */
            text-align: center;
            font-size: 14px;
        }


        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            body,
            page {
                margin: 0;
                box-shadow: 0;
            }
        }
    </style>
</head>

<body>
    <page size="A4">
        <header>
            <img src="https://imgkub.com/images/2022/07/26/logo6cf18e0a4f23c843.jpg" alt="logo6cf18e0a4f23c843.jpg"
                border="0">
            <center>
                <label>
                    <government>
                        SMK Teratai Putih Global 2 Bekasi
                    </government>
                    <br>
                    <adds>
                        JI. Rajawali V JI. Anggrek Raya No.29, RT.005/RW.023,<br>
                        Kayuringin Jaya, Kec. Bekasi Sel., Kota Bks<br>
                        Telp (021) 8894749 </adds>
                </label>
            </center>
        </header>

        <hr>

        <div class="content">
            <h3><u>{{ Request::get('type') == 0 ? 'Detail Surat Masuk' : (Request::get('type') == 1 ? 'Detail Surat Keluar' : 'Disposisi Surat') }}</u>
            </h3>
            <center style="margin-top: -20px;">
                <label class="nomor"></label>
            </center>
            <br>
            <br>

            <table border="0" width="100%" style="font-size: 14px">
                @if (Request::get('type') == 0)
                    <tr>
                        <td>No. Surat Masuk</td>
                        <td>:</td>
                        <td>{{ $letter->no_surat }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Terima</td>
                        <td>:</td>
                        <td>{{ $letter->tgl_terima }}</td>
                    </tr>
                    <tr>
                        <td>Dari</td>
                        <td>:</td>
                        <td>{{ $letter->id_instansi }}</td>
                    </tr>
                    <tr>
                        <td>Kepada</td>
                        <td>:</td>
                        <td>Kepala Sekolah</td>
                    </tr>
                    <tr>
                        <td>Perihal Surat</td>
                        <td>:</td>
                        <td>{{ $letter->perihal }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Surat</td>
                        <td>:</td>
                        <td>{{ $letter->lampiran }}</td>
                    </tr>
                @endif

                @if (Request::get('type') == 1)
                    <tr>
                        <td>No. Surat Keluar</td>
                        <td>:</td>
                        <td>{{ $letter->no_surat }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>{{ $letter->tgl_terima }}</td>
                    </tr>
                    <tr>
                        <td>Perihal Surat</td>
                        <td>:</td>
                        <td>{{ $letter->perihal }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Surat</td>
                        <td>:</td>
                        <td>{{ $letter->lampiran }}</td>
                    </tr>
                @endif

                @if (Request::get('type') == 2)
                    <tr>
                        <td>No. Disposisi</td>
                        <td>:</td>
                        <td>sample</td>
                    </tr>
                    <tr>
                        <td>Kepada</td>
                        <td>:</td>
                        <td>sample</td>
                    </tr>
                    <tr>
                        <td>Evaluasi</td>
                        <td>:</td>
                        <td>sample</td>
                    </tr>
                    <tr>
                        <td>Jumlah Surat</td>
                        <td>:</td>
                        <td>sample</td>
                    </tr>
                    <tr>
                        <td>Tanggal Approve</td>
                        <td>:</td>
                        <td>sample</td>
                    </tr>
                    <tr>
                        <td>Status Approve</td>
                        <td>:</td>
                        <td>sample</td>
                    </tr>
                @endif
            </table>
        </div>
    </page>
</body>

</html>
