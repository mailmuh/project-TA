@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="header">
        <center>
            <h2>Detail Data Pemohon</h2>
        </center>
    </div>
    <div class="body">
        <div class="table-responsive">
            <table class="table table-bordered">
                @foreach ($penunggupasien as $p)
                    <tr>
                        <th width="25%">Nama</th>
                        <td>{{$p->nama}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Induk Kependudukan</th>
                        <td>{{$p->nik}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Pemohon</th>
                        <td>{{$p->alamat_pemohon}}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{$p->nohp}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$p->email}}</td>
                    </tr>
                    <tr>
                        <th>Nama Pasien</th>
                        <td>{{$p->nama_pasien}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Pasien</th>
                        <td>{{$p->alamat_pasien}}</td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td>{{$p->kecamatan}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{$p->tanggal}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Awal Perawatan</th>
                        <td>{{$p->awal_perawatan}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Akhir Perawatan</th>
                        <td>{{$p->akhir_perawatan}}</td>
                    </tr>
                    <tr>
                        <th>Nomor Surat Elegibilitas Peserta</th>
                        <td>{{$p->sep}}</td>
                    </tr>
                    <tr>
                        <th>Surat Permohonan</th>
                        <td>
                            @if($p->surat_permohonan!= NULL)
                                <img src="{{URL::to('/')}}/{{$p->surat_permohonan}}" class="mask waves-effect waves-light rgba-white-slight" height="100px" width="auto">
                            @else
                                <h5 style="color:red">Tidak ada Gambar</h5>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Surat Kuasa</th>
                        <td>

                            @if($p->surat_kuasa!= NULL)
                                <img src="{{URL::to('/')}}/{{$p->surat_kuasa}}" class="mask waves-effect waves-light rgba-white-slight" height="100px" width="auto">
                            @else
                                <h5 style="color:red">Tidak ada Gambar</h5>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th>Surat Keterangan</th>
                        <td>

                            @if($p->surat_keterangan!= NULL)
                                <img src="{{URL::to('/')}}/{{$p->surat_keterangan}}" class="mask waves-effect waves-light rgba-white-slight" height="100px" width="auto">
                            @else
                                <h5 style="color:red">Tidak ada Gambar</h5>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ route('penunggupasiens.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
        </div>
    </div>
</div>

@endsection