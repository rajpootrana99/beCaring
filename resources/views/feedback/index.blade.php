@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Trainings</h4>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-4">Trainings
                            <a href="" data-toggle="modal" data-target="#addTraining" id="addTrainingButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Training </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="17%">Media</th>
                                    <th>Title</th>
                                    <th width="3%">Modify</th>
                                    <th width="3%">Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addTraining" tabindex="-1" role="dialog" aria-labelledby="addTrainingLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addTrainingLabel">Patient Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addTrainingForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title" class="col-form-label text-right">First Name</label>
                                    <input class="form-control" type="text" name="title" id="title" >
                                    <span class="text-danger error-text title_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="media" class="col-form-label text-right">Media</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="media" id="media">
                                    <label class="custom-file-label" for="media">Choose Media</label>
                                </div>
                                <span class="text-danger error-text image_error"></span>
                            </div>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <div class="modal fade" id="editTraining" tabindex="-1" role="dialog" aria-labelledby="editTrainingLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editTrainingLabel">Patient Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editTrainingForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="training_id" id="training_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_title" class="col-form-label text-right">Title</label>
                                    <input class="form-control" type="text" name="title" id="edit_title" >
                                    <span class="text-danger error-text title_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="edit_media" class="col-form-label text-right">Media</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="media" id="edit_media">
                                    <label class="custom-file-label" for="edit_media">Choose Media</label>
                                </div>
                                <span class="text-danger error-text image_update_error"></span>
                            </div>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <div class="modal fade" id="deleteTraining" tabindex="-1" role="dialog" aria-labelledby="deleteTrainingLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteTrainingLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteTrainingForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="training_id" name="training_id">
                            <p class="mb-4">Are you sure want to delete?</p>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <script>
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            fetchTrainings();

            function fetchTrainings()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchTrainings",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.trainings, function (key, training) {
                            $('tbody').append('<tr>\
                            <td>'+training.id+'</td>\
                            <td><video width="180" height="100" controls><source src="storage/'+training.media+'"></video></td>\
                            <td>'+training.title+'</td>\
                            <td><button value="'+training.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+training.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var training_id = $(this).val();
                $('#deleteTraining').modal('show');
                $('#training_id').val(training_id)
            });

            $(document).on('submit', '#deleteTrainingForm', function (e) {
                e.preventDefault();
                var training_id = $('#training_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'training/'+training_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteTraining').modal('hide');
                        }
                        else {
                            fetchTrainings();
                            $('#deleteTraining').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var training_id = $(this).val();
                $('#editTraining').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'training/'+training_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editTraining').modal('hide');
                        }
                        else {
                            console.log(response.training);
                            $('#training_id').val(response.training.id);
                            $('#edit_title').val(response.training.title);
                        }
                    }
                });
            });

            $(document).on('submit', '#editTrainingForm', function (e) {
                e.preventDefault();
                var training_id = $('#training_id').val();
                let EditFormData = new FormData($('#editTrainingForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "training/"+training_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editTraining').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editTrainingForm')[0].reset();
                            $('#editTraining').modal('hide');
                            fetchTrainings();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editTraining').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addTrainingForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addTrainingForm')[0]);
                $.ajax({
                    type: "post",
                    url: "training",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addTraining').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addTrainingForm')[0].reset();
                            $('#addTraining').modal('hide');
                            fetchTrainings();
                        }
                    },
                    error: function (error){
                        $('#addTraining').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
