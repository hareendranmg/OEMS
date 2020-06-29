@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Welcome {{ Auth::user()->name }}</h1>
<div id="getting-started"></div>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div style="margin-bottom: 30px; margin-top: 20px;">
            <div class="small-box bg-success">
                <div class="inner">
                    <p style="margin-top: 2px">Active Exam</p>
                    <h3>{{$active_exams}}</h3>
                </div>
                <div class="icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <a href="{{URL::to('/candidate/showexams')}}" class="small-box-footer">
                    View All <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div style="margin-bottom: 30px; margin-top: 20px;">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{($attended_exams)? $attended_exams: "No Exams"}}</h3>
                    <p>Attended Exams</p>
                </div>
                <div class="icon">
                    <i class="fas fa-pen"></i>
                </div>
                <a href="{{URL::to('/candidate/attended_exams')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div id='calendar' class="col-md-8"> </div>
</div>

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
$(document).ready(function() {
    var cur_date = new Date();
    var exm_date = new Date(
        '{{(isset($upcmng_exam->exam_start_time))? $upcmng_exam->exam_start_time: date("Y-m-d H:i:s")}}');

    if (cur_date >= exm_date) {
        $('#start').text("No Exam")
    } else {
        $('#clock').countdown(exm_date, function(event) {
            $(this).html(event.strftime('%D days %H:%M:%S'));
        }).on('finish.countdown', function() {
            $('#start').text("Start Exam")
        });
    }
});
</script>
@stop