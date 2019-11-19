@extends('layouts.sidebarAdmin')
@section('content')
    <div id="main-panel">
        <div id="top-nav" class="col-md-12>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>
                        <button type="button" class="sidebar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="navbar-brand text-size-24" ><i class="fa fa-list-alt"></i> Buat Laporan Desa </span>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" action="/buatLaporanAdmin/{{Auth::user()->id}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('laporan') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Laporan</label>
                                <div class="col-md-6">
                                    <input id="laporan" type="text" class="form-control" name="laporan" value="{{ old('laporan') }}" required autofocus>
                                    @if ($errors->has('laporan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('laporan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                                <label for="kecamatan" class="col-md-2 control-label">Kecamatan</label>
                                <div class="col-md-4">
                                    <select name="kecamatan" class="form-control">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $kec )
                                            <option value="{{ $kec->idKecamatan }}"> {{ $kec->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                                <label for="kelurahan" class="col-md-2 control-label">Kelurahan</label>
                                <div class="col-md-4">
                                    <select name="kelurahan" class="form-control">
                                        <option>Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{$errors->has ('status') ? 'has-error':''}}">
                                <label class="col-md-2 control-label">Status Laporan</label>
                                <div class="col-md-4">
                                    <select name="status" class="form-control">
                                        <option value="1">Private</option>
                                        <option value="2">Public</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <span><img id="foto" src="/laporan/laporan.png" class="img-responsive" width="450px" height="300px" align=center></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Masukkan Foto</label>
                                <div class="col-sm-6">
                                    <input class="filestyle" id="inpfoto" name="foto" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Buat Laporan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="kecamatan"]').on('change', function(){
                var idKecamatan = $(this).val();
                if(idKecamatan) {
                    $.ajax({
                        url: '/kelurahan/get/'+idKecamatan,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {
                            $('select[name="kelurahan"]').empty();

                            $.each(data, function(key, value){

                                $('select[name="kelurahan"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },

                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="kelurahan"]').empty();
                }
            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inpfoto").change(function () {
            readURL(this);
        });
    </script>
@endsection
