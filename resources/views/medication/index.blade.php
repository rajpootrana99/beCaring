@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Medications</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Medications</a></li>
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
                        <div class="card-title mt-4">Medications
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">Patient Name</th>
                                    <th width="15%">Nurse Name</th>
                                    <th width="15%">Disease</th>
                                    <th width="25%">Precautions</th>
                                    <th width="20%">Medicine</th>
                                    <th width="3%"><i class="fa fa-trash"></i></th>
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

    <div class="modal fade" id="deleteMedication" tabindex="-1" role="dialog" aria-labelledby="deleteMedicationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteMedicationLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteMedicationForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="medication_id" name="medication_id">
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

            fetchNurses();

            function fetchNurses()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchMedications",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.medications, function (key, medication) {
                            $('tbody').append('<tr>\
                            <td>'+medication.id+'</td>\
                            <td>'+medication.patient.first_name+' '+medication.patient.last_name +'</td>\
                            <td>'+medication.nurse.first_name+' '+medication.nurse.last_name +'</td>\
                            <td>'+medication.disease+'</td>\
                            <td>'+medication.precautions+'</td>\
                            <td>'+medication.medicine+'</td>\
                            <td><button value="'+medication.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var medication_id = $(this).val();
                $('#deleteMedication').modal('show');
                $('#medication_id').val(medication_id)
            });

            $(document).on('submit', '#deleteMedicationForm', function (e) {
                e.preventDefault();
                var medication_id = $('#medication_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'nurse/'+medication_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteMedication').modal('hide');
                        }
                        else {
                            fetchMedications();
                            $('#deleteMedication').modal('hide');
                        }
                    }
                });
            });

        });
    </script>
@endsection
