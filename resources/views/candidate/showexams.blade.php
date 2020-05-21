@extends('adminlte::page')

@section('title', 'Exams')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <table id="category" class="display" style="width:100%">
        <thead>
            <tr>
                <th width="30%">Exam Name</th>
                <th width="20%">Exam Start Time</th>
                <th width="20%">Exam End Time</th>
                <th width="20%" class="text-center">Action</th>
            </tr>
        </thead>
    </table>

@stop

@section('content')

@stop

@section('js')
<script>
 $('#category').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "showexams",
  },
  columns:[
   {
    data: 'exam_name',
    name: 'exam_name'
   },
   {
    data: 'exam_start_time',
    name: 'exam_start_time'
   },
   {
    data: 'exam_end_time',
    name: 'exam_end_time'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

   
</script>
@stop