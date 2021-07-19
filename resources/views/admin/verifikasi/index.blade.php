@extends('admin.layouts.app')

@section('content')
<div class="card">
        @if(Session::has('success'))
    <div class="alert alert-success">
        <strong>Success: </strong>{{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert">×</button> 
    </div>
@endif
    <div class="card">
        <div class="header">
            <center>
                <h2> Data Verifikasi </h2>
            </center>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);">Action</a></li>
                        <li><a href="javascript:void(0);">Another action</a></li>
                        <li><a href="javascript:void(0);">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <!-- <div class="block-header">
                <a href="{{ route('verifikasis.create') }}" class="btn bg-purple waves-effect m-r-20">Add Data</a>
            </div> -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                    <th scope="col">NO</th>                            
                                    <th scope="col">NAMA</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">SURAT KETERANGAN</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($verifikasi as $d => $verifikasi)
                            <tr>
                                <td>{{ $d+1 }}</td>
                                <td>{{ $verifikasi->nama }}</td>
                                <td>{{ $verifikasi->nik }}</td>
                                <td>{{ $verifikasi->alamat_pemohon }}</td>
                                <td>
                                    @if($verifikasi->surat_keterangan!= NULL)
                                       <img src="{{ asset($verifikasi->surat_keterangan) }}" class="mask waves-effect waves-light rgba-white-slight" height="85px" width="85px" width="auto">
                                    @else
                                        <h5 style="color:red">Tidak ada Gambar</h5>
                                    @endif 
                                </td>
                                <td>{{ $verifikasi->keterangan }}</td>
                                <td class="text-align:center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('verifikasi.destroyVerifikasi', $verifikasi->id) }}"method="POST">
                                        <!-- <a href="{{ route('penunggupasiens.edit', $verifikasi->id) }}" class="btn btn-sm btn-primary">Show</a> -->
                                        <a href="{{ route('verifikasi.detail', $verifikasi->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                        <!-- <a href="{{ route('pembayarans.edit', $verifikasi->id) }}" class="btn btn-sm btn-success">Pembayaran</a> -->
                                        <!-- <a href="" class="btn btn-sm btn-primary">Edit</a> -->
                                        <!-- <a href="{{ route('penunggupasiens.show', $verifikasi->id) }}" class="btn btn-sm btn-success waves-effect m-r-20">Show</a>
 -->                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger waves-effect m-r-20">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
