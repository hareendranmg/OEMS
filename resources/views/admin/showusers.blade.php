@extends('adminlte::page')

@section('title', 'Add User')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <table id="users" class="display" style="width:100%">
        <thead>
            <tr>
                <th width="30%">Name</th>
                <th width="30%">Username</th>
                <th width="30%">Category</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
    </table>

    <!-- <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit candidate</h4>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4">Name : </label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Last Name : </label>
                            <div class="col-md-8">
                                <input type="text" name="last_name" id="last_name" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input type="hidden" name="action" id="action" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                            <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     -->
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this candidate?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('content')

@stop


@section('js')
<script>
 $('#users').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "showusers",
  },
  columns:[
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'username',
    name: 'username'
   },
   {
    data: 'cat_name',
    name: 'cat_name'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

    var user_id;

    $(document).on('click', '.delete', function () {
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function () {
        $.ajax({
            url: "deleteuser/" + user_id,
            beforeSend: function () {
                $('#ok_button').text('Deleting...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#confirmModal').modal('hide');
                    $('#users').DataTable().ajax.reload();
                }, 1000);
            }
        })
    });

</script>
@stop