@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Analytics</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Be Caring</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                            <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                            <span class="" id="Select_date">Jan 11</span>
                            <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i data-feather="download" class="align-self-center icon-xs"></i>
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-9">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Nurses</p>
                                    <h3 class="m-0">{{ count($nurses) }}</h3>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Patients</p>
                                    <h3 class="m-0">{{ count($patients) }}</h3>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-3">
                    <div class="card report-card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Total Appointments</p>
                                    <h3 class="m-0">{{ count($appointments) }}</h3>
                                </div>
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Booked Appointments</p>
                                    <h3 class="m-0" id="booked_appointments"></h3>
                                </div>
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Reject Appointments</p>
                                    <h3 class="m-0" id="reject_appointments"></h3>
                                </div>
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Pending Appointments</p>
                                    <h3 class="m-0" id="pending_appointments"></h3>
                                </div>
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Complete Appointments</p>
                                    <h3 class="m-0" id="complete_appointments"></h3>
                                </div>
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Incomplete Appointments</p>
                                    <h3 class="m-0" id="incomplete_appointments"></h3>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col">
                                    <p class="text-dark mb-0 font-weight-semibold">Revenue</p>
                                    <h3 class="m-0" id="revenue"></h3>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row-->
</div><!-- container -->
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
                    var booked_appointments = 0;
                    var reject_appointments = 0;
                    var pending_appointments = 0;
                    var complete_appointments = 0;
                    var incomplete_appointments = 0;
                    var revenue = 0;
                    $.each(response.appointments, function (key, appointment) {
                        if (appointment.status == 'Booked'){
                             booked_appointments += 1;
                        }
                        if (appointment.status == 'Reject'){
                            reject_appointments += 1;
                        }
                        if (appointment.status == 'Pending'){
                            pending_appointments += 1;
                        }
                        if (appointment.is_complete == 'InComplete' && appointment.status == 'Booked'){
                            incomplete_appointments +=1;
                        }
                        if (appointment.is_complete == 'Complete'){
                            complete_appointments += 1;
                        }
                        if (appointment.rate != null){
                            revenue += parseFloat(appointment.rate);
                        }
                    });
                    $('#booked_appointments').text(booked_appointments);
                    $('#reject_appointments').text(reject_appointments);
                    $('#pending_appointments').text(pending_appointments);
                    $('#complete_appointments').text(complete_appointments);
                    $('#incomplete_appointments').text(incomplete_appointments);
                    $('#revenue').text(revenue);
                }
            });
        }
    });
</script>
@endsection
