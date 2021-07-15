@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Detail Data Pemohon "{{ $penunggupasien->nik }}"</h2>
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
                                        <input type="text" name="nama" placeholder="Masukan Nama Pemohon" value="{{ $penunggupasien->nama }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK PEMOHON</label>
                                        <input type="text" name="nik" placeholder="Masukan NIK Pemohon" value="{{ $penunggupasien->nik }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KTP PEMOHON</label>
                                        <input type="text" name="ktp_pemohon" placeholder="Masukan KTP Pemohon" value="{{ $penunggupasien->ktp_pemohon }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PEMOHON</label>
                                        <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" value="{{ $penunggupasien->alamat_pemohon }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" value="{{ $penunggupasien->nohp }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan Email Pemohon" value="{{ $penunggupasien->email }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PASIEN</label>
                                        <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" value="{{ $penunggupasien->nama_pasien }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KTP PASIEN</label>
                                        <input type="text" name="ktp_pasien" placeholder="Masukan KTP Pasien" value="{{ $penunggupasien->ktp_pasien }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PASIEN</label>
                                        <input type="text" name="alamat_pasien" placeholder="Masukan Alamat Pasien" value="{{ $penunggupasien->alamat_pasien }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>TANGGAL</label>
                                        <input type="date" name="tanggal" placeholder="Masukan Tanggal" value="{{ $penunggupasien->tanggal }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT PERMOHONAN</label>
                                        <input type="text" name="surat_permohonan" placeholder="Masukan Nama Pasien" value="{{ $penunggupasien->surat_permohonan }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KK PEMOHON</label>
                                        <input type="text" name="kk_pemohon" placeholder="Masukan KTP Pasien" value="{{ $penunggupasien->kk_pemohon }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KK PASIEN</label>
                                        <input type="text" name="kk_pasien" placeholder="Masukan Nama Pasien" value="{{ $penunggupasien->kk_pasien }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SEP</label>
                                        <input type="text" name="sep" placeholder="Masukan Surat Elegibilitas Peserta" value="{{ $penunggupasien->sep }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT KUASA</label>
                                        <input type="text" name="surat_kuasa" placeholder="Masukan Surat Kuasa" value="{{ $penunggupasien->surat_kuasa }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>KETERANGAN</label>
                                        <input type="text" name="keterangan" placeholder="Masukan Surat Kuasa" value="{{ $penunggupasien->keterangan }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>SURAT KETERANGAN</label>
                                        <div class="fallback">
                                            <img src="{{ asset($penunggupasien->surat_keterangan) }}" class="mask waves-effect waves-light rgba-white-slight" height="100px" width="auto" alt="tidak ada gambar">
                                            <!-- <input name="surat_keterangan" type="file" multiple value="{{ $penunggupasien->surat_keterangan }}" /> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ route('penunggupasiens.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
                        <!-- <button type="submit" class="btn btn-sm btn-primary waves-effect m-r-20">Save & Update</button> -->
                        <!-- <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection