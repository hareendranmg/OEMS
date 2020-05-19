@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div style="float: left; width: 25%; margin-left: 30px;">
    <div class="small-box bg-info" style="margin-bottom: 30px; margin-top: 20px;">
        <div class="inner">
            <h3>{{ $userCount }}</h3>
            <p>Total Users</p>
        </div>
        <div class="icon">
            <i class="fas fa-user"></i>
        </div>
        <a href="admin/showusers" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
    <div class="small-box bg-success">
        <div class="inner">
            <h3>44</h3>
            <p>Active Exams</p>
        </div>
        <div class="icon">
            <i class="fas fa-laptop-code"></i>
        </div>
        <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div id='calendar' style="float: right; width: 60%;  margin-right: 100px;"> </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
.fc-today {
    background: #9cacfb !important;
}
</style>
@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid']
    });

    calendar.render();
});
</script>
@stop