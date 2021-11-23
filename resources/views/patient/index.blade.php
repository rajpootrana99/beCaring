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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Patients</a></li>
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
                        <div class="card-title mt-4">Patients
                            <a href="{{ route('patient.create') }}" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Patient </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Name</th>
                                    <th width="15%">Phone</th>
                                    <th width="20%">Email</th>
                                    <th>Address</th>
                                    <th width="3%"><i class="fa fa-edit"></i></th>
                                    <th width="3%"><i class="fa fa-trash"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->name}}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td><a href="{{ route('patient.edit', ['patient' => $patient]) }}"><i class="fa fa-edit"></i></a></td>
                                        <td>
                                            <form id="{{ 'delete_'.$patient->id }}" method="post" action="{{ route('patient.destroy', ['patient' => $patient]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a onclick="document.getElementById('{{ 'delete_'.$patient->id }}').submit()" style="cursor: pointer">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
