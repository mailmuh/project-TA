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
                <h2> Data Pemohon Penunggu Pasien </h2>
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
            <div class="block-header">
                <a href="{{ route('penunggupasiens.create') }}" class="btn bg-purple waves-effect m-r-20">Add Data</a>
            </div>
                <div class="table-responsive">
                    <table id="tabelPasien" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>                            
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Awal Perawatan</th>
                                <th scope="col">Akhir Perawatan</th>
                                <th scope="col">Surat Keterangan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penunggupasiens as $d => $penunggupasien)
                            <tr>
                                <td>{{ $d+1 }}</td>
                                <td>{{ $penunggupasien->nama }}</td>
                                <td>{{ $penunggupasien->nik }}</td>
                                <td>{{ $penunggupasien->nama_pasien }}</td>
                                <td>{{ \Carbon\Carbon::parse($penunggupasien->awal_perawatan)->format('d-m-Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($penunggupasien->akhir_perawatan)->format('d-m-Y')}}</td>
                                <td>
                                    @if($penunggupasien->surat_keterangan!= NULL)
                                       <img src="{{URL::to('/')}}/{{$penunggupasien->surat_keterangan}}" class="mask waves-effect waves-light rgba-white-slight" height="85px" width="85px" width="auto" alt="Tidak Ada Gambar">
                                    @else
                                        <h5 style="color:red">Tidak ada Gambar</h5>
                                    @endif 
                                </td>
                                <!-- <td><a href="{{ route('verifikasis.edit', $penunggupasien->id) }}">{{ $penunggupasien->keterangan }}</a></td> -->
                                <td>{{ $penunggupasien->keterangan }}</td>

                                <td class="text-align:center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penunggupasiens.destroy', $penunggupasien->id) }}"method="POST">
                                        <a href="{{ route('penunggupasiens.show', $penunggupasien->id) }}" class="btn btn-sm btn-info">Show</a>    
                                        <a href="{{ route('penunggupasiens.edit', $penunggupasien->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        @if(Auth::User()->role === 'admindinsos')
                                            <a class="btn btn-success" data-toggle="modal" data-target="#tambahklasifikasi">Verifikasi</a>
                                        @elseif(Auth::User()->role === 'superadmin')
                                            <a class="btn btn-success" data-toggle="modal" data-target="#tambahklasifikasi">Verifikasi</a>
                                        @endif
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger waves-effect m-r-20">Delete</button>
                                    </form>
                                </td>

                                <!--modal Verifikasi-->
                                <div class="modal fade" id="tambahklasifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                        class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Verifikasi Data Pemohon </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('penunggupasiens.verifikasi', $penunggupasien->id) }}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('PUT')
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <label for="nama">Apakah Anda Ingin Memverifikasi?</label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <button type="submit" class="btn btn-success btn-sm">VERIFIKASI</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">TIDAK</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
