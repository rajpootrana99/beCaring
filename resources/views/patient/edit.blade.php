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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="first_name" class="col-form-label text-right">First Name</label>
                                        <input class="form-control" type="text" name="first_name" value="{{ $patient->first_name }}" placeholder="Enter First Name" id="first_name" >
                                        <span class="text-danger error-text">{{ $errors->first('first_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="last_name" class="col-form-label text-right">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{ $patient->last_name }}" placeholder="Enter Last Name" id="last_name" >
                                        <span class="text-danger error-text">{{ $errors->first('last_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-right">Email</label>
                                        <input class="form-control" type="email" name="email" readonly value="{{ $patient->email }}" placeholder="Enter Email Address" id="email">
                                        <span class="text-danger error-text">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label text-right">Phone</label>
                                        <input class="form-control" type="text" name="phone" placeholder="Enter Cell No" value="{{ $patient->phone }}" id="phone">
                                        <span class="text-danger error-text">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="image" class="col-form-label text-right">Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <span class="text-danger error-text">{{ $errors->first('image') }}</span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address-input" name="address" value="{{ $patient->address }}" class="form-control map-input">
                                        <input type="hidden" name="address_latitude" id="address-latitude" value="{{ $patient->address_latitude }}" />
                                        <input type="hidden" name="address_longitude" id="address-longitude" value="{{ $patient->address_longitude }}" />
                                    </div>
                                </div>
                                <div id="address-map-container" style="width:100%;height:400px; ">
                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                </div>
                            </div><!--end row-->
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
