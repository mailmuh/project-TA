<!DOCTYPE html>
<html>
<head>
	<title>CETAK SURAT</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}
	</style>
</head>
<body>
    @foreach($pembayaran as $s)
	<center>
		<table>
			<tr>
				<!-- <td><img src="https://disdukcapil.tegalkab.go.id/pelayanan/assets/img/kab/3328.png" width="90" height="90"></td> -->
				<td>
				<center>
					<font size="4">PEMERINTAHAN KOTA TEGAL</font><br>
					<font size="5"><b>DINAS SOSIAL KOTA TEGAL</b></font><br>
					{{-- <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br> --}}
					<font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table width="625">
			<tr>
				<!-- <td class="text2">{{$s->tempat_surat}}, {{$s->tgl_surat}}</td> -->
                <td>
                    <center>
                        <font size="2">KUITANSI TANDA TERIMA</font><br>
                        <font size="2">PEMBERIAN DANA BANTUAN PENUNGGU PASIEN</font><br>
                    </center>
                </td>
			</tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td>Nomor</td>
				<td width="572">: {{ $s->id }}</td>
			</tr>
            <tr>
				<td>Uang Sebanyak</td>
				<td width="564">: Pemerintah Kota Tegal</td>
			</tr>
			<tr>
				<td>Uang Sebanyak</td>
				<td width="564">: {{$s->jumlah_bantuan}}</td>
			</tr>
            <tr>
				<td>Untuk Pembayaran</td>
				<td width="564">: Bantuan sosial bagi penunggu pasien ataas nama {{$s->nama}} untuk tanggal {{$s->nik}} s/d {{$s->nik}}</td>
			</tr>
		</table>
		<br>
		<table width="625">
            <tr>
				<td width="564"><br><br><br><br></td>
				<td class="text" align="center">Kepala Dinas<br><br><br><br>{{$s->nama}}</td>
			</tr>
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala Dinas<br><br><br><br>{{$s->nama}}</td>
			</tr>
	     </table>
	</center>
    @endforeach
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>