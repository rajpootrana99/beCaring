@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Notifications</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Notifications</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mt-4">Notifications
                        <a href="" data-toggle="modal" data-target="#addNotificationDetail" id="addNotificationDetailButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Notification </a>
                    </div>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Title</th>
                                    <th width="15%">Body</th>
                                    <!-- <th width="3%"><i class="fa fa-edit"></i></th> -->
                                    <th width="3%"><i class="fa fa-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <!--end /table-->
                    </div>
                    <!--end /tableresponsive-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
<!-- Modal -->
<div class="modal fade" id="addNotificationDetail" tabindex="-1" role="dialog" aria-labelledby="addNotificationDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="addNotificationDetailLabel">Notification Detail</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <!--end modal-header-->
            <form method="post" id="addNotificationDetailForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label text-right">Title</label>
                                <input class="form-control" type="text" name="title" id="title">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="body" class="col-form-label text-right">Description</label>
                                <input class="form-control" type="text" name="body" id="body">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
                <!--end modal-footer-->
            </form>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!-- 
<div class="modal fade" id="editPatientDetail" tabindex="-1" role="dialog" aria-labelledby="editPatientDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="editPatientDetailLabel">Notification Detail</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <form method="post" id="editPatientDetailForm" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_name" class="col-form-label text-right">Title</label>
                                <input class="form-control" type="text" name="name" id="edit_name">
                                <span class="text-danger error-text name_update_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_phone" class="col-form-label text-right">Description</label>
                                <input class="form-control" type="text" name="phone" id="edit_phone">
                                <span class="text-danger error-text phone_update_error"></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- 
<div class="modal fade" id="deletePatientDetail" tabindex="-1" role="dialog" aria-labelledby="deletePatientDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="deletePatientDetailLabel">Delete</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <form method="post" id="deletePatientDetailForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="user_id" name="user_id">
                        <p class="mb-4">Are you sure want to delete?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // fetchPatients();

        // function fetchPatients() {
        //     $.ajax({
        //         type: "GET",
        //         url: "fetchPatients",
        //         dataType: "json",
        //         success: function(response) {
        //             $('tbody').html("");
        //             $.each(response.patients, function(key, patient) {
        //                 $('tbody').append('<tr>\
        //                     <td>' + patient.id + '</td>\
        //                     <td>' + patient.name + '</td>\
        //                     <td>' + patient.phone + '</td>\
        //                     <td>' + patient.email + '</td>\
        //                     <td><button value="' + patient.id + '" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
        //                     <td><button value="' + patient.id + '" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
        //             </tr>');
        //             });
        //         }
        //     });
        // }

        // $(document).on('click', '.delete_btn', function(e) {
        //     e.preventDefault();
        //     var user_id = $(this).val();
        //     $('#deletePatientDetail').modal('show');
        //     $('#user_id').val(user_id)
        // });

        // $(document).on('submit', '#deletePatientDetailForm', function(e) {
        //     e.preventDefault();
        //     var user_id = $('#user_id').val();

        //     $.ajax({
        //         type: 'delete',
        //         url: 'patient/' + user_id,
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.status == 0) {
        //                 $('#deletePatientDetail').modal('hide');
        //             } else {
        //                 fetchPatients();
        //                 $('#deletePatientDetail').modal('hide');
        //             }
        //         }
        //     });
        // });

        // $(document).on('click', '.edit_btn', function(e) {
        //     e.preventDefault();
        //     var user_id = $(this).val();
        //     $('#editPatientDetail').modal('show');
        //     $(document).find('span.error-text').text('');
        //     $.ajax({
        //         type: "GET",
        //         url: 'patient/' + user_id + '/edit',
        //         success: function(response) {
        //             if (response.status == 404) {
        //                 $('#editPatientDetail').modal('hide');
        //             } else {
        //                 console.log(response.patient);
        //                 $('#user_id').val(response.patient.id);
        //                 $('#edit_name').val(response.patient.name);
        //                 $('#edit_email').val(response.patient.email);
        //                 $('#edit_phone').val(response.patient.phone);
        //             }
        //         }
        //     });
        // });

        // $(document).on('submit', '#editPatientDetailForm', function(e) {
        //     e.preventDefault();
        //     var user_id = $('#user_id').val();
        //     let EditFormData = new FormData($('#editPatientDetailForm')[0]);

        //     $.ajax({
        //         type: "post",
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
        //             '_method': 'patch'
        //         },
        //         url: "patient/" + user_id,
        //         data: EditFormData,
        //         contentType: false,
        //         processData: false,
        //         beforeSend: function() {
        //             $(document).find('span.error-text').text('');
        //         },
        //         success: function(response) {
        //             if (response.status == 0) {
        //                 $('#editPatientDetail').modal('show')
        //                 $.each(response.error, function(prefix, val) {
        //                     $('span.' + prefix + '_update_error').text(val[0]);
        //                 });
        //             } else {
        //                 $('#editPatientDetailForm')[0].reset();
        //                 $('#editPatientDetail').modal('hide');
        //                 fetchPatients();
        //             }
        //         },
        //         error: function(error) {
        //             console.log(error)
        //             $('#editPatientDetail').modal('show');
        //         }
        //     });
        // })

        $(document).on('submit', '#addNotificationDetailForm', function(e) {
            e.preventDefault();
            let formDate = new FormData($('#addNotificationDetailForm')[0]);
            $.ajax({
                type: "post",
                url: "notification",
                data: formDate,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(response) {
                    if (response.status == 0) {
                        $('#addNotificationDetail').modal('show')
                        $.each(response.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#addNotificationDetailForm')[0].reset();
                        $('#addNotificationDetail').modal('hide');
                        // fetchPatients();
                    }
                },
                error: function(error) {
                    $('#addNotificationDetail').modal('show')
                }
            });
        });
    });
</script>
@endsection