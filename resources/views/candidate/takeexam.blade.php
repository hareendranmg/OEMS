@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach($qnrs as $key => $qnr)
            <div class="card">
                <div class="card-header">
                    <strong>{{$key+1}}</strong> &nbsp {{$qnr['qn']->qn_name}}
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <label for="{{$qnr['ans']->opt_a}}">
                            <li class="list-group-item pl-4">
                                <input type="radio" class="form-check-input" name="" id="{{$qnr['ans']->opt_a}}"> &nbsp
                                {{$qnr['ans']->opt_a}}
                            </li>
                        </label>
                        <label for="{{$qnr['ans']->opt_b}}">
                            <li class="list-group-item pl-4">
                                <input type="radio" class="form-check-input" name="" id="{{$qnr['ans']->opt_b}}"> &nbsp
                                {{$qnr['ans']->opt_b}}
                            </li>
                        </label>
                        <label for="{{$qnr['ans']->opt_c}}">
                            <li class="list-group-item pl-4">
                                <input type="radio" class="form-check-input" name="" id="{{$qnr['ans']->opt_c}}"> &nbsp
                                {{$qnr['ans']->opt_c}}
                            </li>
                        </label>
                        <label for="{{$qnr['ans']->opt_d}}">
                            <li class="list-group-item pl-4">
                                <input type="radio" class="form-check-input" name="" id="{{$qnr['ans']->opt_d}}"> &nbsp
                                {{$qnr['ans']->opt_d}}
                            </li>
                        </label>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop