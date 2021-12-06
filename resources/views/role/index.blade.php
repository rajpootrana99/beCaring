@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Roles</h4>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mt-4">Roles
                        <a href="" data-toggle="modal" data-target="#addRole" id="addRoleButton" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Role </a>
                    </div>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Name</th>
                                    <th>Permissions</th>
                                    <th width="3%">Modify</th>
                                    <th width="3%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <!--end /table-->
                    </div>
                    <!--end /tableresponsive-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
<!-- Modal -->
<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="addRoleLabel">Role</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <!--end modal-header-->
            <form method="post" id="addRoleForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label text-right">Name</label>
                                <input class="form-control" type="text" name="name" id="name">
                                <span class="text-danger error-text name_error"></span>
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
                    </div>
                    <!--end row-->
                </div>
                <!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
                <!--end modal-footer-->
            </form>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>

<div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="editRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="editRoleLabel">Role</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <form method="post" id="editRoleForm">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="role_id" id="role_id">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="edit_name" class="col-form-label text-right">Name</label>
                                <input class="form-control" type="text" name="name" id="edit_name">
                                <span class="text-danger error-text name_update_error"></span>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteRole" tabindex="-1" role="dialog" aria-labelledby="deleteRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="deleteRoleLabel">Delete</h6>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div>
            <form method="post" id="deleteRoleForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="role_id" name="role_id">
                        <p class="mb-4">Are you sure want to delete?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fetchRoles();

        function shuffle(array) {
            array.sort(() => Math.random() - 0.5);
        }

        function fetchRoles() {
            $.ajax({
                type: "GET",
                url: "fetchRoles",
                dataType: "json",
                success: function(response) {
                    var tags = ['primary','secondary','success','danger','warning','info','dark'];
                    $('tbody').html("");
                    $.each(response.roles, function(key, role) {
                        var options = new Array();
                        let i = 0;
                        let j = 0;
                        role.permissions.forEach(function (p){
                            shuffle(tags);
                            options[i] = '<span class="badge badge-'+tags[j++]+'">'+p.name+'</span>';
                            if(j >= tags.length){
                                j = 0
                            }
                            i = i+1;
                        })
                        $('tbody').append('<tr>\
                            <td>'+role.id+'</td>\
                            <td>'+role.name+'</td>\
                            <td>'+options.join(' ')+'</td>\
                            <td><button value="'+role.id+'" style="border: none; background-color: #fff" class="edit_btn"><i class="fa fa-edit"></i></button></td>\
                            <td><button value="'+role.id+'" style="border: none; background-color: #fff" class="delete_btn"><i class="fa fa-trash"></i></button></td>\
                    </tr>');
                    });
                }
            });
        }

        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            var role_id = $(this).val();
            $('#deleteRole').modal('show');
            $('#role_id').val(role_id)
        });

        $(document).on('submit', '#deleteRoleForm', function(e) {
            e.preventDefault();
            var role_id = $('#role_id').val();

            $.ajax({
                type: 'delete',
                url: 'role/' + role_id,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 0) {
                        $('#deleteRole').modal('hide');
                    } else {
                        fetchRoles();
                        $('#deleteRole').modal('hide');
                    }
                }
            });
        });

        $(document).on('click', '.edit_btn', function(e) {
            e.preventDefault();
            var role_id = $(this).val();
            $('#editRole').modal('show');
            $(document).find('span.error-text').text('');
            $.ajax({
                type: "GET",
                url: 'role/' + role_id + '/edit',
                success: function(response) {
                    if (response.status == 404) {
                        $('#editRole').modal('hide');
                    } else {
                        var permission_id = $('#edit_permission_id');
                        $('#edit_permission_id').children().remove().end()
                        $.each(response.permissions, function (permission) {
                            permission_id.append($("<option />").val(response.permissions[permission].id).text(response.permissions[permission].name));
                        });
                        $('#role_id').val(response.role.id);
                        $('#edit_name').val(response.role.name);
                        var options = new Array();
                        $.each(response.rolePermissions, function (key, permission) {
                            options[key] = permission.id;
                        });
                        $('#edit_permission_id').val(options);
                    }
                }
            });
        });

        $(document).on('click', '#addRoleButton', function (e) {
            e.preventDefault();
            $('#addRole').modal('show');
            $.ajax({
                type: "GET",
                url: 'role/create',
                success: function(response) {
                    if (response.status == 404) {
                        $('#editRole').modal('hide');
                    } else {
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

        $(document).on('submit', '#editRoleForm', function(e) {
            e.preventDefault();
            var role_id = $('#role_id').val();
            let EditFormData = new FormData($('#editRoleForm')[0]);

            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    '_method': 'patch'
                },
                url: "role/" + role_id,
                data: EditFormData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(response) {
                    if (response.status == 0) {
                        $('#editRole').modal('show')
                        $.each(response.error, function(prefix, val) {
                            $('span.' + prefix + '_update_error').text(val[0]);
                        });
                    } else {
                        $('#editRoleForm')[0].reset();
                        $('#editRole').modal('hide');
                        fetchRoles();
                    }
                },
                error: function(error) {
                    console.log(error)
                    $('#editRole').modal('show');
                }
            });
        })

        $(document).on('submit', '#addRoleForm', function(e) {
            e.preventDefault();
            let formDate = new FormData($('#addRoleForm')[0]);
            $.ajax({
                type: "post",
                url: "role",
                data: formDate,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(response) {
                    if (response.status == 0) {
                        $('#addRole').modal('show')
                        $.each(response.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#addRoleForm')[0].reset();
                        $('#addRole').modal('hide');
                        fetchRoles();
                    }
                },
                error: function(error) {
                    $('#addRole').modal('show')
                }
            });
        });
    });
</script>
@endsection
