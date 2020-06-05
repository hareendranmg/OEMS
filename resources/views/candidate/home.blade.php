@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Welcome {{ Auth::user()->name }}</h1>
<div id="getting-started"></div>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="row" style="margin-bottom: 30px; margin-top: 20px;">
            <div class="col-md-6">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <p style="margin-top: 2px">Upcoming Exam</p>
                        <h3>{{(isset($upcmng_exam->exam_name))? $upcmng_exam->exam_name: print_r("No new exam")}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <span id="start">
                            Starts in: <span id="clock"></span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>122</h3>
                        <p>Attended Exams</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Result Pulblished</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id='calendar' class="col-md-6"> </div>
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
    var exm_date = new Date('{{(isset($upcmng_exam->exam_start_time))? $upcmng_exam->exam_start_time: date("Y-m-d H:i:s")}}');

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