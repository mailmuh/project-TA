@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <center>
                <h2>Edit Data Akun Admin</h2>
            </center>
        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <form action=" {{ route('useradmins.update', $useradmin->id) }} " method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>NAMA</label>
                                        <input type="text" name="name" placeholder="Masukan Nama" value="{{ $useradmin->name }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>EMAIL</label>
                                        <input type="text" name="email" placeholder="Masukan NIK Pemohon" value="{{ $useradmin->email }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>PASSWORD</label>
                                        <input type="text" name="password" placeholder="Masukan Password" value="{{ $useradmin->password }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>ROLE</label>
                                    <select name="role" id="role" autocomplete="off" class="form-control form-control-border border-width-2" required>
                                        <option value="superadmin" @if ($useradmin->role == 'superadmin') selected @endif>Super Admin </option>
                                        <option value="admindinsos" @if ($useradmin->role == 'admindinsos') selected @endif>Dinas Sosial</option>
                                        <option value="adminkardinah" @if ($useradmin->role == 'adminkardinah') selected @endif>RSUD Kardinah</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ route('useradmins.index') }}" class="btn btn-sm btn-success waves-effect m-r-20">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect m-r-20">Save & Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection