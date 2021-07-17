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
                <h2> Data User Pemohon </h2>
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>                            
                            <th scope="col">NAMA</th>
                            <th scope="col">NIK</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($userpemohons as $d => $userpemohon)
                            <tr>
                                <td>{{ $d+1 }}</td>
                                <td>{{ $userpemohon->nama }}</td>
                                <td>{{ $userpemohon->nik }}</td>
                                <td>{{ $userpemohon->password }}</td>
                                <td class="text-align:center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('userpemohons.destroy', $userpemohon->id) }}"method="POST">
                                        <a href="{{ route('userpemohons.edit', $userpemohon->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        @csrf
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
