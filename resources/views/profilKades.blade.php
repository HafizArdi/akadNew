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
								<span>Dashboard</span>
							</h4>
						</div>
					</div>
					<div id="main-panel">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Profil {{ Auth::user()->name }}</h3>
											</div>
											<div class="panel-body">
												<form enctype="multipart/form-data" action="/updateProfil1/{{Auth::user()->id}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
													{{ csrf_field() }}
													<div class="form-group">
														<label class="col-sm-4 control-label"></label>
														<div class="col-sm-6">
															<span><img id="foto" src="/image/{{Auth::user()->foto}}" width="200px" height="250px" align=center></span>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Ubah Foto</label>
														<div class="col-sm-9">
															<input class="filestyle" id="inpfoto" name="foto" type="file">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Nama Lengkap</label>
														<div class="col-sm-6">
															<input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Sebagai</label>
														<div class="col-sm-6">
															<input type="text" readonly="readonly"  value="{{ Auth::user()->lev->level }} " class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">E-mail</label>
														<div class="col-sm-6">
															<input type="text"  name="email" value=" {{ Auth::user()->email }}" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Nomor Telepon</label>
														<div class="col-sm-6">
															<input type="text"  name="noTelepon" value=" {{ Auth::user()->noTelepon}}" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Alamat</label>
														<div class="col-sm-6">
															<input type="text"  name="alamat" value=" {{ Auth::user()->alamat}}" class="form-control">
														</div>
													</div>
													<div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
														<label for="kecamatan" class="col-md-3 control-label">Kecamatan</label>
														<div class="col-md-6">
															<select name="kecamatan" class="form-control">
																<option value="">Kec. {{Auth::user()->kecamatanTinggal->kecamatan}}</option>
																@foreach ($kecamatan as $kec )
																	<option value="{{ $kec->idKecamatan }}"> {{ $kec->kecamatan }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
														<label for="kelurahan" class="col-md-3 control-label">Kelurahan</label>
														<div class="col-md-4">
															<select name="kelurahan" class="form-control">
																<option>{{Auth::user()->kelurahanTinggal->kelurahan}}</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">No KTP</label>
														<div class="col-sm-6">
															<input type="text"  name="noKTP" value=" {{ Auth::user()->noKTP}}" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-9" align="left">
															<button class="btn btn-success" type="submit">Ubah Profil</button>
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
@endsection
@section('script')
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
