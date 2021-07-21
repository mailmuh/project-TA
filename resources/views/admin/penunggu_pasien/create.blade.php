@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Tambah Data Pemohon</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action=" {{ route('penunggupasiens.store') }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PEMOHON</label>
                                        <input type="text" name="nama" placeholder="Masukan Nama Pemohon" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK PEMOHON</label>
                                        <input type="text" name="nik" placeholder="Masukan NIK Pemohon" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PEMOHON</label>
                                        <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan Email Pemohon" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PASIEN</label>
                                        <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PASIEN</label>
                                        <input type="text" name="alamat_pasien" placeholder="Masukan Alamat Pasien" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">KECAMATAN</label></br>
                                <select name="kecamatan" class="form-control show-tick">
                                    <option value="Margadana">Margadana</option>
                                    <option value="Tegal Barat">Tegal Barat</option>
                                    <option value="Tegal Selatan">Tegal Selatan</option>
                                    <option value="Tegal Timur">Tegal Timur</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Tanggal Awal Perawatan</label>
                                        <input type="date" name="awal_perawatan" placeholder="Masukan KTP Pemohon" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Tanggal Akhir Perawatan</label>
                                        <input type="date" name="akhir_perawatan" placeholder="Masukan KTP Pasien" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT PERMOHONAN</label>
                                        <input type="text" name="surat_permohonan" placeholder="Masukan Nama Pasien" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SEP</label>
                                        <input type="text" name="sep" placeholder="Masukan Surat Elegibilitas Peserta" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>SURAT KUASA</label>
                                        <input type="text" name="surat_kuasa" placeholder="Masukan Surat Kuasa" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div class="fallback">
                                            <label>UNGGAH SURAT KETERANGAN</label>
                                            <input name="surat_keterangan" type="file" multiple required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-purple waves-effect m-r-20">Save</button>
                    </form>
                </div>
            </div>
        </div>

@endsection

