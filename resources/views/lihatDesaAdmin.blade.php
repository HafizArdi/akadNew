@extends('layouts.sidebarAdmin')
@section('content')
    <main class="pt-5 mx-lg-5">
        <div id="main-panel" class="col-md-12">
            <div style="margin-top:50px;" class="row">
                <div class="col-md-12">
                    <div class="card mb-4 wow fadeIn">
                        <div class="card-body d-sm-flex justify-content-between">
                            <h4 class="mb-2 mb-sm-0 pt-1">
                                <a href="/" target="_blank">Home</a>
                                <span>/</span>
                                <span>Lihat Desa</span>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"> Informasi Mengenai Desa {{$kelurahan->kelurahan}} </h3>
                                            <br>
                                            <div class="panel-body table-responsive table-full">
                                                <table class="table table-stripped ">
                                                    <tr>
                                                        <td class="text-left text-nowrap">Nama Desa:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->kelurahan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Kecamatan    :</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->kecamatanX->kecamatan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Sekretaris Desa :</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->sekdes}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Luas:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->luas}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Jumlah Penduduk:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->penduduk}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Batas Utara:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->utara}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Batas Selatan:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->selatan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Batas Timur:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->timur}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-nowrap">Batas Barat:</td>
                                                        <td class="lnr-text-align-left text-nowrap">{{$kelurahan->barat}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Data Pendapatan Desa {{$kelurahan->kelurahan}} Tahun 2018</h3>
                                        </div>
                                        <div class="panel-body table-responsive table-full">
                                            <table class="table table-stripped table-bordered">
                                                <tr>
                                                    <td class="text-left text-nowrap">Pendapatan Pajak Daerah:</td>
                                                    <td class="lnr-text-align-left text-nowrap">{{$kelurahan->pajakDaerah}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-nowrap">Pendapatan Asli Desa:</td>
                                                    <td class="lnr-text-align-left text-nowrap">{{$kelurahan->pendapatan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-nowrap">Alokasi Dana Desa:</td>
                                                    <td class="lnr-text-align-left text-nowrap">{{$kelurahan->alokasiDana}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-nowrap">Dana Desa:</td>
                                                    <td class="lnr-text-align-left text-nowrap">{{$kelurahan->danaDesa}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-nowrap">Total Pendapatan Desa:</td>
                                                    <td class="lnr-text-align-left text-nowrap">{{$totalPendapatan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-nowrap">SILPA:</td>
                                                    <td class="lnr-text-align-left text-nowrap">{{$totalUang}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Data Pengeluaran Desa {{$kelurahan->kelurahan}} Tahun 2018</h3>
                                        </div>
                                        <div class="panel-body table-responsive table-full">
                                            <table class="table table-stripped table-bordered">
                                                <tr>
                                                    <td class="text-center text-nowrap">Belanja Bidang</td>
                                                    <td class="text-center text-nowrap">Rincian Belanja</td>
                                                    <td class="text-center text-nowrap">Total Belanja</td>
                                                    <td class="text-center text-nowrap">Tanggal Belanja</td>
                                                </tr>
                                                @foreach($belanja as $data)
                                                    <tr>
                                                        <td class="text-center text-nowrap">{{$data->belanjaBidang->bidang}}</td>
                                                        <td class="text-center text-nowrap">{{$data->rincian}}</td>
                                                        <td class="text-center text-nowrap">{{$data->belanja}}</td>
                                                        <td class="text-center text-nowrap">{{$data->tanggalBelanja}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
