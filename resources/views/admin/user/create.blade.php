@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Tambah Data Akun Admin</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action=" {{ route('useradmins.store') }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA PEMOHON</label>
                                        <input type="text" name="name" placeholder="Masukan Nama" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan Email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>ROLE</label>
                                        <select name="role" class="form-control" required>
                                            <option selected disabled>-- Pilih Role --</option>
                                            <option value="admindinsos">Dinas Sosial</option>
                                            <option value="adminkardinah">RSUD Kardinah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('useradmins.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect m-r-20">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection