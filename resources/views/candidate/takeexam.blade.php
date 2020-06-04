@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="submit_exam" method="post">
                @csrf
                @foreach($qnrs as $key => $qnr)
                <div class="card">
                    <div class="card-header">
                        <strong>{{$key+1}}</strong> &nbsp {{$qnr['qn']->qn_name}}
                    </div>
                    <div class="card-body">
                        @error('responses.'.$key.'.answer_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                        <ul class="list-group">
                            <label for="{{$qnr['ans']->opt_a}}">
                                <li class="list-group-item pl-4">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" class="form-check-input"
                                        id="{{$qnr['ans']->opt_a}}" value="{{$qnr['ans']->opt_a}}">
                                    &nbsp
                                    {{$qnr['ans']->opt_a}}
                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                        value="{{$qnr['qn']->qn_id}}">
                                    <input type="hidden" name="responses[{{$key}}][exam_id]"
                                        value="{{$qnr['qn']->exam_id}}">
                                </li>
                            </label>
                            <label for="{{$qnr['ans']->opt_b}}">
                                <li class="list-group-item pl-4">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" class="form-check-input"
                                        id="{{$qnr['ans']->opt_b}}" value="{{$qnr['ans']->opt_b}}">
                                    &nbsp
                                    {{$qnr['ans']->opt_b}}
                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                        value="{{$qnr['qn']->qn_id}}">
                                    <input type="hidden" name="responses[{{$key}}][exam_id]"
                                        value="{{$qnr['qn']->exam_id}}">
                                </li>
                            </label>
                            <label for="{{$qnr['ans']->opt_c}}">
                                <li class="list-group-item pl-4">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" class="form-check-input"
                                        id="{{$qnr['ans']->opt_c}}" value="{{$qnr['ans']->opt_c}}">
                                    &nbsp
                                    {{$qnr['ans']->opt_c}}
                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                        value="{{$qnr['qn']->qn_id}}">
                                    <input type="hidden" name="responses[{{$key}}][exam_id]"
                                        value="{{$qnr['qn']->exam_id}}">
                                </li>
                            </label>
                            <label for="{{$qnr['ans']->opt_d}}">
                                <li class="list-group-item pl-4">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" class="form-check-input"
                                        name="" id="{{$qnr['ans']->opt_d}}" value="{{$qnr['ans']->opt_d}}">
                                    &nbsp
                                    {{$qnr['ans']->opt_d}}
                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                        value="{{$qnr['qn']->qn_id}}">
                                    <input type="hidden" name="responses[{{$key}}][exam_id]"
                                        value="{{$qnr['qn']->exam_id}}">
                                </li>
                            </label>
                        </ul>
                    </div>
                </div>
                @endforeach

                <button type="submit" class="btn btn-block btn-success mb-5"> Submit</button>
            </form>
        </div>
    </div>
</div>

@stop