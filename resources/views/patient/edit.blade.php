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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Patient</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
                        <div class="card-title mt-4">Patient Edit</div>
                    </div><!--end card-header-->
                    <form method="post" action="{{ route('patient.update', ['patient' => $patient]) }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-right">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ $patient->user->name }}" id="name" >
                                        <span class="text-danger error-text">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-right">Email</label>
                                        <input class="form-control" type="email" name="email" readonly value="{{ $patient->user->email }}" id="email">
                                        <span class="text-danger error-text">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label text-right">Phone</label>
                                        <input class="form-control" type="text" name="phone" value="{{ $patient->user->phone }}" id="phone">
                                        <span class="text-danger error-text">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="dob" class="col-form-label text-right">Date of Birth</label>
                                        <input class="form-control" type="date" name="dob" value="{{ $patient->dob }}" id="dob">
                                        <span class="text-danger error-text">{{ $errors->first('dob') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="blood_group" class="col-form-label text-right">Blood Group</label>
                                        <input class="form-control" type="text" name="blood_group" value="{{ $patient->blood_group }}" id="blood_group">
                                        <span class="text-danger error-text">{{ $errors->first('blood_group') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="height" class="col-form-label text-right">Height</label>
                                        <input class="form-control" type="text" name="height" value="{{ $patient->height }}" id="height">
                                        <span class="text-danger error-text">{{ $errors->first('height') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="weight" class="col-form-label text-right">Weight</label>
                                        <input class="form-control" type="text" name="weight" value="{{ $patient->weight }}" id="weight">
                                        <span class="text-danger error-text">{{ $errors->first('weight') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="image" class="col-form-label text-right">Image</label>
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
                                        <textarea class="form-control"  rows="3" name="allergies" id="allergies">{{ $patient->allergies }}</textarea>
                                        <span class="text-danger error-text">{{ $errors->first('allergies') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="medications" class="col-form-label text-right">Medications</label>
                                        <textarea class="form-control"  rows="3" name="medications" id="medications">{{ $patient->medications }}</textarea>
                                        <span class="text-danger error-text">{{ $errors->first('medications') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="immunizations" class="col-form-label text-right">Immunizations</label>
                                        <textarea class="form-control"  rows="3" name="immunizations" id="immunizations">{{ $patient->immunizations }}</textarea>
                                        <span class="text-danger error-text">{{ $errors->first('immunizations') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="lab_results" class="col-form-label text-right">Lab Results</label>
                                        <textarea class="form-control" rows="3" name="lab_results" id="lab_results">{{ $patient->lab_results }}</textarea>
                                        <span class="text-danger error-text">{{ $errors->first('lab_results') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="additional_notes" class="col-form-label text-right">Additional Notes</label>
                                        <textarea class="form-control"  rows="3" name="additional_notes" id="additional_notes">{{ $patient->additional_notes }}</textarea>
                                        <span class="text-danger error-text">{{ $errors->first('additional_notes') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address-input" name="address" value="{{ $patient->user->address }}" class="form-control map-input">
                                        <input type="hidden" name="address_latitude" id="address-latitude" value="{{ $patient->user->address_latitude }}" />
                                        <input type="hidden" name="address_longitude" id="address-longitude" value="{{ $patient->user->address_longitude }}" />
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
