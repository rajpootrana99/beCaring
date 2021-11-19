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
                                    <th width="15%">Nurse Name</th>
                                    <th width="15%">Patient Name</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Start Time</th>
                                    <th width="10%">End Time</th>
                                    <th width="10%">Max Price/ hour</th>
                                    <th width="10%">Min Price/ hour</th>
                                    <th width="10%">Bid Price/ hour</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Type</th>
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
                <form method="post" id="addAppointmentForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="patient_id" class="col-form-label text-right">Select Patient</label>
                                    <select class="select2 mb-3 select2-multiple" name="patient_id[]" id="patient_id" style="width: 100%; height:36px;" data-placeholder="Select Patient" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text patient_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="date" class="col-form-label text-right">Date</label>
                                    <input class="form-control" type="date" name="date" id="date">
                                    <span class="text-danger error-text date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="start_time" class="col-form-label text-right">Start Time</label>
                                    <input class="form-control" type="time" name="start_time" id="start_time">
                                    <span class="text-danger error-text start_time_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="end_time" class="col-form-label text-right">End Time</label>
                                    <input class="form-control" type="time" name="end_time" id="end_time">
                                    <span class="text-danger error-text end_time_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="col-form-label text-right">Price</label>
                                    <input class="form-control" type="text" name="price" id="price">
                                    <span class="text-danger error-text price_error"></span>
                                </div>
                            </div>
                            <input type="hidden" name="max_price" id="max_price">
                            <input type="hidden" name="min_price" id="min_price">
                            <input type="hidden" name="bid_price" id="bid_price">
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
                <form method="post" id="editAppointmentForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="appointment_id" id="appointment_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_patient_id" class="col-form-label text-right">Select Patient</label>
                                    <select class="select2 mb-3 select2-multiple" name="patient_id[]" id="edit_patient_id" style="width: 100%; height:36px;" data-placeholder="Select Patient" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text patient_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_date" class="col-form-label text-right">Date</label>
                                    <input class="form-control" type="date" name="date" id="edit_date" >
                                    <span class="text-danger error-text date_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_start_time" class="col-form-label text-right">Start Time</label>
                                    <input class="form-control" type="time" name="start_time" id="edit_start_time">
                                    <span class="text-danger error-text start_time_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_end_time" class="col-form-label text-right">End Time</label>
                                    <input class="form-control" type="time" name="end_time" id="edit_end_time">
                                    <span class="text-danger error-text end_time_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_price" class="col-form-label text-right">Price</label>
                                    <input class="form-control" type="text" name="price" id="edit_price">
                                    <span class="text-danger error-text price_update_error"></span>
                                </div>
                            </div>

                            <input type="hidden" name="max_price" id="edit_max_price">
                            <input type="hidden" name="min_price" id="edit_min_price">
                            <input type="hidden" name="bid_price" id="edit_bid_price">
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
                        var options = new Array();
                        let i = 0;
                        $('tbody').html("");
                        $.each(response.appointments, function (key, appointment) {
                            if (appointment.nurse != null){
                                var nurse = appointment.nurse.first_name+' '+appointment.nurse.last_name;
                            }
                            else {
                                nurse = 'Not Assigned yet';
                            }
                            appointment.patients.forEach(function (p){
                                options[i] = p.first_name+' '+p.last_name;
                                i = i+1;
                            })
                            $('tbody').append('<tr>\
                            <td>'+appointment.id+'</td>\
                            <td>'+nurse+'</td>\
                            <td>'+options+'</td>\
                            <td>'+appointment.date+'</td>\
                            <td>'+appointment.start_time+'</td>\
                            <td>'+appointment.end_time+'</td>\
                            <td>'+parseFloat(appointment.max_price).toFixed(2)+'</td>\
                            <td>'+parseFloat(appointment.min_price).toFixed(2)+'</td>\
                            <td>'+parseFloat(appointment.bid_price).toFixed(2)+'</td>\
                            <td>'+appointment.status+'</td>\
                            <td>'+appointment.is_complete+'</td>\
                            <td><button value="'+appointment.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+appointment.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
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
                            patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].first_name+' '+response.patients[patient].last_name));
                        });
                    }
                });
            }

            $(document).on('change', '#price', function (e) {
                e.preventDefault();
                var price = $('#price').val();
                var max_price = parseInt(price) - ((parseInt(price) /100)*2);
                var min_price = max_price - ((max_price /100)*30);
                var date = $('#date').val();
                var current_date = new Date();
                date = new Date(date);
                var days_left = date.getDate()-current_date.getDate();
                var per = 30/days_left;
                var bid_price = min_price +((max_price /100)*per);
                $('#max_price').val(max_price);
                $('#min_price').val(min_price);
                $('#bid_price').val(bid_price);
            })

            $(document).on('change', '#edit_price', function (e) {
                e.preventDefault();
                var price = $('#edit_price').val();
                var max_price = parseInt(price) - ((parseInt(price) /100)*2);
                var min_price = max_price - ((max_price /100)*30);
                var date = $('#edit_date').val();
                var current_date = new Date();
                date = new Date(date);
                var days_left = date.getDate()-current_date.getDate();
                var per = 30/days_left;
                var bid_price = min_price +((max_price /100)*per);
                $('#edit_max_price').val(max_price);
                $('#edit_min_price').val(min_price);
                $('#edit_bid_price').val(bid_price);
            })

            $(document).on('click', '#addAppointmentButton', function (e) {
                e.preventDefault();
                $('#addAppointment').modal('show');
                fetchPatients();
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
                            var patient_id = $('#edit_patient_id');
                            $('#edit_patient_id').children().remove().end()
                            $.each(response.patients, function (patient) {
                                patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].first_name+' '+response.patients[patient].last_name));
                            });
                            $('#appointment_id').val(response.appointment.id);
                            $('#edit_date').val(response.appointment.date);
                            $('#edit_start_time').val(response.appointment.start_time);
                            $('#edit_end_time').val(response.appointment.end_time);
                            $('#edit_price').val(response.appointment.price);
                            $('#edit_max_price').val(response.appointment.max_price);
                            $('#edit_min_price').val(response.appointment.min_price);
                            $('#edit_bid_price').val(response.appointment.bid_price);
                            var options = new Array();
                            $.each(response.appointment.patients, function (key, patient) {
                                options[key] = patient.id;
                            });
                            $('#edit_patient_id').val(options);
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
