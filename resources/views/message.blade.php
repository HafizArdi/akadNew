<title>Profile - AKAD</title>
@extends('layouts.sidebarAdmin')
@section('content')
<main class="pt-5 mx-lg-5 ">
    <div id="main-panel" class="col-md-12 ">
        <div style="margin-top:50px;" class="row ">
            <div class="col-md-12 ">
                <div class="card mb-4 wow fadeIn">
                    <div class="card-body d-sm-flex justify-content-between">
                        <h4 class="mb-2 mb-sm-0 pt-1">
                            <a href="/" target="_blank">Home</a>
                            <span>/</span>
                            <span>Message</span>
                        </h4>
                        <h4 class="mb-2 mb-sm-0 pt-1">
                            <a data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></a>
                        </h4>
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Pesan Baru</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @foreach($chat as $data)
                                <div class="media">
                                    <div class="media-left">
                                        <img src="image/{{$data->foto}}" alt="Demo Avatar John Doe" class="img-responsive" style="width:60px;">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">{{$data->name}}</h5>
                                        <br>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container"></div>
                    <div class="row wow fadeIn ">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="panel-body">
                                        <div class="showKoment">
                                            @foreach($chat as $data)
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="image/{{$data->foto}}" alt="Demo Avatar John Doe" class="img-responsive" style="width:60px;">
                                                </div>
                                                <div class="media-body">
                                                    <a href="{{url('/message/'.$data->id)}}"><h5 class="media-heading">{{$data->name}}</h5></a>
                                                    <span><small><i>{{$data->chat}}</i></small></span>
                                                    <br>
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
</main>
<script src="assets/plugins/jquery/jquery-3.1.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme-floyd.js"></script>
@endsection