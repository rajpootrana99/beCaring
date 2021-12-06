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
                                        <label for="email" class="col-form-label text-right">Email<strong style="color: #ff0000"> *</strong></label>
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
                                        <label for="blood_group" class="col-form-label text-right">Blood Group<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="blood_group" placeholder="Enter Blood Group" value="{{ old('blood_group') }}" id="blood_group">
                                        <span class="text-danger error-text">{{ $errors->first('blood_group') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="height" class="col-form-label text-right">Height<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="height" placeholder="Enter Height" value="{{ old('height') }}" id="height">
                                        <span class="text-danger error-text">{{ $errors->first('height') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="weight" class="col-form-label text-right">Weight<strong style="color: #ff0000"> *</strong></label>
                                        <input class="form-control" type="text" name="weight" placeholder="Enter Weight" value="{{ old('weight') }}" id="weight">
                                        <span class="text-danger error-text">{{ $errors->first('weight') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="image" class="col-form-label text-right">Care Plan</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <span class="text-danger error-text">{{ $errors->first('image') }}</span>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="allergies" class="col-form-label text-right">Allergies</label>
                                        <textarea class="form-control"  rows="3" name="allergies" id="allergies"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('allergies') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="medications" class="col-form-label text-right">Medications</label>
                                        <textarea class="form-control"  rows="3" name="medications" id="medications"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('medications') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="immunizations" class="col-form-label text-right">Immunizations</label>
                                        <textarea class="form-control"  rows="3" name="immunizations" id="immunizations"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('immunizations') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="lab_results" class="col-form-label text-right">Lab Results</label>
                                        <textarea class="form-control" rows="3" name="lab_results" id="lab_results"></textarea>
                                        <span class="text-danger error-text">{{ $errors->first('lab_results') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="additional_notes" class="col-form-label text-right">Additional Notes</label>
                                            <textarea class="form-control"  rows="3" name="additional_notes" id="additional_notes"></textarea>
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
