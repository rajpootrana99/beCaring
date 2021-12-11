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
                                    <th width="3%">Modify</th>
                                    <th width="3%">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->user->name}}</td>
                                        <td>{{ $patient->user->phone }}</td>
                                        <td>{{ $patient->user->email }}</td>
                                        <td>{{ $patient->user->address }}</td>
                                        <td><a href="{{ route('patient.edit', ['patient' => $patient]) }}"><i class="fa fa-edit"></i></a></td>
                                        <td><button value="{{ $patient->id }}" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>
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

    <div class="modal fade" id="deletePatient" tabindex="-1" role="dialog" aria-labelledby="deletePatientLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deletePatientLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deletePatientForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="user_id" name="user_id">
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

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#deletePatient').modal('show');
                $('#user_id').val(user_id)
            });

            $(document).on('submit', '#deletePatientForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'patient/'+user_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            alert(response.message);
                            $('#deletePatient').modal('hide');
                        }
                        else {
                            $('#deletePatient').modal('hide');
                            location.reload();
                        }
                    }
                });
            });

        });
    </script>
@endsection
