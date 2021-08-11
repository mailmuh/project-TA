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

                <!-- menampilkan error validasi -->
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                    <form action=" {{ route('penunggupasiens.store') }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PEMOHON</label>
                                        <input type="text" name="nama" placeholder="Masukan Nama Pemohon" class="form-control" value="{{ old('nama') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NIK PEMOHON</label>
                                        <small class="text-danger">(diisi dengan angka)</small>
                                        <input type="text" name="nik" placeholder="Masukan NIK Pemohon" class="form-control" value="{{ old('nik') }}" >
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PEMOHON</label>
                                        <input type="text" name="alamat_pemohon" placeholder="Masukan Alamat Pemohon" class="form-control" value="{{ old('alamat_pemohon') }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR HP</label>
                                        <input type="text" name="nohp" placeholder="Masukan Nomor Handphone Pemohon" class="form-control" value="{{ old('nohp') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan Email Pemohon" class="form-control" value="{{ old('email') }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PASIEN</label>
                                        <input type="text" name="nama_pasien" placeholder="Masukan Nama Pasien" class="form-control" value="{{ old('nama_pasien') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ALAMAT PASIEN</label>
                                        <input type="text" name="alamat_pasien" placeholder="Masukan Alamat Pasien" class="form-control" value="{{ old('alamat_pasien') }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">KECAMATAN</label></br>
                                <select name="kecamatan" class="custom-select my-1 mr-sm-2 bg-light">
                                <option selected disabled>-- Pilih Kecamatan --</option>
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
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" placeholder="Masukan KTP Pemohon" class="form-control" value="{{ old('tanggal') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Tanggal Awal Perawatan</label>
                                        <input type="date" name="awal_perawatan" placeholder="Masukan KTP Pemohon" class="form-control" value="{{ old('awal_perawatan') }}" ">
                                        @if($errors->has('awal_perawatan'))
                                            <span class="text-danger">{{ $errors->first('awal_perawatan') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Tanggal Akhir Perawatan</label>
                                        <input type="date" name="akhir_perawatan" placeholder="Masukan KTP Pasien" class="form-control" value="{{ old('akhir_perawatan') }}" >
                                        @if($errors->has('akhir_perawatan'))
                                            <span class="text-danger">{{ $errors->first('akhir_perawatan') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>UNGGAH SURAT PERMOHONAN</label>
                                        <small class="text-danger">(format harus jpeg,jpg,png)</small>
                                        <input name="surat_permohonan" type="file" multiple  value="{{ old('surat_permohonan') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NOMOR SEP</label>
                                        <input type="text" name="sep" placeholder="Masukan Nomor Surat Elegibilitas Peserta" class="form-control" value="{{ old('sep') }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>UNGGAH SURAT KUASA</label>
                                        <small class="text-danger">(format harus jpeg,jpg,png)</small>
                                        <input name="surat_kuasa" type="file" multiple  value="{{ old('surat_kuasa') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div class="fallback">
                                            <label>UNGGAH SURAT KETERANGAN</label>
                                            <small class="text-danger">(format harus jpeg,jpg,png)</small>
                                            <input name="surat_keterangan" type="file" multiple  value="{{ old('surat_keterangan') }}" />
                                            
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
        
        @include('sweet::alert')
        
        <!-- <script>
        function hanyaAngka(event) {
            var nik = (event.which) ? event.which : event.keyCode
            if (nik != 46 && nik > 31 && (nik < 48 || nik > 57))
                return false;
            return true;
        }
    </script> -->

@endsection

