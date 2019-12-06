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
                                <span>Laporan Saya</span>
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-offset-3" style="margin-top: -15px; margin-bottom: 5px;"> <a href="{{ url('/buatLaporanKades/'.Auth::User()->id) }}"><button type="submit" class="btn btn-success"> <font color="white">Buat Laporan</font></button></a></div>
                    <div class="row wow fadeIn">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div id="main-panel">
                                        <div id="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            @foreach($view as $data)
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <article>
                                                                        <div style="margin-left: 10px;" class="row">
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <img src="/image/{{$data->user->foto}}" alt="Demo Avatar John Doe" class="img-responsive" style="width:60px;">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$data->user->name}} </h4>
                                                                                    <span><small><i>Posted on {{$data->created_at}}</i></small></span>
                                                                                    <span><small><i>Sebagai {{$data->user->lev->level}}</i></small></span>
                                                                                    <br>
                                                                                    <span><small><i>Kelurahan {{$data->laporanKelurahan->kelurahan}}, Kecamatan {{$data->laporanKecamatan->kecamatan}}</i></small></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="my-4">
                                                                        <img src="/laporan/{{$data->fotoLaporan}}" class="img-fluid">
                                                                        <br />
                                                                        <hr class="my-4">
                                                                        <div class="col-md-12 mb-4" style="text-align: justify-all;">
                                                                            <blockquote class="blockquote">
                                                                                <p class="lead">{{$data->laporan}}</p>
                                                                            </blockquote>
                                                                        </div><br />
                                                                        <div class="container">
                                                                            <form method="POST" id="comment_form">
                                                                                {{ csrf_field() }}
                                                                                <div class="form-group">
                                                                                    <input type="hidden"  id="comment_name" name="comment_name" value="{{ Auth::user()->name }} " class="form-control">
                                                                                    <input type="hidden"  id="laporanid" name="laporanid" value="{{ $data->idLaporan }} " class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="readonly" name="comment_content"  class="form-control comment_content{{$data->idLaporan}}" placeholder="masukkan komen"></textarea>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="button" class="btn btn-info inputcommand" data-id="{{$data->idLaporan}}" data-iduser="{{ Auth::user()->id }}" data-user ="{{ Auth::user()->name }} "value="Kirim Komentar"/>
                                                                                </div>
                                                                            </form>
                                                                            <span id="comment_message"></span>
                                                                            <br />
                                                                            <div id="display_comment"></div>
                                                                        </div>
                                                                        <h4>Komentar</h4>
                                                                        <div style="margin-left: 10px;" class="row">
                                                                            <div class="grupKomentar{{$data->idLaporan}}" >
                                                                                @foreach($lihat as $komen)
                                                                                    @if($komen->laporan == $data->idLaporan)
                                                                                        <div class="showKoment">
                                                                                            <div class="media">
                                                                                                <div class="media-left">
                                                                                                    <img src="/image/{{$komen->komensender->foto}}" alt="Demo Avatar John Doe" class="img-responsive" style="width:60px;">
                                                                                                </div>
                                                                                                <div class="media-body">
                                                                                                    <h5 class="media-heading">{{$komen->comment_sender}} </h5>
                                                                                                    <span><small><i>{{$komen->comment}}</i></small></span>
                                                                                                    <br>
                                                                                                </div>
                                                                                            </div>
                                                                                    @endif
                                                                                    @endforeach
                                                                                </div>
                                                                             </div>
                                                                    </article>
                                                                    <br>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        @endforeach
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
    <script src="/assets/plugins/jquery/jquery-3.1.1.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/theme-floyd.js"></script>
    <script>
        $(document).ready(function(){
            $('.inputcommand input').on('click',function(){
                var form_data = $(this).data('id');
                var user=$(this).data('user');
                var iduser=$(this).data('iduser');
                var comand= $('.comment_content'+form_data).val();
                console.log(form_data);
                console.log(comand);
                var urldata = "{{url('/komenkades/komentar')}}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    dataType:"json",
                    url:urldata,
                    data: {'_token':$('input[name=_token]').val(),'idlaporan':form_data, 'komentar':comand,'user':user, 'iduser':iduser},
                    success:function(data)
                    {

                        /*	console.log(data);
                            $('.grupKomentar'+form_data).append("<img src='image/"+data.foto+"' style='width: 50px;height: 50px;object-fit: cover;'><div class='showKoment'><h5>"+user+"</h5><p>"+comand+"</p></div>");
                             $('.comment_content'+form_data).val("");*/

                        console.log(data);
                        $('.grupKomentar'+form_data).append("<div class='showKoment'><div class='media'><div class='media-left'><img src='/image/"+data.foto+"' alt='Demo Avatar John Doe' class='img-responsive' style='width:60px;'></div><div class='media-body'><h5 class='media-heading'>"+user+" </h5><span><small><i>"+comand+"</i></small></span><br></div></div>");
                        $('.comment_content'+form_data).val("");


                    },
                    error:function(data)
                    {
                        console.log(data);
                        console.log("error");
                    }
                });

            });
// function load_commment(){
// 	$.ajax({
// 		url:"fetch_comment.php",
// 		method:"POST",
// 		success:function(data)
// 		{
// 			$('#display_comment').html(data);
// 		}
// 	})
// }

        });
    </script>
@endsection
