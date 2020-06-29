@extends('adminlte::page')

@section('title', 'Add User')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
<table id="users" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

<!-- <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit candidate</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form id="sample_form" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4">Name : </label>
                            <div class="col">
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Username : </label>
                            <div class="col">
                                <input type="text" name="username" id="username" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Category : </label>
                            <div class="col">
                                <input type="text" name="category" id="category" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input type="hidden" name="action" id="action" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                            <input type="submit" name="action_button" id="action_button" class="btn btn-warning col btn-block"
                                value="Edit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this candidate?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Delete</button>
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
    ajax: {
        url: "showusers",
    },
    columns: [{
            data: 'id',
            name: 'id'
        },
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
    ],
    fnRowCallback: function(nRow, aData, iDisplayIndex) {
        $("td:first", nRow).html(iDisplayIndex + 1);
        return nRow;
    },
});

var user_id;

$(document).on('click', '.delete', function() {
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
});

$('#ok_button').click(function() {
    $.ajax({
        url: "deleteuser/" + user_id,
        beforeSend: function() {
            $('#ok_button').text('Deleting...');
        },
        success: function(data) {
            setTimeout(function() {
                $('#confirmModal').modal('hide');
                $('#ok_button').text('Delete');
                $('#users').DataTable().ajax.reload();
            }, 1000);
        }
    })
});

// $(document).on('click', '.edit', function() {
//     user_id = $(this).attr('id');
//     $('#editModal').modal('show');
// });

// $('#ok_button').click(function() {
//     $.ajax({
//         url: "edituser/" + user_id,
//         beforeSend: function() {
//             $('#ok_button').text('Editing...');
//         },
//         success: function(data) {
//             setTimeout(function() {
//                 $('#editModal').modal('hide');
//                 $('#users').DataTable().ajax.reload();
//             }, 1000);
//         }
//     })
// });
</script>
@stop