@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Chat</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="chat-box-left">
                    <div class="chat-search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="chat-search" name="chat-search" class="form-control form-control-sm" placeholder="Search">
                                <span class="input-group-append">
                                                <button type="button" class="btn btn-soft-primary btn-sm shadow-none"><i class="fas fa-search"></i></button>
                                            </span>
                            </div>
                        </div>
                    </div><!--end chat-search-->

                    <div data-simplebar>
                        <div class="tab-content chat-list" id="pills-tabContent" >
                            <div class="tab-pane fade show active" id="general_chat">
                                <a href="" class="media new-message">
                                    <div class="media-left">
                                        <img src="assets/images/users/user-1.jpg" alt="user" class="rounded-circle thumb-md">
                                        <span class="round-10 bg-success"></span>
                                    </div><!-- media-left -->
                                    <div class="media-body">
                                        <div class="d-inline-block">
                                            <h6>Daniel Madsen</h6>
                                            <p>Good morning! Congratulations Friend...</p>
                                        </div>
                                        <div>
                                            <span>20 Feb</span>
                                            <span>3</span>
                                        </div>
                                    </div><!-- end media-body -->
                                </a> <!--end media-->
                                <a href="" class="media">
                                    <div class="media-left">
                                        <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
                                        <span class="round-10 bg-secondary"></span>
                                    </div><!-- media-left -->
                                    <div class="media-body">
                                        <div>
                                            <h6>Mary Schneider</h6>
                                            <p>Have A Nice day...</p>
                                        </div>
                                        <div>
                                            <span>14 Feb</span>
                                        </div>
                                    </div><!-- end media-body -->
                                </a> <!--end media-->
                                <a href="" class="media">
                                    <div class="media-left">
                                        <img src="assets/images/users/user-5.jpg" alt="user" class="rounded-circle thumb-md">
                                        <span class="round-10 bg-success"></span>
                                    </div><!-- media-left -->
                                    <div class="media-body">
                                        <div>
                                            <h6>David Herrmann</h6>
                                            <p>Good morning! How are you?</p>
                                        </div>
                                        <div>
                                            <span>10 Feb</span>
                                        </div>
                                    </div><!-- end media-body -->
                                </a>  <!--end media-->
                            </div>
                        </div><!--end tab-content-->
                    </div>
                </div><!--end chat-box-left -->

                <div class="chat-box-right">
                    <div class="chat-header">
                        <a href="" class="media">
                            <div class="media-left">
                                <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
                            </div><!-- media-left -->
                            <div class="media-body">
                                <div>
                                    <h6 class="m-0">Mary Schneider</h6>
                                    <p class="mb-0">Last seen: 2 hours ago</p>
                                </div>
                            </div><!-- end media-body -->
                        </a><!--end media-->
                        <div class="chat-features">
                            <div class="d-none d-sm-inline-block">
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div><!-- end chat-features -->
                    </div><!-- end chat-header -->
                    <div class="chat-body" data-simplebar>
                        <div class="chat-detail">
                            <div class="media">
                                <div class="media-body reverse">

                                </div><!--end media-body-->
                                <div class="media-img">
                                    <img src="assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-md">
                                </div>
                            </div> <!--end media-->
                        </div>  <!-- end chat-detail -->
                    </div><!-- end chat-body -->
                    <div class="chat-footer">
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <span class="chat-admin"><img src="assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-sm"></span>
                                <input type="text" class="form-control" id="chatInput" placeholder="Type something here...">
                            </div><!-- col-8 -->
                            <div class="col-3 text-right">
                                <div class="d-none d-sm-inline-block chat-features">
                                    <a href=""><i class="fas fa-camera"></i></a>
                                    <a href=""><i class="fas fa-paperclip"></i></a>
                                    <a href=""><i class="fas fa-microphone"></i></a>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end chat-footer -->
                </div><!--end chat-box-right -->
            </div> <!-- end col -->
        </div><!-- end row -->
    </div>

    <script>
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        $(function (){
            let ip_address = '127.0.0.1';
            let socket_port = '3000';
            let socket = io(ip_address + ':' + socket_port);
            let chatInput = $('#chatInput');
            chatInput.keypress(function (e){
                let message = $(this).val();
                console.log(message);
                if (e.which === 13 && !e.shiftKey) {
                    socket.emit('sendChatToServer', message);
                    chatInput.val('');
                    return false;
                }
            });
            socket.on('sendChatToClient', (message) => {
                $('.chat-detail .media .media-body').append('<div class="chat-msg"><p>'+message+'</p></div>');
            })
        })
    </script>
@endsection
