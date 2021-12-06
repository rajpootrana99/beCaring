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
                                    <input class="form-control" style="height: 30px;" type="date" name="date" id="date">
                                    <span class="text-danger error-text date_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label for="days" class="col-md-3 my-1 control-label">Days : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck6" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck6">M</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck7" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck7">T</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck8" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck8">W</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck9" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck9">T</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck10" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck10">F</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customChec11" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customChec11">S</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck12">S</label>
                                            </div>
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
                                                <input type="checkbox" class="custom-control-input" id="customCheck13" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck13">Repeat Every Week</label>
                                            </div>
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="select_specific_time" style="display: none;">
                                <div class="form-group row">
                                    <label for="example-time-input" class="col-sm-3 my-1 control-label">Select Time</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" type="time" id="example-time-input">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0 row">
                                    <label class="col-md-3 my-1 control-label">Visit Duration : </label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio12" name="visit_duration" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio12">30 min</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio13" name="visit_duration" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio13">45 min</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio14" name="visit_duration" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio14">60 min</label>
                                            </div>
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
                                                <input type="radio" id="customRadio15" name="no_of_carers" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio15">1</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio16" name="no_of_carers" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio16">2</label>
                                            </div>
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
                                                <input type="radio" id="customRadio17" name="hoist_required" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio17">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio18" name="hoist_required" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio18">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="example-text-input" class="my-1 col-sm-3 control-label">Visit Information</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" type="text" id="example-text-input">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="max_hourly_rate" class="my-1 col-sm-3 control-label">Max Hourly Rate</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" style="height: 30px;" name="max_hourly_rate" placeholder="£ / hr" type="text" id="max_hourly_rate">
                                    </div>
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="first_name" class="col-form-label text-right">First Name<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="text" style="height: 30px;" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" id="first_name" >
                                    <span class="text-danger error-text">{{ $errors->first('first_name') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="last_name" class="col-form-label text-right">Last Name<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="text" style="height: 30px;" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" id="last_name" >
                                    <span class="text-danger error-text">{{ $errors->first('last_name') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-right">Email<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="email" style="height: 30px;" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" id="email">
                                    <span class="text-danger error-text">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label text-right">Phone<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="text" style="height: 30px;" name="phone" placeholder="Enter Cell No" value="{{ old('phone') }}" id="phone">
                                    <span class="text-danger error-text">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="dob" class="col-form-label text-right">Date of Birth<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="date" style="height: 30px;" name="dob" value="{{ old('dob') }}" id="dob">
                                    <span class="text-danger error-text">{{ $errors->first('dob') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="blood_group" class="col-form-label text-right">Blood Group<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="text" style="height: 30px;" name="blood_group" placeholder="Enter Blood Group" value="{{ old('blood_group') }}" id="blood_group">
                                    <span class="text-danger error-text">{{ $errors->first('blood_group') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="height" class="col-form-label text-right">Height<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="text" style="height: 30px;" name="height" placeholder="Enter Height" value="{{ old('height') }}" id="height">
                                    <span class="text-danger error-text">{{ $errors->first('height') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="weight" class="col-form-label text-right">Weight<strong style="color: #ff0000"> *</strong></label>
                                    <input class="form-control" type="text" style="height: 30px;" name="weight" placeholder="Enter Weight" value="{{ old('weight') }}" id="weight">
                                    <span class="text-danger error-text">{{ $errors->first('weight') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address">Address<strong style="color: #ff0000"> *</strong></label>
                                    <input type="text" id="address-input" style="height: 30px;" name="address" class="form-control map-input">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="image" class="col-form-label text-right">Care Plan</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" style="height: 30px;" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <span class="text-danger error-text">{{ $errors->first('image') }}</span>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="allergies" class="col-form-label text-right">Allergies</label>
                                    <textarea class="form-control"  rows="3" name="allergies" id="allergies"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('allergies') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="medications" class="col-form-label text-right">Medications</label>
                                    <textarea class="form-control"  rows="3" name="medications" id="medications"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('medications') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="immunizations" class="col-form-label text-right">Immunizations</label>
                                    <textarea class="form-control"  rows="3" name="immunizations" id="immunizations"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('immunizations') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="lab_results" class="col-form-label text-right">Lab Results</label>
                                    <textarea class="form-control" rows="3" name="lab_results" id="lab_results"></textarea>
                                    <span class="text-danger error-text">{{ $errors->first('lab_results') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="additional_notes" class="col-form-label text-right">Additional Notes</label>
                                    <textarea class="form-control"  rows="3" name="additional_notes" id="additional_notes"></textarea>
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
                        var options = new Array();
                        let i = 0;
                        $('tbody').html("");
                        $.each(response.appointments, function (key, appointment) {
                            if (appointment.nurse != null){
                                var nurse = appointment.nurse.name;
                            }
                            else {
                                nurse = 'Not Assigned yet';
                            }
                            appointment.patients.forEach(function (p){
                                options[i] = p.name;
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
                        $('#patient_id').children().remove().end();
                        $.each(response.patients, function (patient) {
                            patient_id.append($("<option />").val(response.patients[patient].id).text(response.patients[patient].id+' - '+response.patients[patient].name));
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

            /*$(document).on('change', '#price', function (e) {
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
            })*/

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
        });
    </script>
@endsection
