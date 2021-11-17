@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Companies</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Companies</a></li>
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
                        <div class="card-title mt-4">Companies</div>
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
                                    <th width="3%"><i class="fa fa-edit"></i></th>
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

    <div class="modal fade" id="editCompany" tabindex="-1" role="dialog" aria-labelledby="editCompanyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editCompanyLabel">Patient Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editCompanyForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_name" class="col-form-label text-right">Name</label>
                                    <input class="form-control" type="text" readonly name="name" id="edit_name" >
                                    <span class="text-danger error-text name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="permission_id" class="col-form-label text-right">Select Permission</label>
                                    <select class="select2 mb-3 select2-multiple" name="permission_id[]" id="permission_id" style="width: 100%; height:36px;" data-placeholder="Select Patient" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text permission_id_update_error"></span>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div><!--end modal-body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div><!--end modal-footer-->
                </form>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div>

    <div class="modal fade" id="deleteCompany" tabindex="-1" role="dialog" aria-labelledby="deleteCompanyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteCompanyLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteCompanyForm">
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

            fetchCompanies();

            function fetchCompanies()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchCompanies",
                    dataType: "json",
                    success: function (response) {
                        $('tbody').html("");
                        $.each(response.companies, function (key, Company) {
                            $('tbody').append('<tr>\
                            <td>'+Company.id+'</td>\
                            <td>'+Company.first_name+' '+Company.last_name +'</td>\
                            <td>'+Company.phone+'</td>\
                            <td>'+Company.email+'</td>\
                            <td><button value="'+Company.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+Company.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#deleteCompany').modal('show');
                $('#user_id').val(user_id)
            });

            $(document).on('submit', '#deleteCompanyForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'patient/'+user_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteCompany').modal('hide');
                        }
                        else {
                            fetchCompanies();
                            $('#deleteCompany').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#editCompany').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'company/'+user_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editCompany').modal('hide');
                        }
                        else {
                            var permission_id = $('#permission_id');
                            $('#permission_id').children().remove().end()
                            $.each(response.permissions, function (permission) {
                                permission_id.append($("<option />").val(response.permissions[permission].id).text(response.permissions[permission].name));
                            });
                            $('#user_id').val(response.company.id);
                            $('#edit_name').val(response.company.first_name+' '+response.company.last_name);
                        }
                    }
                });
            });

            $(document).on('submit', '#editCompanyForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();
                let EditFormData = new FormData($('#editCompanyForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "company/"+user_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editCompany').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editCompanyForm')[0].reset();
                            $('#editCompany').modal('hide');
                            fetchCompanies();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editCompany').modal('show');
                    }
                });
            })

        });
    </script>
@endsection
