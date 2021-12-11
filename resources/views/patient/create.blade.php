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
                        <div class="card-title mt-4">Patient Detail</div>
                    </div><!--end card-header-->
                    <form method="post" action="{{ route('patient.store') }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="first_name" class="col-form-label text-right">First Name<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" id="first_name" >
                                        <span class="text-danger error-text">{{ $errors->first('first_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="last_name" class="col-form-label text-right">Last Name<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" id="last_name" >
                                        <span class="text-danger error-text">{{ $errors->first('last_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-right">Email</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" id="email">
                                        <span class="text-danger error-text">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label text-right">Phone<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="phone" placeholder="Enter Cell No" value="{{ old('phone') }}" id="phone">
                                        <span class="text-danger error-text">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="dob" class="col-form-label text-right">Date of Birth<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="date" name="dob" value="{{ old('dob') }}" id="dob">
                                        <span class="text-danger error-text">{{ $errors->first('dob') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="blood_group" class="col-form-label text-right">Blood Group</label>
                                        <input class="form-control" type="text" name="blood_group" placeholder="Enter Blood Group" value="{{ old('blood_group') }}" id="blood_group">
                                        <span class="text-danger error-text">{{ $errors->first('blood_group') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="height" class="col-form-label text-right">Height</label>
                                        <input class="form-control" type="text" name="height" placeholder="Enter Height" value="{{ old('height') }}" id="height">
                                        <span class="text-danger error-text">{{ $errors->first('height') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="weight" class="col-form-label text-right">Weight</label>
                                        <input class="form-control" type="text" name="weight" placeholder="Enter Weight" value="{{ old('weight') }}" id="weight">
                                        <span class="text-danger error-text">{{ $errors->first('weight') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="parent_id" class="col-form-label text-right">Company ID<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="parent_id" readonly value="{{ Auth()->id() }}" id="parent_id">
                                        <span class="text-danger error-text">{{ $errors->first('parent_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="toilet_assistance" class="col-form-label text-right">Toilet Assistance</label>
                                        <input class="form-control" type="text" name="toilet_assistance" placeholder="Enter Toilet Assistance" value="{{ old('toilet_assistance') }}" id="toilet_assistance">
                                        <span class="text-danger error-text">{{ $errors->first('toilet_assistance') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="personal_care" class="col-form-label text-right">Personal Care</label>
                                        <input class="form-control" type="text" name="personal_care" placeholder="Enter Personal Care" value="{{ old('personal_care') }}" id="personal_care">
                                        <span class="text-danger error-text">{{ $errors->first('personal_care') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="fnd_information" class="col-form-label text-right">Food and Drink Information</label>
                                        <input class="form-control" type="text" name="fnd_information" placeholder="Enter Food and Drink Information" value="{{ old('fnd_information') }}" id="fnd_information">
                                        <span class="text-danger error-text">{{ $errors->first('fnd_information') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="house_work" class="col-form-label text-right">House Work</label>
                                        <input class="form-control" type="text" name="house_work" placeholder="Enter House Work" value="{{ old('house_work') }}" id="house_work">
                                        <span class="text-danger error-text">{{ $errors->first('house_work') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="access_information" class="col-form-label text-right">Access Information</label>
                                        <input class="form-control" type="text" name="access_information" placeholder="Enter Access Information" value="{{ old('access_information') }}" id="access_information">
                                        <span class="text-danger error-text">{{ $errors->first('access_information') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="care_plan" class="col-form-label text-right">Care Plan</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="care_plan" id="care_plan">
                                        <label class="custom-file-label" for="care_plan">Choose file</label>
                                    </div>
                                    <span class="text-danger error-text">{{ $errors->first('image') }}</span>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="allergies" class="col-form-label text-right">Allergies</label>
                                        <textarea class="form-control"  rows="2" name="allergies" id="allergies"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('allergies') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="medications" class="col-form-label text-right">Medications</label>
                                        <textarea class="form-control"  rows="2" name="medications" id="medications"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('medications') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="immunizations" class="col-form-label text-right">Immunizations</label>
                                        <textarea class="form-control"  rows="2" name="immunizations" id="immunizations"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('immunizations') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="lab_results" class="col-form-label text-right">Lab Results</label>
                                        <textarea class="form-control" rows="2" name="lab_results" id="lab_results"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('lab_results') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="additional_notes" class="col-form-label text-right">Additional Notes</label>
                                        <textarea class="form-control"  rows="2" name="additional_notes" id="additional_notes"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('additional_notes') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address<strong style="color: #ff0000"> *</strong></label>
                                        <input type="text" id="address-input" name="address" class="form-control map-input">
                                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                                    </div>
                                </div>
                                <div id="address-map-container" style="width:100%;height:400px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div><!--end card-footer-->
                    </form>

                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
