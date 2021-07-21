<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>CETAK DATA PEMOHON</title>
</head>

<body>
<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pemohon</b></p><br>
        <table class='table table-bordered'>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>nohp</th>
                <th>email</th>
                <th>nama_pasien</th>
                <!-- <th>alamat_pasien</th> -->
                <th>kecamatan</th>
                <th>tanggal</th>
                <th>Awal Perawatan</th>
                <th>Akhir Perawatan</th>
                <!-- <th>Surat Permohonan</th>
                <th>SEP</th>
                <th>Surat Kuasa</th> -->
            </tr>

            @foreach ($penunggupasien as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->nik}}</td>
                    <td>{{$s->alamat_pemohon}}</td>
                    <td>{{$s->nohp}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{$s->nama_pasien}}</td>
                    <!-- <td>{{$s->alamat_pasien}}</td> -->
                    <td>{{$s->kecamatan}}</td>
                    <td>{{$s->tanggal}}</td>
                    <td>{{$s->awal_perawatan}}</td>
                    <td>{{$s->akhir_perawatan}}</td>
                    <!-- <td>{{$s->surat_permohonan}}</td>
                    <td>{{$s->sep}}</td>
                    <td>{{$s->surat_kuasa}}</td> -->
                    <!-- <td>{{$s->surat_keterangan}}</td> -->
                </tr>
            @endforeach

        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>