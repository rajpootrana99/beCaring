@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Appointments</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Appointments</a></li>
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
                        <div class="card-title mt-4">Appointments
                            <a href="" data-toggle="modal" data-target="#addAppointment" id="addAppointmentButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Appointment </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Nurse Name</th>
                                    <th width="20%">Patient Name</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Time</th>
                                    <th width="10%">Rate</th>
                                    <th width="15%">Status</th>
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
    <div class="modal fade" id="addAppointment" tabindex="-1" role="dialog" aria-labelledby="addAppointmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addAppointmentLabel">Appointment</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addAppointmentForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nurse_id" class="col-form-label text-right">Select Nurse</label>
                                    <select class="select2 mb-3 form-control custom-select" name="nurse_id" id="nurse_id" style="width: 100%; height:36px;" data-placeholder="Select Nurse">

                                    </select>
                                    <span class="text-danger error-text nurse_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="patient_id" class="col-form-label text-right">Select Patient</label>
                                    <select class="select2 mb-3 form-control custom-select" name="patient_id" id="patient_id" style="width: 100%; height:36px;" data-placeholder="Select Patient">

                                    </select>
                                    <span class="text-danger error-text patient_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date" class="col-form-label text-right">Date</label>
                                    <input class="form-control" type="date" name="date" id="date">
                                    <span class="text-danger error-text date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="time" class="col-form-label text-right">Time</label>
                                    <input class="form-control" type="time" name="time" id="time">
                                    <span class="text-danger error-text time_error"></span>
                                </div>
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

    <div class="modal fade" id="editAppointment" tabindex="-1" role="dialog" aria-labelledby="editAppointmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editAppointmentLabel">Appointment</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editAppointmentForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="appointment_id" id="appointment_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_nurse_id" class="col-form-label text-right">Select Nurse</label>
                                    <select class="select2 mb-3 form-control custom-select" name="nurse_id" id="edit_nurse_id" style="width: 100%; height:36px;" data-placeholder="Select Nurse">

                                    </select>
                                    <span class="text-danger error-text nurse_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_patient_id" class="col-form-label text-right">Select Patient</label>
                                    <select class="select2 mb-3 form-control custom-select" name="patient_id" id="edit_patient_id" style="width: 100%; height:36px;" data-placeholder="Select Patient">

                                    </select>
                                    <span class="text-danger error-text patient_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_date" class="col-form-label text-right">Date</label>
                                    <input class="form-control" type="text" name="date" id="edit_date" >
                                    <span class="text-danger error-text date_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_time" class="col-form-label text-right">Time</label>
                                    <input class="form-control" type="text" name="time" id="edit_time">
                                    <span class="text-danger error-text time_update_error"></span>
                                </div>
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

    <div class="modal fade" id="deleteAppointment" tabindex="-1" role="dialog" aria-labelledby="deleteAppointmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteAppointmentLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteAppointmentForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="appointment_id" name="appointment_id">
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

            fetchAppointments();

            function fetchAppointments()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchAppointments",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.appointments, function (key, appointment) {
                            $('tbody').append('<tr>\
                            <td>'+appointment.id+'</td>\
                            <td>'+appointment.nurse.name+'</td>\
                            <td>'+appointment.patient.name+'</td>\
                            <td>'+appointment.date+'</td>\
                            <td>'+appointment.time+'</td>\
                            <td>'+appointment.rate+'</td>\
                            <td>'+appointment.status+'</td>\
                            <td><button value="'+appointment.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+appointment.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            function fetchNurses()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchNurses",
                    dataType: "json",
                    success: function (response) {
                        var nurse_id = $('#nurse_id');
                        $('#nurse_id').children().remove().end()
                        $.each(response.nurses, function (nurse) {
                            nurse_id.append($("<option />").val(response.nurses[nurse].id).text(response.nurses[nurse].name));
                        });
                    }
                });
            }

            function fetchPatients()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchPatients",
                    dataType: "json",
                    success: function (response) {
                        var patient_id = $('#patient_id');
                        $('#patient_id').children().remove().end()
                        $.each(response.patients, function (patient) {
                            patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].name));
                        });
                    }
                });
            }

            $(document).on('click', '#addAppointmentButton', function (e) {
                e.preventDefault();
                $('#addAppointment').modal('show');
                fetchPatients();
                fetchNurses();
                $(document).find('span.error-text').text('');
            });

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var appointment_id = $(this).val();
                $('#deleteAppointment').modal('show');
                $('#appointment_id').val(appointment_id)
            });

            $(document).on('submit', '#deleteAppointmentForm', function (e) {
                e.preventDefault();
                var appointment_id = $('#appointment_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'appointment/'+appointment_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteAppointment').modal('hide');
                        }
                        else {
                            fetchAppointments();
                            $('#deleteAppointment').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var appointment_id = $(this).val();
                $('#editAppointment').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'appointment/'+appointment_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editAppointment').modal('hide');
                        }
                        else {
                            var nurse_id = $('#edit_nurse_id');
                            $('#edit_nurse_id').children().remove().end()
                            $.each(response.nurses, function (nurse) {
                                nurse_id.append($("<option />").val(response.nurses[nurse].id).text(response.nurses[nurse].name));
                            });
                            var patient_id = $('#edit_patient_id');
                            $('#edit_patient_id').children().remove().end()
                            $.each(response.patients, function (patient) {
                                patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].name));
                            });
                            $('#appointment_id').val(response.appointment.id);
                            $('#edit_date').val(response.appointment.date);
                            $('#edit_time').val(response.appointment.time);
                            $('#edit_nurse_id').val(response.appointment.nurse_id).change();
                            $('#edit_patient_id').val(response.appointment.patient_id).change();
                        }
                    }
                });
            });

            $(document).on('submit', '#editAppointmentForm', function (e) {
                e.preventDefault();
                var appointment_id = $('#appointment_id').val();
                let EditFormData = new FormData($('#editAppointmentForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "appointment/"+appointment_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editAppointment').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editAppointmentForm')[0].reset();
                            $('#editAppointment').modal('hide');
                            fetchAppointments();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editAppointment').modal('show');
                    }
                });
            })

            $(document).on('submit', '#addAppointmentForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addAppointmentForm')[0]);
                $.ajax({
                    type: "post",
                    url: "appointment",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addAppointment').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addAppointmentForm')[0].reset();
                            $('#addAppointment').modal('hide');
                            fetchAppointments();
                        }
                    },
                    error: function (error){
                        $('#addAppointment').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
