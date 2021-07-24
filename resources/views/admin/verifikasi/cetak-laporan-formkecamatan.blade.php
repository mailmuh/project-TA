@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="header">
        <center>
            <h2> Cetak Laporan Data Pemohon </h2>
        </center>
    </div>
    <div class="body">
    <form action=" /cetak-laporan-filter " method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label class="form-label">PILIH KECAMATAN</label></br>
                        <select name="kecamatan" id="kecamatan" class="custom-select my-1 mr-sm-2 bg-light">
                            <option value="Margadana">Margadana</option>
                            <option value="Tegal Barat">Tegal Barat</option>
                            <option value="Tegal Selatan">Tegal Selatan</option>
                            <option value="Tegal Timur">Tegal Timur</option>
                        </select>
                    </div>
                </div>
                <!-- <a href="" onclick="this.href='/cetak-laporan-filter/'+ document.getElementById('kecamatan').value
                " target="blank" class="btn btn-primary">Filter Cetak Laporan <i class="fas fa-print"></i></a> -->

                <!-- <a href="/cetak-laporan/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a> -->
                <button type="submit" class="btn bg-purple waves-effect m-r-20" target="_blank">Save</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection