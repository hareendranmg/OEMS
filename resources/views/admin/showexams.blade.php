@extends('adminlte::page')

@section('title', 'Exams')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <table id="category" class="display" style="width:100%">
        <thead>
            <tr>
                <th width="30%">Category Name</th>
                <th width="30%">Exam Name</th>
                <th width="25%">Exam Date&time</th>
                <th width="15%">Action</th>
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
    data: 'cat_name',
    name: 'cat_name'
   },
   {
    data: 'exam_name',
    name: 'exam_name'
   },
   {
    data: 'exam_start_time',
    name: 'exam_start_time'
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