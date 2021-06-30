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
                        <div class="form-group">
                            <div class="form-line">
                                <label>NAMA</label>
                                <input type="text" name="nama" placeholder="Masukan Nama Pemohon" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>TANGGAL</label>
                                <input type="date" name="tanggal" placeholder="Masukan Tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SURAT PERMOHONAN</label>
                                <input type="text" name="surat_permohonan" placeholder="Masukan Surat Permohonan" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KK PEMOHON</label>
                                <input type="text" name="kk_pemohon" placeholder="Masukan Kartu Keluarga Pemohon" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>KK PASIEN</label>
                                <input type="text" name="kk_pasien" placeholder="Masukan Kartu Keluarga Pasien" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SEP</label>
                                <input type="text" name="sep" placeholder="Masukan Surat Elegibilitas Peserta" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label>SURAT KUASA</label>
                                <input type="text" name="surat_kuasa" placeholder="Masukan Surat Kuasa" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <div class="fallback">
                                    <label>UNGGAH SURAT KETERANGAN</label>
                                    <input name="surat_keterangan" type="file" multiple required />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-purple waves-effect m-r-20">Save</button>
                    </form>
                </div>
            </div>
        </div>

@endsection

