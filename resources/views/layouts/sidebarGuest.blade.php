<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AKAD - Dashboard</title>
	<link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/theme-floyd.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/theme-helper.css')}}">
	<style>
            html, body {
                background-color: white;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            </style>
</head>

<body>
	<div id="wrapper">
		<div id="sidebar">
			<div id="sidebar-wrapper">
				<div class="sidebar-title">


				</div>
				<div>
					<div class="sidebar-avatar-image">
						<span><img style="border-radius:20px;" src="/image/{{Auth::user()->foto}}" width="100px" height="125px" align=center></span>
					</div>
				</div>


				<div class="sidebar-avatar">
					 <div class="sidebar-avatar-text"> {{ Auth::user()->name }} </div>
				</div>


				<ul class="sidebar-nav">

						<li><a href="{{ url('/dashboardGuest') }}"> <span>Dashboard</span></a></li>

					<li><a href="{{ url('/profilGuest/'.Auth::user()->id)}}"> <span>Profil</span></a></li>

					<li><a href="{{ url('/daftarKadesGuest/'.Auth::user()->id)}}"> <span>Daftar Kepala Desa</span></a></li>

					<li><a href="{{ url('/laporanSayaGuest/'.Auth::user()->id) }}"> <span>Laporan Saya</span></a></li>

					<li><a href="{{ url('/timelineGuest/')}}"><span>Berita</span></a></li>

					<li><a href="{{ route('logout') }}"
							onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
						<span>Logout</span>
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
					</form>
				</li>
					<!-- <li>
							<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
									Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
							</form>
					</li> -->


					</ul>
				<div class="sidebar-footer">
					<hr style="border-color: #DDD">
					 </a><br>
				</div>
				<div class="sidebar-avatar-image"></div><br>
			</div>
		</div>

			@yield('content')
	</div>
	<script src="{{url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
	<script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/js/theme-floyd.js')}}"></script>


	@yield('script')
</body>


</html>
