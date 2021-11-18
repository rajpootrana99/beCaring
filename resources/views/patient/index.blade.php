@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Patients</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Patients</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
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
                        <div class="card-title mt-4">Patients
                            <a href="" data-toggle="modal" data-target="#addPatientDetail" id="addPatientDetailButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Patient </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Name</th>
                                    <th width="15%">Phone</th>
                                    <th width="20%">Email</th>
                                    <th width="3%"><i class="fa fa-edit"></i></th>
                                    <th width="3%"><i class="fa fa-trash"></i></th>
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
    <div class="modal fade" id="addPatientDetail" tabindex="-1" role="dialog" aria-labelledby="addPatientDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addPatientDetailLabel">Patient Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addPatientDetailForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="first_name" class="col-form-label text-right">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="first_name" >
                                    <span class="text-danger error-text first_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="last_name" class="col-form-label text-right">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="last_name" >
                                    <span class="text-danger error-text last_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-right">Email</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-right">Password</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                    <span class="text-danger error-text password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-form-label text-right">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                    <span class="text-danger error-text password_confirmation_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label text-right">Phone</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Enter Cell No" id="phone">
                                    <span class="text-danger error-text phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address-input" name="address" class="form-control map-input">
                                    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                                    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="image" class="col-form-label text-right">Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
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

    <div class="modal fade" id="editPatientDetail" tabindex="-1" role="dialog" aria-labelledby="editPatientDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editPatientDetailLabel">Patient Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editPatientDetailForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_first_name" class="col-form-label text-right">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="edit_first_name" >
                                    <span class="text-danger error-text first_name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_last_name" class="col-form-label text-right">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="edit_last_name" >
                                    <span class="text-danger error-text last_name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_phone" class="col-form-label text-right">Phone</label>
                                    <input class="form-control" type="text" name="phone" id="edit_phone">
                                    <span class="text-danger error-text phone_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_email" class="col-form-label text-right">Email</label>
                                    <input class="form-control" type="email" readonly name="email" id="edit_email">
                                    <span class="text-danger error-text email_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="edit_image" class="col-form-label text-right">Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="edit_image">
                                    <label class="custom-file-label" for="edit_image">Choose file</label>
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

    <div class="modal fade" id="deletePatientDetail" tabindex="-1" role="dialog" aria-labelledby="deletePatientDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deletePatientDetailLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deletePatientDetailForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="user_id" name="user_id">
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

            fetchPatients();

            function fetchPatients()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchPatients",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.patients, function (key, patient) {
                            $('tbody').append('<tr>\
                            <td>'+patient.id+'</td>\
                            <td>'+patient.first_name+' '+patient.last_name +'</td>\
                            <td>'+patient.phone+'</td>\
                            <td>'+patient.email+'</td>\
                            <td><button value="'+patient.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+patient.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#deletePatientDetail').modal('show');
                $('#user_id').val(user_id)
            });

            $(document).on('submit', '#deletePatientDetailForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'patient/'+user_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deletePatientDetail').modal('hide');
                        }
                        else {
                            fetchPatients();
                            $('#deletePatientDetail').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#editPatientDetail').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'patient/'+user_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editPatientDetail').modal('hide');
                        }
                        else {
                            console.log(response.patient);
                            $('#user_id').val(response.patient.id);
                            $('#edit_first_name').val(response.patient.first_name);
                            $('#edit_last_name').val(response.patient.last_name);
                            $('#edit_email').val(response.patient.email);
                            $('#edit_phone').val(response.patient.phone);
                        }
                    }
                });
            });

            $(document).on('submit', '#editPatientDetailForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();
                let EditFormData = new FormData($('#editPatientDetailForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "patient/"+user_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editPatientDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editPatientDetailForm')[0].reset();
                            $('#editPatientDetail').modal('hide');
                            fetchPatients();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editPatientDetail').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addPatientDetailForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addPatientDetailForm')[0]);
                $.ajax({
                    type: "post",
                    url: "patient",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addPatientDetail').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addPatientDetailForm')[0].reset();
                            $('#addPatientDetail').modal('hide');
                            fetchPatients();
                        }
                    },
                    error: function (error){
                        $('#addPatientDetail').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
