<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">
	<title>AKAD</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="{{ url('mdb/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ url('mdb/css/mdb.min.css')}}" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="{{ url('mdb/css/style.min.css')}}" rel="stylesheet">
	@yield('extrahead')
</head>
<body class="grey lighten-3">
<div id="app">
<!--Main Navigation-->
<header>

	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
		<div class="container-fluid">

			<!-- Brand -->
			<a class="navbar-brand waves-effect" href="#"
			   target="_blank">
				<strong class="blue-text">AKAD</strong>
			</a>

			<!-- Collapse -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Links -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<!-- Left -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link waves-effect" href="#"><i class="fa fa-home mr-2"></i> Home
							<span class="sr-only">(current)</span>
						</a>
					</li>

				</ul>

				<!-- Right -->
				<ul class="navbar-nav nav-flex-icons">
					<li class="nav-item">
						<li class="nav-item">
							<a class="nav-link waves-effect" href="{{ route('chat.index') }}"><i class="fa fa-paper-plane-o mr-2"></i>Message</a>
						</li>
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
	<!-- Navbar -->

	<!-- Sidebar -->
	<div class="sidebar-fixed position-fixed">

		<div class="sidebar-avatar-image">
			<span><img style="border-radius:20px; margin: 10px 60px;" src="/image/{{Auth::user()->foto}}" width="100px" height="125px" align="center"></span>
		</div>
		<div class="sidebar-avatar">
			<div style="margin: 10px auto;text-align: center;"class="sidebar-avatar-text"> <strong>{{ Auth::user()->name }}</strong></div>
		</div>
		<div class="list-group list-group-flush">
			<a href="{{ url('/dashboardAdmin') }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-pie-chart mr-3"></i>Dashboard
			</a>
			<a href="{{ url('/profilAdmin/'.Auth::user()->id)}}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-user mr-3"></i>Profile</a>
			<a href="{{ url('/manageUser') }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-pie-chart mr-3"></i>Manajemen User
			</a>
			<a href="{{ url('/daftarKadesAdmin/')}}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-table mr-3"></i>Daftar Kepala Desa</a>
			<a href="{{ url('/registerKades')}}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-pencil-square-o mr-3"></i>Buat Akun Kades</a>
			<a href="{{ url('/laporanSayaAdmin/'.Auth::user()->id) }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-map mr-3"></i>Laporan Saya</a>
		</div>

	</div>
	<!-- Sidebar -->

</header>
@yield('content')

<!--Main Navigation-->

<!--Main layout-->
<!--Main layout-->

<!--Footer-->

<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

	<!--Call to action-->
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
	<!--/.Call to action-->

	<hr class="my-4">



	<!--Copyright-->
	<div class="footer-copyright py-3">
		© 2018 Copyright
		<a href="#" target="_blank"> Ayo Kawal Anggaran Desa </a>
	</div>
	<!--/.Copyright-->

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/mdb/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/mdb/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/mdb/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>

<!-- Charts -->
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
@yield('extrascript')
</div>
</body>
</html>