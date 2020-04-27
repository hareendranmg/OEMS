@extends('adminlte::page')

@section('title', 'Add User')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <table id="category" class="display" style="width:100%">
        <thead>
            <tr>
                <th width="35%">Category Name</th>
                <th width="35%">Number of Students</th>
                <th width="30%">Action</th>
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
                <form>
                <div class="modal-body">
                    <select required class="form-control" name="candidate" id="candidate">
                        <option value="">Select Candidate</option>
                        @foreach($candidates as $candidate)
                        <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                        @endforeach
                    </select>                
                </div>
                <div class="modal-footer">
                    <button type="submit" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="cat_candidates" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                   <table id="cat_candidates_table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Candidate Name</th>
                            <th>Category Name</th>
                        </tr>
                    </thead>
                </table>              
                </div>
            </div>
        </div>
    </div>


@stop

@section('content')

@stop


@section('js')
<script>
 $('#category').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "showcategory",
  },
  columns:[
   {
    data: 'cat_name',
    name: 'cat_name'
   },
   {
    data: 'count',
    name: 'count'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

    var cat_id, candidate_id;

    $(document).on('click', '.showcatcand', function () {
        cat_id = $(this).attr('id');
        $('#cat_candidates').modal('show');
         $('#cat_candidates_table').DataTable({
            destroy: true,
            serverSide: true,
            ajax:{
            url: "category/" + cat_id,
            },
            columns:[
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'cat_name',
                name: 'cat_name'
            },
            ]
        });
    });

    $(document).on('click', '.add', function () {
        cat_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });
    

    $('#ok_button').click(function () {
        candidate_id = $('#candidate').val();
        $.ajax({
            url: "adduserstocategory",
            data: {cat_id: cat_id, candidate_id: candidate_id},
            beforeSend: function () {
                $('#ok_button').text('Adding...');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#confirmModal').modal('hide');
                    $('#category').DataTable().ajax.reload();
                }, 1000);
            }
        })
    });

</script>
@stop