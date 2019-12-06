<title>Buat Akun Kades - AKAD</title>
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
                                <span>Buat Akun Kades</span>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST" action="{{ ('/insertKades') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Nama Lengkap</label>
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">Alamat Email</label>
                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                                    <label for="alamat" class="col-md-4 control-label">Alamat</label>
                                                    <div class="col-md-6">
                                                        <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>
                                                        @if ($errors->has('alamat'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('alamat') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                                                    <label for="kecamatan" class="col-md-4 control-label">Kecamatan</label>
                                                    <div class="col-md-6">
                                                        <select name="kecamatan" class="form-control">
                                                            <option value="">Pilih Kecamatan</option>
                                                                @foreach ($kecamatan as $kec )
                                                                    <option value="{{ $kec->idKecamatan }}"> {{ $kec->kecamatan }}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                                                    <label for="kelurahan" class="col-md-4 control-label">Kelurahan</label>
                                                    <div class="col-md-4">
                                                        <select name="kelurahan" class="form-control">
                                                            <option>Pilih Kelurahan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('noKTP') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Nomor KTP</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="noKTP" value="{{ old('noKTP') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Password</label>
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Register
                                                        </button>
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
    </main>
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
@endsection
