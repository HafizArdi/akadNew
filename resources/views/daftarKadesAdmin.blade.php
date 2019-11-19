<title>Daftar Kepala Desa - AKAD</title>
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
								<span>Daftar Kepala Desa</span>
							</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-4">
							<div class="card">
								<div class="card-body">
									<div class="panel-heading">
										<h3 class="panel-title">Data Kepala Desa</h3>
									</div>
									<div class="panel-body table-responsive table-full">
										<table class="table table-stripped table-bordered">
											<tr>
												<td class="text-center text-nowrap">Nomor Telepon</td>
												<td class="text-center text-nowrap">Nama</td>
												<td class="text-center text-nowrap">Email</td>
												<td class="text-center text-nowrap">Kepala Desa</td>
												<td class="text-center text-nowrap">Kecamatan</td>
											</tr>
											@foreach($kades as $data)
											<tr>
												<td class="text-center text-nowrap">{{$data->noTelepon}}</td>
												<td class="text-center text-nowrap">{{$data->name}}</td>
												<td class="text-center text-nowrap">{{$data->email}}</td>
												<td class="text-center text-nowrap">{{$data->kelurahanTinggal->kelurahan}}</td>
												<td class="text-center text-nowrap">{{$data->kecamatanTinggal->kecamatan}}</td>
												<td class="text-center text-nowrap">
													<a href="/lihatDesaAdmin/{{$data->kelurahan}}"><button type="submit" class="btn btn-success"> <font color="white">Lihat Detail Desa</font></button></a>
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
