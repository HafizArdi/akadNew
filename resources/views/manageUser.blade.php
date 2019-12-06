<title>Manajemen Pengguna - AKAD</title>
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
                                <span>Manajemen Pengguna</span>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel-body table-responsive table-full">
                                        <table class="table table-stripped table-bordered">
                                            <tr>
                                                <td class="text-center text-nowrap">Nomor Telepon</td>
                                                <td class="text-center text-nowrap">Nama</td>
                                                <td class="text-center text-nowrap">Email</td>
                                                <td class="text-center text-nowrap">Kelurahan</td>
                                                <td class="text-center text-nowrap">Kecamatan</td>
                                                <td class="text-center text-nowrap">Action</td>
                                            </tr>
                                            @foreach($user as $data)
                                            <tr>
                                                <td class="text-center text-nowrap">{{$data->noTelepon}}</td>
                                                <td class="text-center text-nowrap">{{$data->name}}</td>
                                                <td class="text-center text-nowrap">{{$data->email}}</td>
                                                <td class="text-center text-nowrap">{{$data->kelurahanTinggal->kelurahan}}</td>
                                                <td class="text-center text-nowrap">{{$data->kecamatanTinggal->kecamatan}}</td>
                                                <td class="text-center text-nowrap">
                                                    <a href="/lihatLaporan/{{$data->id}}"><button type="submit" class="btn btn-success btn-sm"> <font color="white">Lihat Aktifitas</font></button></a>
                                                    <a href="/deleteUser/{{$data->id}}"><button type="submit" class="btn btn-danger btn-sm"> <font color="white">Hapus</font></button></a>
                                                </td>
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
    </main>
@endsection
