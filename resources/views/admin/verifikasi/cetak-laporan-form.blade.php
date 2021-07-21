@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="header">
        <center>
            <h2> Cetak Laporan Data Pemohon </h2>
        </center>
    </div>
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="label">Tanggal Awal :</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control bg-light " required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="label">Tanggal Akhir :</label>
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control bg-light" required>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" onclick="this.href='/cetak-laporan-filter/'+ document.getElementById('tglawal').value
                + '/' + document.getElementById('tglakhir').value" target="blank" class="btn btn-primary">Filter Cetak Laporan <i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection