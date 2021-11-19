@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Employees</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li>
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
                        <div class="card-title mt-4">Employees
                            <a href="" data-toggle="modal" data-target="#addEmployee" id="addEmployeeButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Employee </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-centered">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Email</th>
                                    <th>Permissions</th>
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
    <div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="addEmployeeLabel">Employee Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="addEmployeeForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="first_name" class="col-form-label text-right">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="first_name" >
                                    <span class="text-danger error-text first_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="last_name" class="col-form-label text-right">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="last_name" >
                                    <span class="text-danger error-text last_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-right">Email</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-right">Password</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                    <span class="text-danger error-text password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-form-label text-right">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                    <span class="text-danger error-text password_confirmation_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="permission_id" class="col-form-label text-right">Select Permission</label>
                                    <select class="select2 mb-3 select2-multiple" name="permission_id[]" id="permission_id" style="width: 100%; height:36px;" data-placeholder="Select Patient" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text permission_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="image" class="col-form-label text-right">Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <span class="text-danger error-text image_error"></span>
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

    <div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="editEmployeeLabel">Employee Detail</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="editEmployeeForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_first_name" class="col-form-label text-right">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="edit_first_name" >
                                    <span class="text-danger error-text first_name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_last_name" class="col-form-label text-right">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="edit_last_name" >
                                    <span class="text-danger error-text last_name_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="edit_email" class="col-form-label text-right">Email</label>
                                    <input class="form-control" type="email" readonly name="email" id="edit_email">
                                    <span class="text-danger error-text email_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_permission_id" class="col-form-label text-right">Select Permission</label>
                                    <select class="select2 mb-3 select2-multiple" name="permission_id[]" id="edit_permission_id" style="width: 100%; height:36px;" data-placeholder="Select Patient" multiple="multiple">

                                    </select>
                                    <span class="text-danger error-text permission_id_update_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="edit_image" class="col-form-label text-right">Image</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="image" id="edit_image">
                                    <label class="custom-file-label" for="edit_image">Choose file</label>
                                </div>
                                <span class="text-danger error-text image_update_error"></span>
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

    <div class="modal fade" id="deleteEmployee" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="deleteEmployeeLabel">Delete</h6>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <form method="post" id="deleteEmployeeForm">
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

            fetchEmployees();

            function shuffle(array) {
                array.sort(() => Math.random() - 0.5);
            }

            function fetchEmployees()
            {
                $.ajax({
                    type: "GET",
                    url: "fetchEmployees",
                    dataType: "json",
                    success: function (response) {
                        var tags = ['primary','secondary','success','danger','warning','info','dark'];
                        $('tbody').html("");
                        $.each(response.employees, function (key, employee) {
                            var options = new Array();
                            let i = 0;
                            let j = 0;
                            employee.permissions.forEach(function (p){
                                shuffle(tags);
                                options[i] = '<span class="badge badge-'+tags[j++]+'">'+p.name+'</span>';
                                if(j >= tags.length){
                                    j = 0
                                }
                                i = i+1;
                            })
                            $('tbody').append('<tr>\
                            <td>'+employee.id+'</td>\
                            <td>'+employee.first_name+' '+employee.last_name +'</td>\
                            <td>'+employee.email+'</td>\
                            <td>'+options.join(' ')+'</td>\
                            <td><button value="'+employee.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+employee.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#deleteEmployee').modal('show');
                $('#user_id').val(user_id)
            });

            $(document).on('submit', '#deleteEmployeeForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();

                $.ajax({
                    type: 'delete',
                    url: 'employee/'+user_id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 0) {
                            $('#deleteEmployee').modal('hide');
                        }
                        else {
                            fetchEmployees();
                            $('#deleteEmployee').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit_btn', function (e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('#editEmployee').modal('show');
                $(document).find('span.error-text').text('');
                $.ajax({
                    type: "GET",
                    url: 'employee/'+user_id+'/edit',
                    success: function (response) {
                        if (response.status == 404) {
                            $('#editEmployee').modal('hide');
                        }
                        else {
                            console.log(response.employee);
                            var permission_id = $('#edit_permission_id');
                            $('#edit_permission_id').children().remove().end()
                            $.each(response.permissions, function (permission) {
                                permission_id.append($("<option />").val(response.permissions[permission].id).text(response.permissions[permission].name));
                            });
                            $('#user_id').val(response.employee.id);
                            $('#edit_first_name').val(response.employee.first_name);
                            $('#edit_last_name').val(response.employee.last_name);
                            $('#edit_email').val(response.employee.email);
                            var options = new Array();
                            $.each(response.employee.permissions, function (key, permission) {
                                options[key] = permission.id;
                            });
                            $('#edit_permission_id').val(options);
                        }
                    }
                });
            });

            $(document).on('submit', '#editEmployeeForm', function (e) {
                e.preventDefault();
                var user_id = $('#user_id').val();
                let EditFormData = new FormData($('#editEmployeeForm')[0]);

                $.ajax({
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
                    url: "employee/"+user_id,
                    data: EditFormData,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#editEmployee').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_update_error').text(val[0]);
                            });
                        }else {
                            $('#editEmployeeForm')[0].reset();
                            $('#editEmployee').modal('hide');
                            fetchEmployees();
                        }
                    },
                    error: function (error){
                        console.log(error)
                        $('#editEmployee').modal('show');
                    }
                });
            })

            $(document).on('click', '#addEmployeeButton', function (e) {
                e.preventDefault();
                $('#addEmployee').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'employee/create',
                    success: function(response) {
                        if (response.status == 404) {
                            $('#editEmployee').modal('hide');
                        } else {
                            console.log(response.permissions);
                            var permission_id = $('#permission_id');
                            $('#permission_id').children().remove().end()
                            $.each(response.permissions, function (permission) {
                                permission_id.append($("<option />").val(response.permissions[permission].id).text(response.permissions[permission].name));
                            });
                        }
                    }
                });
                $(document).find('span.error-text').text('');
            });

            $(document).on('submit', '#addEmployeeForm', function (e){
                e.preventDefault();
                let formDate = new FormData($('#addEmployeeForm')[0]);
                $.ajax({
                    type: "post",
                    url: "employee",
                    data: formDate,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status == 0){
                            $('#addEmployee').modal('show')
                            $.each(response.error, function (prefix, val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else {
                            $('#addEmployeeForm')[0].reset();
                            $('#addEmployee').modal('hide');
                            fetchEmployees();
                        }
                    },
                    error: function (error){
                        $('#addEmployee').modal('show')
                    }
                });
            });
        });
    </script>
@endsection
