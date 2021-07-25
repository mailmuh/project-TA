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
    <center>
    <table>
			<tr>
				<td><img src="{{asset('assets/images/dinsos.png')}}" width="110" height="90"></td>
				<td>
				<center>
					<font size="4">PEMERINTAHAN KOTA TEGAL</font><br>
					<font size="5"><b>DINAS SOSIAL KOTA TEGAL</b></font><br>
					{{-- <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br> --}}
					<font size="2"><i>Jl. Sipelem No.2, Pekauman, Kec. Tegal Barat, Kota Tegal, Jawa Tengah Kode Pos : 52112</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table width="625">
    </center>
        <p align="center"><b>Laporan Data Pemohon</b></p><br>
        <table class="table table-bordered">
            <thead class="thead-dark">
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
            </thead>
            @foreach($penunggupasien as $penunggupasien)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$penunggupasien->nama}}</td>
                    <td>{{$penunggupasien->nik}}</td>
                    <td>{{$penunggupasien->alamat_pemohon}}</td>
                    <td>{{$penunggupasien->nohp}}</td>
                    <td>{{$penunggupasien->email}}</td>
                    <td>{{$penunggupasien->nama_pasien}}</td>
                    <td>{{$penunggupasien->kecamatan}}</td>
                    <td>{{$penunggupasien->tanggal}}</td>
                    <td>{{$penunggupasien->awal_perawatan}}</td>
                    <td>{{$penunggupasien->akhir_perawatan}}</td>

                </tr>
                
            @endforeach        

        </table>

        <br><br><br>
		<table width="625">
			<tr>			
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Dinas Sosial Kota Tegal, <br><br><br><br>Dyah Kemala Sintha, SH., MH</td>
			</tr>
	     </table>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>