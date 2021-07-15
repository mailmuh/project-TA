@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Pembayaran Data Pemohon</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action=" {{ route('pembayarans.update', $pembayaran->id) }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PEMOHON</label>
                                        <input type="text" name="nama" placeholder="Masukan Nama Pemohon" value="{{ $pembayaran->nama }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK PEMOHON</label>
                                        <input type="text" name="nik" placeholder="Masukan NIK Pemohon" value="{{ $pembayaran->nik }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" value="{{ $pembayaran->nohp }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PEMOHON</label>
                                        <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" value="{{ $pembayaran->alamat_pemohon }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" value="{{ $pembayaran->nohp }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan Email Pemohon" value="{{ $pembayaran->email }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PASIEN</label>
                                        <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" value="{{ $pembayaran->nama_pasien }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KTP PASIEN</label>
                                        <input type="text" name="ktp_pasien" placeholder="Masukan KTP Pasien" value="{{ $pembayaran->ktp_pasien }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>TANGGAL</label>
                                        <input type="date" name="tanggal" placeholder="Masukan Tanggal" value="{{ $pembayaran->tanggal }}" class="form-control" required>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>JUMLAH DANA BANTUAN</label>
                                        <input type="text" name="jumlah_bantuan" placeholder="Masukan Jumlah Dana Bantuan" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT PERMOHONAN</label>
                                        <input type="text" name="surat_permohonan" placeholder="Masukan Nama Pasien" value="{{ $pembayaran->surat_permohonan }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KK PEMOHON</label>
                                        <input type="text" name="kk_pemohon" placeholder="Masukan KTP Pasien" value="{{ $pembayaran->kk_pemohon }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KK PASIEN</label>
                                        <input type="text" name="kk_pasien" placeholder="Masukan Nama Pasien" value="{{ $pembayaran->kk_pasien }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SEP</label>
                                        <input type="text" name="sep" placeholder="Masukan Surat Elegibilitas Peserta" value="{{ $pembayaran->sep }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT KUASA</label>
                                        <input type="text" name="surat_kuasa" placeholder="Masukan Surat Kuasa" value="{{ $pembayaran->surat_kuasa }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        
                        <a href="{{ route('penunggupasiens.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect m-r-20">Save & Update</button>
                        <!-- <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection