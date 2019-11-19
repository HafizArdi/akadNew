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
                    <div class="container">
                    <div class="row row fadeIn">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <span class="navbar-brand text-size-24" ><i class="fa fa-list-alt"></i> Buat Rincian Belanja Desa {{Auth::user()->kelurahanTinggal->kelurahan}}</span>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"></div>
                                                <div class="panel-body">
                                                    <form enctype="multipart/form-data" action="/buatBelanja/{{Auth::user()->id}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                                        {{ csrf_field() }}
                                                        <div class="form-group{{$errors->has ('bidang') ? 'has-error':''}}">
                                                            <label class="col-md-2 control-label">Status Laporan</label>
                                                            <div class="col-md-6">
                                                                <select name="bidang" class="form-control">
                                                                    <option value="1">Penyelenggaraan Pemerintahan Desa</option>
                                                                    <option value="2">Pelaksanaan Pembangunan Desa</option>
                                                                    <option value="3">Pembinaan Kemasyarakatan</option>
                                                                    <option value="4">Pemberdayaan Masyarakat</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group{{ $errors->has('rincian') ? ' has-error' : '' }}">
                                                            <label for="name" class="col-md-2 control-label">Rincian Belanja</label>
                                                            <div class="col-md-6">
                                                                <input id="rincian" type="text" class="form-control" name="rincian" value="{{ old('Rincian Biaya') }}" required autofocus>
                                                                @if ($errors->has('rincian'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('rincian') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group{{ $errors->has('belanja') ? ' has-error' : '' }}">
                                                            <label for="name" class="col-md-2 control-label">Total Belanja</label>
                                                            <div class="col-md-6">
                                                                <input id="belanja" type="text" class="form-control" name="belanja" value="{{ old('Total Belanja(dalam Rupiah)') }}" required autofocus>
                                                                @if ($errors->has('belanja'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('belanja') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-4 col-md-offset-2">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Buat Rincian Anggaran
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>


@endsection
