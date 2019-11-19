<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Ayo Kawal Anggaran Desa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="mdb/css/bootstrap.min.css" rel="stylesheet">
	<link href="mdb/css/mdb.min.css" rel="stylesheet">
	<link href="mdb/css/cstyle.css" rel="stylesheet">
	<style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 1050px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 700px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
	</style>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <strong>AKAD</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fa fa-sign-in mr-2"></i>Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fa fa-user-plus mr-2"></i>Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="view full-page-intro">
            <video class="video-intro" autoplay loop muted>
                <source src="assets/Save_As.mp4" type="video/mp4" />
            </video>
            <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row d-flex h-100 justify-content-center align-items-center wow fadeIn">
                        <div class="col-md-6 mb-4 white-text text-center text-md-left">
                            <h1 class="display-4 font-weight-bold">Ayo Kawal Anggaran Desa</h1>
                            <hr class="hr-light">
                            <p>
                                <strong>Ayo Bantu Cegah Terjadinya Korupsi Dana Desa!</strong>
                            </p>
                            <p class="mb-4 d-none d-md-block">
                                <strong>AKAD membantu mengawal, mencatat dan mengawasi  aliran uang dan belanja pemerintahan daerah hanya dalam genggaman tangan, kapanpun dan dimanapun. Mewujudkan pemerintahan bersih dan transparan, menuju Indonesia maju!</strong>
                            </p>
                            <a target="_blank" href="#" class="btn btn-outline-white"><i class="fa fa-book ml-2"></i> Pelajari Lebih Lanjut</a>
                        </div>
                        <div class="col-md-6 col-xl-5 mb-4">
                            <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <hr class="my-5">
            <section>
                <h3 class="h3 text-center mb-5">Tentang AKAD</h3>
                <div class="row wow fadeIn">
                    <div class="col-lg-6 col-md-12 px-4">
                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fa fa-code fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title">Transparan</h5>
                                <p class="grey-text">Menjadikan pemerintah sebagai lembaga yang memegang prinsip keterbukaan atas semua tindakan dan kebijakan yang diambil.</p>
                            </div>
                        </div>
                        <div style="height:30px"></div>
                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fa fa-book fa-2x blue-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title">Akuntabel</h5>
                                <p class="grey-text">Mengambil konsep agar masyarakat dekat dengan administrasi publik pemerintahan.
                                </p>
                            </div>
                        </div>
                        <div style="height:30px"></div>
                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fa fa-graduation-cap fa-2x cyan-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title">Professional</h5>
                                <p class="grey-text">Website berjalan dengan professional dan independen tanpa campur tangan oleh pihak manapun.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <p class="h5 text-center mb-4">Apa itu AKAD ?</p>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/U58Ycyy_xQg" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>       
            </section>
            <hr class="my-5">
            <hr class="mb-5">
            <section>
                <h2 class="my-5 h3 text-center">... AKAD is built by</h2>
                <div class="row features-small mt-5 wow fadeIn">
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2 pl-3">
                                <h5 class="feature-title font-bold mb-1">Cross-browser compatibility</h5>
                                <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - AKAD loves all browsers; all browsers love MDB.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-level-up fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Frequent updates</h5>
                                <p class="grey-text mt-2">AKAD becomes better every month. We love the project and enhance as much as possible.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-comments-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Active community</h5>
                                <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is to be a part of our family.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">jQuery 3.x</h5>
                                <p class="grey-text mt-2">AKAD is integrated with newest jQuery. Therefore you can use all the latest features which come along with
                                                it.
                                </p>
                            </div>
                        </div>
                    </div>
                    new WOW().init();      </div>
                <div class="row features-small mt-4 wow fadeIn">
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Modularity</h5>
                                <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to use libraries including all features as
                                well as modules for CSS (SASS files) and JS.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Technical support</h5>
                                <p class="grey-text mt-2">We care about reliability. If you have any questions - do not hesitate to contact us.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                    <h5 class="feature-title font-bold mb-1">Flexbox</h5>
                                    <p class="grey-text mt-2">AKAD fully supports Flex Box. You can forget about alignment issues.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-file-code-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">SASS files</h5>
                                <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you compile them.</p>
                            </div>
                        </div>
                    </div>            
                </div>
            </section>
        </div>
    </main>
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">
        <div class="pt-4">
            <span><i class="fa fa-map-marker mr-3"></i>Jalan Kalimantan No. 37 Kampus Tegalboto Sumbersari, Krajan Timur, Sumbersari, Kabupaten Jember, Jawa Timur 68121</span>
        </div>
        <hr class="my-4">
        <div class="pb-4">
            <a href="#" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>
            <a href="#" target="_blank">
                <i class="fa fa-twitter mr-3"></i>
            </a>
            <a href="#" target="_blank">
                <i class="fa fa-youtube mr-3"></i>
            </a>
            <a href="#" target="_blank">
                <i class="fa fa-google-plus mr-3"></i>
            </a>
            <a href="#" target="_blank">
                <i class="fa fa-github mr-3"></i>
            </a>
        </div>
        <div class="footer-copyright py-3">
            © 2018 Copyright
            <a href="/" target="_blank">- Ayo Kawal Anggaran Desa</a>
        </div>
    </footer>
    <script type="text/javascript" src="mdb/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="mdb/js/popper.min.js"></script>
    <script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mdb/js/mdb.min.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
</body>
</html>