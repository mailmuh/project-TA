@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Detail Data Pemohon "{{ $pembayaran->nik }}"</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PEMOHON</label>
                                        <input type="text" name="nama" placeholder="Masukan Nama Pemohon" value="{{ $pembayaran->nama }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK PEMOHON</label>
                                        <input type="text" name="nik" placeholder="Masukan NIK Pemohon" value="{{ $pembayaran->nik }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" value="{{ $pembayaran->nohp }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PEMOHON</label>
                                        <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" value="{{ $pembayaran->alamat_pemohon }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PASIEN</label>
                                        <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" value="{{ $pembayaran->nama_pasien }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KTP PASIEN</label>
                                        <input type="text" name="ktp_pasien" placeholder="Masukan KTP Pasien" value="{{ $pembayaran->ktp_pasien }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>JUMLAH DANA BANTUAN</label>
                                        <input type="text" name="jumlah_bantuan" placeholder="Masukan Jumlah Dana Bantuan" value="{{ $pembayaran->jumlah_bantuan }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ route('pembayarans.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection