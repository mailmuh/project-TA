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
                <h2> Data Pembayaran </h2>
            </center>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="">
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
                                    <th scope="col">NOMOR HP</th>
                                    <th scope="col">JUMLAH</th>
                                    <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayarans as $d => $pembayaran)
                            <tr>
                                <td>{{ $d+1 }}</td>
                                <td>{{ $pembayaran->nama }}</td>
                                <td>{{ $pembayaran->nik }}</td>
                                <td>{{ $pembayaran->alamat_pemohon }}</td>
                                <td>{{ $pembayaran->nohp }}</td>
                                <td>{{ $pembayaran->jumlah_bantuan }}</td>
                                <td class="text-align:center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pembayarans.destroy', $pembayaran->id) }}"method="POST">
                                        <!-- <a href="{{ route('penunggupasiens.edit', $pembayaran->id) }}" class="btn btn-sm btn-primary">Show</a> -->
                                        <a href="{{ route('pembayarans.show', $pembayaran->id) }}" class="btn btn-sm btn-primary" target="_blank" >Show</a>
                                        <a href="{{ route('pembayarans.edit', $pembayaran->id) }}" class="btn btn-sm btn-primary">Pembayaran</a>
                                        <!-- <a href="{{ route('penunggupasiens.show', $pembayaran->id) }}" class="btn btn-sm btn-success waves-effect m-r-20">Show</a>
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
