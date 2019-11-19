@extends('layouts.sidebarKades')
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
                                <span>Tentang Desa</span>
                            </h4>
                        </div>
                    </div>
                    <div class="row wow fadeIn">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Desa {{ Auth::user()->kelurahanTinggal->kelurahan }}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <form enctype="multipart/form-data" action="/updateTentang/{{Auth::user()->kelurahanTinggal}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Nama Sekdes</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" value="{{Auth::user()->kelurahanTinggal->sekdes}}" name="sekdes" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Luas Daerah</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="luas" value="{{Auth::user()->kelurahanTinggal->luas}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Jumlah Penduduk</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="penduduk" value="{{Auth::user()->kelurahanTinggal->penduduk}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Batas Utara</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="utara" value="{{Auth::user()->kelurahanTinggal->utara}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Batas Selatan</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="selatan" value="{{Auth::user()->kelurahanTinggal->selatan}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Batas Timur</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="timur" value="{{Auth::user()->kelurahanTinggal->timur}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Batas Barat</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="barat" value="{{Auth::user()->kelurahanTinggal->barat}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Bagi Hasil Pajak Daerah</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="pajakDaerah" value="{{Auth::user()->kelurahanTinggal->pajakDaerah}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Pendapatan Asli Desa</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="pendapatan" value="{{Auth::user()->kelurahanTinggal->pendapatan}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Alokasi Dana Daerah</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="alokasiDana" value="{{Auth::user()->kelurahanTinggal->alokasiDana}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Dana Desa</label>
                                                            <div class="col-sm-6">
                                                                <input type="text"  name="danaDesa" value="{{Auth::user()->kelurahanTinggal->danaDesa}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-4 col-md-offset-2" align="left">
                                                                <button class="btn btn-success" type="submit">Ubah Tentang</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
@section('script')
@endsection
