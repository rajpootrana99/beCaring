@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Feedbacks</h4>
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
                        <div class="card-title mt-4">Feedbacks</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="17%">Name</th>
                                    <th width="17%">Email</th>
                                    <th>Comment</th>
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
    <div class="modal fade" id="deleteFeedback" tabindex="-1" role="dialog" aria-labelledby="deleteFeedbackLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteFeedbackLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteFeedbackForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="feedback_id" name="feedback_id">
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

            fetchFeedbacks();

            function fetchFeedbacks()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchFeedbacks",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.feedbacks, function (key, feedback) {
                            $('tbody').append('<tr>\
                            <td>'+feedback.id+'</td>\
                            <td>'+feedback.name+'</td>\
                            <td>'+feedback.email+'</td>\
                            <td>'+feedback.comments+'</td>\
                            <td><button value="'+feedback.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var feedback_id = $(this).val();
                $('#deleteFeedback').modal('show');
                $('#feedback_id').val(feedback_id)
            });

            $(document).on('submit', '#deleteFeedbackForm', function (e) {
                e.preventDefault();
                var feedback_id = $('#feedback_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'feedback/'+feedback_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteFeedback').modal('hide');
                        }
                        else {
                            fetchFeedbacks();
                            $('#deleteFeedback').modal('hide');
                        }
                    }
                });
            });
        });
    </script>
@endsection
