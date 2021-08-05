<!DOCTYPE html>
<html>
<head>
	<title>CETAK KUITANSI</title>
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
				<td></td>
				<td>
				<center>
					<font size="4">PEMERINTAHAN KOTA TEGAL</font><br>
					<font size="5"><b>DINAS SOSIAL KOTA TEGAL</b></font><br>
					<font size="2"><i>Jl. Sipelem No.2, Pekauman, Kec. Tegal Barat, Kota Tegal, Jawa Tengah Kode Pos : 52112</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table >
			<tr>
				<td class="text2"></td>
                <td>
                    <center>
                        <font size="2">KUITANSI TANDA TERIMA</font><br>
                        <font size="2">PEMBERIAN DANA BANTUAN PENUNGGU PASIEN</font><br><BR>
                    </center>
                </td>
			</tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td>Nomor Kuitansi</td>
				<td >: K/PDBPP-00{{ $s->id }}</td>
			</tr>
            <tr>
				<td>Telah Terima Dari</td>
				<td >: Pemerintah Kota Tegal</td>
			</tr>
			<tr>
				<td>Uang Sejumlah</td>
				<td >: {{$s->jumlah_bantuan}}</td>
			</tr>
            <tr>
				<td>Untuk Pembayaran</td>
				<td >: Bantuan sosial bagi penunggu pasien ataas nama {{$s->nama}} untuk tanggal {{ \Carbon\Carbon::parse($s->awal_perawatan)->format('d-m-Y')}} s/d {{ \Carbon\Carbon::parse($s->akhir_perawatan)->format('d-m-Y')}}</td>
			</tr>
		</table>
		<br><br><br>
		<table >
			<tr>
				<td ><br><br><br><br></td>
				<td class="text" align="center">Yang Menerima, <br><br><br><br>{{ $s->nama }}</td>
			
				<td width="200"><br><br><br><br></td>
				<td class="text" align="center">Yang Menyerahkan, <br><br><br><br>SITI CAHYANI, S.Sos, M.Si</td>
			</tr>
	     </table>
		<!-- <table width="625">
            <tr>
				<td width="564"><br><br><br><br></td>
				<td class="text" align="center">Kepala Dinas<br><br><br><br>{{$s->nama}}</td>
			</tr>
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala Dinas<br><br><br><br>{{$s->nama}}</td>
			</tr>
	     </table> -->
	</center>
    @endforeach
    @if('status == cetak') {
		<script type="text/javascript">
			window.print();
		</script>
	}
	@endif
</body>
</html>