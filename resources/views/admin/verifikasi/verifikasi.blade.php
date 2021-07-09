@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Verifikasi Data Pemohon</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action=" {{ route('verifikasis.update', $penunggupasien->id) }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')  
                        <div class="form-group">
                            <div class="form-line">
                                <label>NAMA</label>
                                <input type="text" name="nama" placeholder="Masukan Nama Pemohon" value="{{ $penunggupasien->nama }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>NIK</label>
                                <input type="text" name="nik" placeholder="Masukan NIK" value="{{ $penunggupasien->nik }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>TANGGAL</label>
                                <input type="date" name="tanggal" placeholder="Masukan Tanggal" value="{{ $penunggupasien->tanggal }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SURAT PERMOHONAN</label>
                                <input type="text" name="surat_permohonan" placeholder="Masukan Surat Permohonan" value="{{ $penunggupasien->surat_permohonan }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KK PEMOHON</label>
                                <input type="text" name="kk_pemohon" placeholder="Masukan Kartu Keluarga Pemohon" class="form-control" value="{{ $penunggupasien->kk_pemohon }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KK PASIEN</label>
                                <input type="text" name="kk_pasien" placeholder="Masukan Kartu Keluarga Pasien" class="form-control" value="{{ $penunggupasien->kk_pasien }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SEP</label>
                                <input type="text" name="sep" placeholder="Masukan Surat Elegibilitas Peserta" class="form-control" value="{{ $penunggupasien->sep }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KTP Pemohon</label>
                                <input type="text" name="ktp_pemohon" placeholder="Masukan KTP Pemohon" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>Alamat Pemohon</label>
                                <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>Nama Pasien</label>
                                <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KTP Pasien</label>
                                <input type="text" name="ktp_pasien" placeholder="Masukan KTP Pasien" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>Alamat Pasien</label>
                                <input type="text" name="alamat_pasien" placeholder="Masukan Alamat Pasien" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SURAT KUASA</label>
                                <input type="text" name="surat_kuasa" placeholder="Masukan Surat Kuasa" class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label for="file">SURAT KETERANGAN</label>
                                <div class="fallback">
                                    <img src="{{ asset($penunggupasien->surat_keterangan) }}" class="mask waves-effect waves-light rgba-white-slight" height="100px" width="auto" alt="tidak ada gambar">
                                    <input name="surat_keterangan" type="file" multiple value="{{ $penunggupasien->surat_keterangan }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KETERANGAN</label>
                                <!-- <select name="keterangan" id="" class="form-control">
                                    <option value=""Belum Terverifikasi" {{ $penunggupasien==='Belum Terverifikasi' ? 'selected' : ""}}>Belum Terverifikasi</option>
                                    <option value="{{ $penunggupasien->keterangan }}">Terverifikasi</option>  
                                </select> -->
                                <select name="keterangan" id="" class="form-control">
                                    <option value="Belum Terverifikasi" {{ $penunggupasien->keterangan === 'Belum Terverifikasi' ? 'selected' : ''}}>Belum Terverifikasi</option>
                                    <option value="Terverifikasi" {{ $penunggupasien->keterangan === 'Terverifikasi' ? 'selected' : ''}}>Terverifikasi</option>  
                                </select>
                                <!-- <input type="text" name="keterangan" placeholder="Masukan Agama Dokter" class="form-control" value="{{ $penunggupasien->keterangan }}" required> -->
                            </div>
                        </div>
                        <a href="{{ route('verifikasis.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect m-r-20">Save & Update</button>
                        <!-- <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection