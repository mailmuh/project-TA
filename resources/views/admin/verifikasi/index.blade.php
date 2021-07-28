@extends('admin.layouts.app')

@section('content')
<div class="card">
        @if(Session::has('success'))
    <div class="alert alert-success">
        <strong>Success: </strong>{{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert">×</button> 
    </div>
@endif
    <div class="card">
        <div class="header">
            <center>
                <h2> Data Verifikasi </h2>
            </center>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another action</a></li>
                        <li><a href="javascript:void(0);">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="block-header">
                <!-- <a href="/cetak-laporan-form" class="btn bg-purple waves-effect m-r-20">Cetak Data</a> -->
                <!-- <a href="/cetak-laporan-formkecamatan" class="btn bg-purple waves-effect m-r-20" >Cetak Data Kecamatan</a> -->

                <a class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#tambahklasifikasi">Cetak Data</a>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>                            
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nomor Hp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($verifikasi as $d => $verifikasi)
                            <tr>
                                <td>{{ $d+1 }}</td>
                                <td>{{ $verifikasi->nama }}</td>
                                <td>{{ $verifikasi->nik }}</td>
                                <!-- <td>{{ \Carbon\Carbon::parse($verifikasi->tanggal)->format('d-m-Y')}}</td> -->
                                <td>{{ $verifikasi->nohp }}</td>
                                <td>{{ $verifikasi->alamat_pemohon }}</td>
                                <!-- <td>
                                    @if($verifikasi->surat_keterangan!= NULL)
                                       <img src="{{ asset($verifikasi->surat_keterangan) }}" class="mask waves-effect waves-light rgba-white-slight" height="85px" width="85px" width="auto">
                                    @else
                                        <h5 style="color:red">Tidak ada Gambar</h5>
                                    @endif 
                                </td> -->
                                <td>{{ $verifikasi->keterangan }}</td>
                                <td class="text-align:center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('verifikasi.destroyVerifikasi', $verifikasi->id) }}"method="POST">
                                        <!-- <a href="{{ route('penunggupasiens.edit', $verifikasi->id) }}" class="btn btn-sm btn-primary">Show</a> -->
                                        <a href="{{ route('verifikasi.detail', $verifikasi->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ url('kirim-wa', $verifikasi->id) }}" class="btn btn-sm btn-primary" target="_blank">Kirim Notif</a>
                                        <!-- <a href="{{ route('pembayarans.edit', $verifikasi->id) }}" class="btn btn-sm btn-success">Pembayaran</a> -->
                                        <!-- <a href="" class="btn btn-sm btn-primary">Edit</a> -->
                                        <!-- <a href="{{ route('penunggupasiens.show', $verifikasi->id) }}" class="btn btn-sm btn-success waves-effect m-r-20">Show</a>
 -->                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger waves-effect m-r-20">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--modal Verifikasi-->
    <div class="modal fade" id="tambahklasifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Cetak Data Pemohon </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action=" /cetak-laporan-filter " method="post" autocomplete="off" >
                        {{csrf_field()}}
                        <!-- filter kecamatan -->
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label class="form-label">PILIH KECAMATAN</label></br>
                                <select name="kecamatan" id="kecamatan" class="custom-select my-1 mr-sm-2 bg-light" required>
                                <option selected disabled>-- Pilih Kecamatan --</option>
                                    <option value="Margadana">Margadana</option>
                                    <option value="Tegal Barat">Tegal Barat</option>
                                    <option value="Tegal Selatan">Tegal Selatan</option>
                                    <option value="Tegal Timur">Tegal Timur</option>
                                </select>
                            </div>
                        </div>
                        <!-- filter tanggal -->
                        <br><br><div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="label">Tanggal Awal :</label>
                                        <input type="date" name="tglawal" id="tglawal" class="form-control bg-light " required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="label">Tanggal Akhir :</label>
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control bg-light" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end filter tanggal -->

                        <hr>
                        <button type="submit" class="button btn btn-success btn-sm" target="_blank"><i class="fas fa-save"></i>CETAK</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="fas fa"></i>
                            BATAL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
