@extends('adminlte::page')

@section('title', 'Exams')

@section('content')

<table id="attended_exams" class="display" style="width:100%">
    <thead>
        <tr>
            <th width="10%">SL No</th>
            <th width="30%">Exam Name</th>
            <th width="20%">Exam Date</th>
            <th width="20%" class="text-center">Action</th>
        </tr>
    </thead>
</table>

@stop

@section('js')
<script>
$(function() {
    getTable();
});

function getTable() {
    $('#attended_exams').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "finished_exams",
        },
        columns: [{
                data: 'id',
            },
            {
                data: 'exam_name',
            },
            {
                data: 'exam_start_time',
            },
            {
                data: 'action',
                orderable: false
            }
        ],
        fnRowCallback: function(nRow, aData, iDisplayIndex) {
            $("td:first", nRow).html(iDisplayIndex + 1);
            return nRow;
        },
    });
}
</script>
@stop