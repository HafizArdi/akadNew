@extends('layouts.sidebarKades')
@section('content')
    <main class="pt-5 mx-lg-5">
        <div id="main-panel" class="col-md-12">
            <div style="margin-top:50px;" class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="card mb-4 wow fadeIn">
                            <div class="card-body d-sm-flex justify-content-between" >
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a href="/" target="_blank">Home</a>
                                    <span>/</span>
                                    <span>Rincian Belanja Kades</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div id="main-panel">
                        <div class="col-sm-6" style="margin-top: -15px; margin-bottom: 10px;"> <a href="/buatBelanja/{{Auth::user()->id}}"><button type="submit" class="btn btn-success"> <font color="white">Buat Rincian Belanja</font></button></a></div>
                            <div id="content">
                                <div class="container">
                                        <div class="row row fadeIn">
                                            <div class="col-md-12 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"> Belanja Bidang Penyelenggaraan Pemerintahan Desa </h3>
                                                                <br>
                                                                <div class="panel-body table-responsive table-full">
                                                                    <table class="table table-stripped table-bordered">
                                                                        <tr>
                                                                            <td class="text-center text-nowrap">Rincian Belanja</td>
                                                                            <td class="text-center text-nowrap">Tanggal Pengeluaran</td>
                                                                            <td class="text-center text-nowrap">Total Pengeluaran</td>
                                                                            <td class="text-center text-nowrap">Action</td>
                                                                        </tr>
                                                                        @foreach($tampil1 as $data)
                                                                            <tr>
                                                                                <td class="text-center text-nowrap">{{$data->rincian}}</td>
                                                                                <td class="text-center text-nowrap">{{$data->belanja}}</td>
                                                                                <td class="text-center text-nowrap">{{$data->tanggalBelanja}}</td>
                                                                                <td class="text-center text-nowrap">
                                                                                    <a href="/ubahBelanja/{{$data->idBelanja}}"><button type="submit" class="btn btn-success"> <font color="white">Ubah Rincian Belanja</font></button></a>
                                                                            </tr>
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row wow fadeIn">
                                                    <div class="col-md-12 mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title">Belanja Bidang Pelaksanaan Pembangunan Desa</h3>
                                                                    </div>
                                                                    <div class="panel-body table-responsive table-full">
                                                                        <table class="table table-stripped table-bordered">
                                                                            <tr>
                                                                                <td class="text-center text-nowrap">Rincian Belanja</td>
                                                                                <td class="text-center text-nowrap">Tanggal Pengeluaran</td>
                                                                                <td class="text-center text-nowrap">Total Pengeluaran</td>
                                                                                <td class="text-center text-nowrap">Action</td>
                                                                            </tr>
                                                                            @foreach($tampil2 as $data)
                                                                                <tr>
                                                                                    <td class="text-center text-nowrap">{{$data->rincian}}</td>
                                                                                    <td class="text-center text-nowrap">{{$data->belanja}}</td>
                                                                                    <td class="text-center text-nowrap">{{$data->tanggalBelanja}}</td>
                                                                                    <td class="text-center text-nowrap">
                                                                                        <a href="/ubahBelanja/{{$data->idBelanja}}"><button type="submit" class="btn btn-success"> <font color="white">Ubah Rincian Belanja</font></button></a>
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
                                            <div class="container">
                                                <div class="row wow fadeIn">
                                                    <div class="col-md-12 mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title">Belanja Bidang Pembinaan Kemasyarakatan</h3>
                                                                    </div>
                                                                    <div class="panel-body table-responsive table-full">
                                                                        <table class="table table-stripped table-bordered">
                                                                            <tr>
                                                                                <td class="text-center text-nowrap">Rincian Belanja</td>
                                                                                <td class="text-center text-nowrap">Tanggal Pengeluaran</td>
                                                                                <td class="text-center text-nowrap">Total Pengeluaran</td>
                                                                                <td class="text-center text-nowrap">Action</td>
                                                                            </tr>
                                                                            @foreach($tampil3 as $data)
                                                                                <tr>
                                                                                    <td class="text-center text-nowrap">{{$data->rincian}}</td>
                                                                                    <td class="text-center text-nowrap">{{$data->belanja}}</td>
                                                                                    <td class="text-center text-nowrap">{{$data->tanggalBelanja}}</td>
                                                                                    <td class="text-center text-nowrap">
                                                                                        <a href="/ubahBelanja/{{$data->idBelanja}}"><button type="submit" class="btn btn-success"> <font color="white">Ubah Rincian Belanja</font></button></a>
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
                                            <div class="container">
                                                <div class="row wow fadeIn">
                                                    <div class="col-md-12 mb-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="panel panel-info">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title">Belanja Bidang Pemberdayaan Masyarakat</h3>
                                                                    </div>
                                                                    <div class="panel-body table-responsive table-full">
                                                                        <table class="table table-stripped table-bordered">
                                                                            <tr>
                                                                                <td class="text-center text-nowrap">Rincian Belanja</td>
                                                                                <td class="text-center text-nowrap">Tanggal Pengeluaran</td>
                                                                                <td class="text-center text-nowrap">Total Pengeluaran</td>
                                                                                <td class="text-center text-nowrap">Action</td>
                                                                            </tr>
                                                                            @foreach($tampil4 as $data)
                                                                                <tr>
                                                                                    <td class="text-center text-nowrap">{{$data->rincian}}</td>
                                                                                    <td class="text-center text-nowrap">{{$data->belanja}}</td>
                                                                                    <td class="text-center text-nowrap">{{$data->tanggalBelanja}}</td>
                                                                                    <td class="text-center text-nowrap">
                                                                                        <a href="/ubahBelanja/{{$data->idBelanja}}"><button type="submit" class="btn btn-success"> <font color="white">Ubah Rincian Belanja</font></button></a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>
@endsection
