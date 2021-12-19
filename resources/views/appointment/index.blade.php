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
                                    <th>Visit ID</th>
                                    <th>Carer ID</th>
                                    <th>Company ID</th>
                                    <th>Patient ID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Max Price per hour</th>
                                    <th>Status</th>
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
    <div class="modal fade" id="addAppointment" tabindex="-1" role="dialog" aria-labelledby="addAppointmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addAppointmentLabel"></h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addAppointmentForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="row"><label for="patient_id" class="text-left col-form-label col-lg-8">Select Patient</label><a href="" id="addPatientButton" style="color: #024DEC" class="col-lg-4 col-form-label">+ patient</a></div>
                                    <select class="select2 mb-3 form-control custom-select" name="patient_id" id="patient_id" style="width: 100%; height:30px;">

                                    </select>
                                    <span class="text-danger error-text patient_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date" class="col-form-label text-right">Visit Start Date</label>
                                    <input class="form-control" style="height: 30px;" type="date" name="start_date" id="start_date">
                                    <span class="text-danger error-text start_date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label for="days" class="col-md-3 my-1 control-label">Days : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="day[]" value="0" id="day1" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day1">M</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="day2" name="day[]" value="1" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day2">T</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="day3" name="day[]" value="2" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day3">W</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="day4" name="day[]" value="3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day4">T</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="day5" name="day[]" value="4" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day5">F</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="day6" name="day[]" value="5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day6">S</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="day7" name="day[]" value="6" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="day7">S</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger error-text day_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label for="repeat" class="col-md-3 my-1 control-label">Repeat : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="1" name="repeat" id="repeat" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="repeat">Repeat Every Week</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger error-text repeat_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-1 control-label">Time : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="time1" name="time" class="custom-control-input time" value="0">
                                                <label class="custom-control-label" for="time1">Wake Up</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="time2" name="time" class="custom-control-input time" value="1">
                                                <label class="custom-control-label" for="time2">Lunch</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="time3" name="time" class="custom-control-input time" value="2">
                                                <label class="custom-control-label" for="time3">Dinner</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="time4" name="time" class="custom-control-input time" value="3">
                                                <label class="custom-control-label" for="time4">Bed Time</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="time5" name="time" class="custom-control-input time" value="4">
                                                <label class="custom-control-label" for="time5">Specific Time</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger error-text time_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="select_specific_time" style="display: none;">
                                <div class="form-group row">
                                    <label for="specific_time" class="col-sm-3 my-1 control-label">Select Time</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="specific_time" type="time" id="specific_time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-1 control-label">Visit Duration : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visit_duration1" name="visit_duration" value="0" class="custom-control-input">
                                                <label class="custom-control-label" for="visit_duration1">30 min</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visit_duration2" name="visit_duration" value="1" class="custom-control-input">
                                                <label class="custom-control-label" for="visit_duration2">45 min</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visit_duration3" name="visit_duration" value="2" class="custom-control-input">
                                                <label class="custom-control-label" for="visit_duration3">60 min</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger error-text visit_duration_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-1 control-label">No of Carers : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="no_of_carers1" name="no_of_carers" value="1" class="custom-control-input">
                                                <label class="custom-control-label" for="no_of_carers1">1</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="no_of_carers2" name="no_of_carers" value="2" class="custom-control-input">
                                                <label class="custom-control-label" for="no_of_carers2">2</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger error-text no_of_carers_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-1 control-label">Hoist Required : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="hoist_required1" name="hoist_required" value="1" class="custom-control-input">
                                                <label class="custom-control-label" for="hoist_required1">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="hoist_required2" name="hoist_required" value="0" class="custom-control-input">
                                                <label class="custom-control-label" for="hoist_required2">No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger error-text hoist_required_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="visit_information" class="my-1 col-sm-3 control-label">Visit Information</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" type="text" name="visit_information" id="visit_information">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="max_hourly_rate" class="my-1 col-sm-3 control-label">Max Hourly Rate</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="max_hourly_rate" placeholder="£ / hr" type="text" id="max_hourly_rate">
                                        <span class="text-danger error-text max_hourly_rate_error"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="min_hourly_rate" id="min_hourly_rate">
                            <input type="hidden" name="bid_hourly_rate" id="bid_hourly_rate">
                            <input type="hidden" name="company_id" id="company_id">
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

    <div class="modal fade bd-example-modal-xl" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="addPatientLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addPatientLabel">Patient</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addPatientForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="first_name" class="my-1 col-sm-3 control-label">First Name<strong style="color: #ff0000"> *</strong></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="first_name" placeholder="Enter First Name" type="text" id="first_name">
                                        <span class="text-danger error-text first_name_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="last_name" class="my-1 col-sm-3 control-label">Last Name<strong style="color: #ff0000"> *</strong></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="last_name" placeholder="Enter Last Name" type="text" id="last_name">
                                        <span class="text-danger error-text last_name_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group row">
                                    <label for="height" class="my-1 col-sm-5 control-label">Height</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" style="height: 30px;" name="height" placeholder="Height" type="text" id="height">
                                    </div>
                                    <span class="text-danger error-text height_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group row">
                                    <label for="weight" class="my-1 col-sm-5 control-label">Weight</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" style="height: 30px;" name="weight" placeholder="Weight" type="text" id="weight">
                                    </div>
                                    <span class="text-danger error-text weight_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="email" class="my-1 col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="email" placeholder="Enter Email" type="email" id="email">
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="phone" class="my-1 col-sm-3 control-label">Phone<strong style="color: #ff0000"> *</strong></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="phone" placeholder="Enter Phone" type="text" id="phone">
                                        <span class="text-danger error-text phone_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="dob" class="my-1 col-sm-4 control-label">Date of Birth<strong style="color: #ff0000"> *</strong></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" style="height: 30px;" name="dob" type="date" id="dob">
                                        <span class="text-danger error-text dob_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="blood_group" class="my-1 col-sm-4 control-label">Blood Group</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" style="height: 30px;" name="blood_group" placeholder="Enter Blood Group" type="text" id="blood_group">
                                        <span class="text-danger error-text blood_group_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group row">
                                    <label for="parent_id" class="my-1 col-sm-7 control-label">Company ID<strong style="color: #ff0000"> *</strong></label>
                                    <div class="col-sm-5">
                                        <input class="form-control" style="height: 30px;" readonly name="parent_id" value="{{ Auth()->id() }}" type="text" id="parent_id">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="address" class="my-1 col-sm-2 control-label">Address<strong style="color: #ff0000"> *</strong></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" style="height: 30px;" name="address" placeholder="Enter Address" type="text" id="address">
                                        <span class="text-danger error-text address_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="toilet_assistance" class="my-1 col-sm-5 control-label">Toilet Assistance</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" style="height: 30px;" name="toilet_assistance" placeholder="Enter Toilet Assistance" type="text" id="toilet_assistance">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="personal_care" class="my-1 col-sm-4 control-label">Personal Care</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" style="height: 30px;" name="personal_care" placeholder="Enter Personal Care" type="text" id="personal_care">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="fnd_information" class="my-1 col-sm-6 control-label">Food and Drink Information</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" style="height: 30px;" name="fnd_information" placeholder="Enter F&D Information" type="text" id="fnd_information">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="house_work" class="my-1 col-sm-4 control-label">House Work</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" style="height: 30px;" name="house_work" placeholder="Enter House Work" type="text" id="house_work">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="access_information" class="my-1 col-sm-5 control-label">Access Information</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" style="height: 30px;" name="access_information" placeholder="Enter Access Information" type="text" id="access_information">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="care_plan" class="my-1 col-sm-3 control-label">Care Plan</label>
                                    <div class="col-sm-9">
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" style="height: 30px;" name="care_plan" id="care_plan">
                                            <label class="custom-file-label" for="care_plan">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="medications" class="col-form-label text-right">Allergies</label>
                                    <textarea class="form-control" rows="1" name="medications" id="medications"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('medications') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="lab_results" class="col-form-label text-right">Medications</label>
                                    <textarea class="form-control" rows="1" name="lab_results" id="lab_results"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('lab_results') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="immunizations" class="col-form-label text-right">Immunizations</label>
                                    <textarea class="form-control" rows="1" name="immunizations" id="immunizations"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('immunizations') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="lab_results" class="col-form-label text-right">Lab Results</label>
                                    <textarea class="form-control" rows="1" name="lab_results" id="lab_results"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('lab_results') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="additional_notes" class="col-form-label text-right">Additional Notes</label>
                                    <textarea class="form-control"  rows="1" name="additional_notes" id="additional_notes"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('additional_notes') }}</span>
                                </div>
                            </div>
                        </div>
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
                            var options = new Array();
                            let i = 0;
                            appointment.nurses.forEach(function (n){
                                options[i] = n.user.name;
                                console.log(n);
                                i++;
                            })
                            $('tbody').append('<tr>\
                            <td>'+appointment.id+'</td>\
                            <td>'+options.join(' ')+'</td>\
                            <td>'+appointment.company_id+'</td>\
                            <td>'+appointment.patient_id+'</td>\
                            <td>'+appointment.start_date+'</td>\
                            <td>'+appointment.time+'</td>\
                            <td>'+parseFloat(appointment.max_hourly_rate).toFixed(2)+'</td>\
                            <td>'+appointment.status+'</td>\
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
                        console.log(response)
                        var patient_id = $('#patient_id');
                        $('#patient_id').children().remove().end();
                        $.each(response.patients, function (patient) {
                            patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].user.id+' - '+response.patients[patient].user.name));
                        });
                    }
                });
            }

            $(document).on('change', '.time', function (e) {
                e.preventDefault();
                if ($("#time5").prop("checked")) {
                    $('#select_specific_time').css('display', 'block');
                }
                else {
                    $('#select_specific_time').css('display', 'none');
                }

            })

            $(document).on('change', '#max_hourly_rate', function (e) {
                e.preventDefault();
                var bid_hourly_rate = 0;
                var max_hourly_rate = $('#max_hourly_rate').val();
                var min_hourly_rate = max_hourly_rate - ((max_hourly_rate /100)*30);
                var date = $('#start_date').val();
                var current_date = new Date();
                date = new Date(date);
                var days_left = date.getDate()-current_date.getDate();
                if (days_left > 0){
                    var per = 30/days_left;
                    bid_hourly_rate = min_hourly_rate +((max_hourly_rate /100)*per);
                }
                else {
                    bid_hourly_rate = max_hourly_rate;
                }
                $('#min_hourly_rate').val(min_hourly_rate);
                $('#bid_hourly_rate').val(bid_hourly_rate);
            })

            $(document).on('click', '#addPatientButton', function (e) {
                e.preventDefault();
                $('#addAppointment').modal('hide');
                $('#addPatient').modal('show');
            })
            $(document).on('click', '#addAppointmentButton', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "appointment/create",
                    dataType: "json",
                    success: function (response) {
                        $('#addAppointment').modal('show');
                        $('#addAppointmentLabel').text('Visit ID '+response.visit_id);
                        $('#company_id').val(response.company_id);
                        fetchPatients();
                        $(document).find('span.error-text').text('');
                        $('#select_specific_time').css('display', 'none');
                    }
                });
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
                                patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].name));
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

            $(document).on('submit', '#addPatientForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addPatientForm')[0]);
                $.ajax({
                    type: "post",
                    url: "createPatient",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addPatient').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addPatientForm')[0].reset();
                            $('#addPatient').modal('hide');
                            $.ajax({
                                type: "GET",
                                url: "appointment/create",
                                dataType: "json",
                                success: function (response) {
                                    $('#addAppointment').modal('show');
                                    $('#addAppointmentLabel').text('Visit ID '+response.visit_id);
                                    fetchPatients();
                                    $(document).find('span.error-text').text('');
                                    $('#select_specific_time').css('display', 'none');
                                }
                            });
                        }
                    },
                    error: function (error){
                        $('#addPatient').modal('show')
                    }
                });
            });

        });
    </script>
@endsection
