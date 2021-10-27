@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Nurses</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Nurses</a></li>
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
                        <div class="card-title mt-4">Nurses</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($nurses as $nurse)
                                    <tr role="row">
                                        <td >{{ $nurse->id }}</td>
                                        <td><img class="avatar-box" height="50px" src="{{ asset('storage/'.$nurse->image) }}"></td>
                                        <td>{{ $nurse->name }}</td>
                                        <td>{{ $nurse->phone }}</td>
                                        <td >
                                            <div class="row">
                                                <form id="{{ 'delete_'.$nurse->id }}" method="post" action="{{ route('nurse.destroy', ['nurse' => $nurse]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a onclick="document.getElementById('{{ 'delete_'.$nurse->id }}').submit()" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>
                                            </div>
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
