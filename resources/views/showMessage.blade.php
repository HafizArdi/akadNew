<title>Profile - AKAD</title>
@extends('layouts.sidebarAdmin')
@section('extrahead')
    <link rel="stylesheet" href="{{ url('mdb/css/adminlte.min.css')}}"> 
@endsection
@section('content')
@foreach($view as $data)
<meta name="friendId" content="{{ $data->id }}">
<main class="pt-5 mx-lg-5 ">
    <div id="main-panel" class="col-md-12 ">
        <div style="margin-top:50px;" class="row ">
            <div class="col-md-12 ">
                <div class="card mb-4 wow fadeIn">
                    <div class="card-body d-sm-flex justify-content-between">
                        <h4 class="mb-2 mb-sm-0 pt-1">
                            <a href="{{ route('chat.index') }}"><i class="fa fa-arrow-left"></i></a>
                            <span> {{ $data->name }} </span>
                        </h4>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="row wow fadeIn">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card direct-chat direct-chat-warning">
                                <div class="card-body">
                                    <chat v-bind:chats="chats"></chat>
                                    <!-- <div class="direct-chat-messages">
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                            </div>
                                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                            <div class="direct-chat-text">
                                                Is this template really for free? That's unbelievable!
                                            </div>
                                        </div>
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                            </div>
                                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                            <div class="direct-chat-text">
                                                You better believe it!
                                            </div>
                                        </div>
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                            </div>
                                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                            <div class="direct-chat-text">
                                                Working with AdminLTE on a great new app! Wanna join?
                                            </div>
                                        </div>
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                            </div>
                                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                            <div class="direct-chat-text">
                                                I would love to.
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-footer">
                                    <!-- <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                            <span class="input-group-append">
                                            <button type="button" class="btn btn-warning">Send</button>
                                            </span>
                                        </div>
                                    </form> -->
                                    <!-- <chat-form
                                        v-on:messagesent="addMessage"
                                        :user="{{ Auth::user() }}"
                                    ></chat-form> -->
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>                     
            </div>
        </div>
    </div>
</main>
@endforeach  
@endsection
@section('extrascript')
    <script src="{{ url('mdb/js/adminlte.js')}}"></script>
@endsection