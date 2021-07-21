@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Edit Data Pemohon</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action=" {{ route('penunggupasiens.update', $penunggupasien->id) }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PEMOHON</label>
                                        <input type="text" name="nama" placeholder="Masukan Nama Pemohon" class="form-control" value="{{ $penunggupasien->nama }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK PEMOHON</label>
                                        <input type="text" name="nik" placeholder="Masukan NIK Pemohon" class="form-control" value="{{ $penunggupasien->nik }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PEMOHON</label>
                                        <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" class="form-control" value="{{ $penunggupasien->alamat_pemohon }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" class="form-control" value="{{ $penunggupasien->nohp }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan Email Pemohon" class="form-control" value="{{ $penunggupasien->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PASIEN</label>
                                        <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" class="form-control" value="{{ $penunggupasien->nama_pasien }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PASIEN</label>
                                        <input type="text" name="alamat_pasien" placeholder="Masukan Alamat Pasien" class="form-control" value="{{ $penunggupasien->alamat_pasien }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">KECAMATAN</label>
                                    <select name="kecamatan" class="form-control show-tick">
                                        <option value="Margadana"{{$penunggupasien->kecamatan == 'Margadana' ? 'selected' : '' }}>Margadana</option>
                                        <option value="Tegal Barat"{{$penunggupasien->kecamatan == 'Tegal Barat' ? 'selected' : '' }}>Tegal Barat</option>
                                        <option value="Tegal Selatan"{{$penunggupasien->kecamatan == 'Tegal Selatan' ? 'selected' : '' }}>Tegal Selatan</option>
                                        <option value="Tegal Timur"{{$penunggupasien->kecamatan == 'Tegal Timur' ? 'selected' : '' }}>Tegal Timur</option>
                                    </select>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Tanggal Awal Perawatan</label>
                                        <input type="date" name="awal_perawatan" placeholder="Masukan KTP Pemohon" class="form-control" value="{{ $penunggupasien->awal_perawatan }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Tanggal Akhir Perawatan</label>
                                        <input type="date" name="akhir_perawatan" placeholder="Masukan KTP Pasien" class="form-control" value="{{ $penunggupasien->akhir_perawatan }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT PERMOHONAN</label>
                                        <input type="text" name="surat_permohonan" placeholder="Masukan Nama Pasien" class="form-control" value="{{ $penunggupasien->surat_permohonan }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SEP</label>
                                        <input type="text" name="sep" placeholder="Masukan Surat Elegibilitas Peserta" class="form-control" value="{{ $penunggupasien->sep }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT KUASA</label>
                                        <input type="text" name="surat_kuasa" placeholder="Masukan Surat Kuasa" value="{{ $penunggupasien->surat_kuasa }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>UNGGAH SURAT KETERANGAN</label>
                                        <div class="fallback">
                                            <img src="{{ asset($penunggupasien->surat_keterangan) }}" class="mask waves-effect waves-light rgba-white-slight" height="100px" width="auto" alt="tidak ada gambar">
                                            <input name="surat_keterangan" type="file" multiple value="{{ $penunggupasien->surat_keterangan }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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