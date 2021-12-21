@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Earnings</h4>
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
                        <div class="card-title mt-4">Earnings
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="10%">Earning ID</th>
                                    <th width="20%">Carer ID</th>
                                    <th width="15%">Appointment ID</th>
                                    <th width="20%">Date</th>
                                    <th width="10%">Earnings</th>
                                    <th width="20%">Status</th>
                                    <th width="3%">Delete</th>
                                    <th width="3%">Approved</th>
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

    <div class="modal fade" id="deleteEarnings" tabindex="-1" role="dialog" aria-labelledby="deleteEarningsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteEarningsLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteEarningsForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="earning_id" name="earning_id">
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

            fetchEarnings();

            function fetchEarnings()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchEarnings",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.earnings, function (key, earning) {
                            var status;
                            if (earning.status == 'Approved'){
                                status = '<span class="badge badge-success">'+earning.status+'</span>';
                            }
                            else {
                                status = '<span class="badge badge-primary">'+earning.status+'</span>';
                            }
                            $('tbody').append('<tr>\
                            <td>'+earning.id+'</td>\
                            <td>'+earning.nurse_id+' : '+earning.nurse.user.name+'</td>\
                            <td>'+earning.appointment_id+'</td>\
                            <td>'+earning.date+'</td>\
                            <td>'+earning.earning.toFixed(2)+'</td>\
                            <td>'+status+'</td>\
                            <td><button value="'+earning.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                            <td><button value="'+earning.id+'" style="border: none; background-color: #fff" class="approve_btn"><i class="fa fa-check-circle"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.approve_btn', function (e) {
                e.preventDefault();
                var earning_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: 'approveEarning/'+earning_id,
                    dataType: "json",
                    success: function (response) {
                        fetchEarnings();
                    }
                });
            });

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var earning_id = $(this).val();
                $('#deleteEarnings').modal('show');
                $('#earning_id').val(earning_id)
            });

            $(document).on('submit', '#deleteEarningsForm', function (e) {
                e.preventDefault();
                var earning_id = $('#earning_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'earning/'+earning_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteEarnings').modal('hide');
                        }
                        else {
                            fetchEarnings();
                            $('#deleteEarnings').modal('hide');
                        }
                    }
                });
            });

        });
    </script>
@endsection
