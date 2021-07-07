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
                        <div class="form-group">
                            <div class="form-line">
                                <label>NAMA</label>
                                <input type="text" name="nama" placeholder="Masukan Nama Obat" value="{{ $penunggupasien->nama }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>NIK</label>
                                <input type="text" name="nik" placeholder="Masukan Nama Obat" value="{{ $penunggupasien->nik }}" class="form-control">
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
                                <input type="text" name="surat_permohonan" placeholder="Masukan Tanggal Lahir Dokter" value="{{ $penunggupasien->surat_permohonan }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KK PEMOHON</label>
                                <input type="text" name="kk_pemohon" placeholder="Masukan Agama Dokter" class="form-control" value="{{ $penunggupasien->kk_pemohon }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KK PASIEN</label>
                                <input type="text" name="kk_pasien" placeholder="Masukan Agama Dokter" class="form-control" value="{{ $penunggupasien->kk_pasien }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SEP</label>
                                <input type="text" name="sep" placeholder="Masukan Agama Dokter" class="form-control" value="{{ $penunggupasien->sep }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SURAT KUASA</label>
                                <input type="text" name="surat_kuasa" placeholder="Masukan Agama Dokter" class="form-control" value="{{ $penunggupasien->surat_kuasa }}" required>
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