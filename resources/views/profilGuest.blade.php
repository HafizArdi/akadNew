<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>AKAD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/mdb/css/bootstrap.min.css" rel="stylesheet">
	<link href="/mdb/css/mdb.min.css" rel="stylesheet">
	<link href="/mdb/css/style.min.css" rel="stylesheet">
	<style type="text/css">
		.form-control{
			align: center;
		}
	</style>
</head>
<body class="grey lighten-3">
	<header>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
			<div class="container-fluid">
				<a class="navbar-brand waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/"
				target="_blank">
					<strong class="blue-text">AKAD</strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link waves-effect" href="#"><i class="fa fa-home mr-2"></i> Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
					</ul>
					<ul class="navbar-nav nav-flex-icons">
						<li class="nav-item">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" class="nav-link waves-effect">
								<i class="fa fa-sign-out mr-2"></i>Keluar
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="sidebar-fixed position-fixed">
			<div class="sidebar-avatar-image">
				<span><img style="border-radius:20px; margin: 10px 60px;" src="/image/{{Auth::user()->foto}}" width="100px" height="125px" align="center"></span>
			</div>
			<div class="sidebar-avatar">
				<div style="margin: 10px auto;text-align: center;"class="sidebar-avatar-text"> <strong>{{ Auth::user()->name }}</strong></div>
			</div>
			<div class="list-group list-group-flush">
				<a href="{{ url('/dashboardGuest') }}" class="list-group-item list-group-item-action waves-effect">
					<i class="fa fa-pie-chart mr-3"></i>Dashboard
				</a>
				<a href="{{ url('/profilGuest/'.Auth::user()->id)}}" class="list-group-item active waves-effect">
					<i class="fa fa-user mr-3"></i>Profile</a>
				<a href="{{ url('/daftarKadesGuest/'.Auth::user()->id)}}" class="list-group-item list-group-item-action waves-effect">
					<i class="fa fa-table mr-3"></i>Daftar Kepala Desa</a>
				<a href="{{ url('/laporanSayaGuest/'.Auth::user()->id) }}" class="list-group-item list-group-item-action waves-effect">
					<i class="fa fa-map mr-3"></i>Laporan Saya</a>
			</div>
		</div>
	</header>
	<main class="pt-5 mx-lg-5 ">
		<div id="main-panel" class="col-md-12 ">
			<div style="margin-top:50px;" class="row ">
				<div class="col-md-12 ">
					<div class="card mb-4 wow fadeIn">
						<div class="card-body d-sm-flex justify-content-between">
							<h4 class="mb-2 mb-sm-0 pt-1">
								<a href="/" target="_blank">Home</a>
								<span>/</span>
								<span>Dashboard</span>
							</h4>
						</div>
					</div>
					<div class="row wow fadeIn ">
						<div class="col-md-12 mb-4 ">
							<div class="card">
								<div class="card-body ">
									<h3 class="panel-title">Profil {{ Auth::user()->name }}</h3>
									<div class="panel-body">
										<form enctype="multipart/form-data" action="/updateProfil/{{Auth::user()->id}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
											{{ csrf_field() }}
											<div class="form-group">
												<label class="col-sm-6 control-label"></label>
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
	</main>
	<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
		<div class="pt-4">
			<a class="btn btn-outline-white" href="#" target="_blank" role="button">
				PLAYSTORE
				<i class="fa fa-play ml-2"></i>
			</a>
			<a class="btn btn-outline-white" href="#" target="_blank" role="button">
				APPSTORE
				<i class="fa fa-apple ml-2"></i>
			</a>
		</div>
		<hr class="my-4">
		<div class="footer-copyright py-3">
			© 2018 Copyright
			<a href="#" target="_blank"> Ayo Kawal Anggaran Desa </a>
		</div>
	</footer>
	<script type="text/javascript" src="mdb/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="mdb/js/popper.min.js"></script>
	<script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="mdb/js/mdb.min.js"></script>
	<script type="text/javascript">
		new WOW().init();
	</script>
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
	<script>
		// Line
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
				datasets: [{
					label: '# of Votes',
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],

					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					
					borderWidth: 1
				}]
        	},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
    	});

		//pie
		var ctxP = document.getElementById("pieChart").getContext('2d');
		var myPieChart = new Chart(ctxP, {
			type: 'pie',
			data: {
				labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
				datasets: [{
					data: [300, 50, 100, 40, 120],
					backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
					hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
				}]
			},
			options: {
				responsive: true,
				legend: false
			}
		});

		//line
		var ctxL = document.getElementById("lineChart").getContext('2d');
		var myLineChart = new Chart(ctxL, {
			type: 'line',
			data: {
				labels: ["January", "February", "March", "April", "May", "June", "July"],
				datasets: [{
					label: "My First dataset",
					backgroundColor: [
						'rgba(105, 0, 132, .2)',
					],
					borderColor: [
						'rgba(200, 99, 132, .7)',
					],
					borderWidth: 2,
					data: [65, 59, 80, 81, 56, 55, 40]
				},
					{
						label: "My Second dataset",
						backgroundColor: [
							'rgba(0, 137, 132, .2)',
						],
						borderColor: [
							'rgba(0, 10, 130, .7)',
						],
						data: [28, 48, 40, 19, 86, 27, 90]
					}
				]
			},
			options: {
				responsive: true
			}
		});

		//radar
		var ctxR = document.getElementById("radarChart").getContext('2d');
		var myRadarChart = new Chart(ctxR, {
			type: 'radar',
			data: {
				labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
				datasets: [{
					label: "My First dataset",
					data: [65, 59, 90, 81, 56, 55, 40],
					backgroundColor: [
						'rgba(105, 0, 132, .2)',
					],
					borderColor: [
						'rgba(200, 99, 132, .7)',
					],
					borderWidth: 2
				}, {
					label: "My Second dataset",
					data: [28, 48, 40, 19, 96, 27, 100],
					backgroundColor: [
						'rgba(0, 250, 220, .2)',
					],
					borderColor: [
						'rgba(0, 213, 132, .7)',
					],
					borderWidth: 2
				}]
			},
			options: {
				responsive: true
			}
		});

		//doughnut
		var ctxD = document.getElementById("doughnutChart").getContext('2d');
		var myLineChart = new Chart(ctxD, {
			type: 'doughnut',
			data: {
				labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
				datasets: [{
					data: [300, 50, 100, 40, 120],
					backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
					hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
				}]
			},
			options: {
				responsive: true
			}
		});
	</script>
	<script src="https://maps.google.com/maps/api/js"></script>
	<script>
		function regular_map() {
			var var_location = new google.maps.LatLng(40.725118, -73.997699);

			var var_mapoptions = {
				center: var_location,
				zoom: 14
			};

			var var_map = new google.maps.Map(document.getElementById("map-container"),
				var_mapoptions);

			var var_marker = new google.maps.Marker({
				position: var_location,
				map: var_map,
				title: "New York"
			});
		}
    	google.maps.event.addDomListener(window, 'load', regular_map);
	</script>
</body>
