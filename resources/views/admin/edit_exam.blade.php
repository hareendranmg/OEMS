@extends('adminlte::page')

@section('title', 'Create Exam')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
<div class="col-12 col-sm-12">
    <div class="card card-primary card-tabs">
        <div class="card p-3 pt-4">
            <ul class="nav nav-pills justify-content-center nav-fill" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="pill" href="#basic" role="tab"
                        aria-controls="basic" aria-selected="true">Basic Details&nbsp;<span><i
                                class="fa fa-angle-double-right"></i></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="question-tab" data-toggle="pill" href="#question" role="tab"
                        aria-controls="question" aria-selected="false">Add Questions&nbsp;<span><i
                                class="fa fa-angle-double-right"></i></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="activate-tab" data-toggle="pill" href="#activate" role="tab"
                        aria-controls="activate" aria-selected="false">Create Exam&nbsp;<span><i
                                class="fa fa-check-double"></i></span></a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                    <div class="card card-info">
                        <form class="form-horizontal" id="basicForm">
                            @csrf
                            <input type="hidden" name="type" value="basic">
                            <input type="hidden" name="basic_id" id="basic_id" value="">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="examname" class="col-sm-4 col-form-label">Exam name</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$exam_det['exam_name']}}" class="form-control" id="examname" name="examname"
                                            placeholder="Exam Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examstarttime" class="col-sm-4 col-form-label">Exam start time</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$exam_det['exam_start_time']}}" class="form-control datetimepicker-input" id="examstarttime"
                                            name="examstarttime" data-toggle="datetimepicker"
                                            placeholder="Exam start time" data-target="#examstarttime" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examendtime" class="col-sm-4 col-form-label">Exam end time</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$exam_det['exam_end_time']}}" class="form-control datetimepicker-input" id="examendtime"
                                            name="examendtime" data-toggle="datetimepicker" placeholder="Exam end time"
                                            data-target="#examendtime" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="totalquestion" class="col-sm-4 col-form-label">Total Questions</label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{$exam_det['total_questions']}}" onkeyup="if(!this.checkValidity()){this.value='';};" class="form-control" id="totalquestion" name="totalquestion" placeholder="Total Questions" min="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="correctmark" class="col-sm-4 col-form-label">Mark for correct
                                        answer</label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{$exam_det['right_mark']}}" onkeyup="if(!this.checkValidity()){this.value='';};"
                                            class="form-control" id="correctmark" name="correctmark"
                                            placeholder="Mark for correct answer" min="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wrongmark" class="col-sm-4 col-form-label">Mark for wrong answer</label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{$exam_det['wrong_mark']}}" onkeyup="if(!this.checkValidity()){this.value='';};"
                                            class="form-control" id="wrongmark" name="wrongmark"
                                            placeholder="Mark for wrong answer" min="-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passmark" class="col-sm-4 col-form-label">Mark for pass exam</label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{$exam_det['pass_mark']}}" onkeyup="if(!this.checkValidity()){this.value='';};"
                                            class="form-control" id="passmark" name="passmark"
                                            placeholder="Mark for pass exam" min="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-4 col-form-label">Candidate category</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="category" id="category"
                                            data-parsley-required="true">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <?php
                                                    $selected = ($category->cat_id == $exam_det['category'])? "selected": '';
                                                ?>
                                                <option value="{{ $category->cat_id }}" selected="{{$selected}}">
                                                    {{ $category->cat_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                <button type="submit" id="basicButton" onclick="basicFormValidate(); return false;"
                                    class="btn btn-success float-right">Next &nbsp; <span><i
                                            class="fa fa-forward"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="question-tab">
                    <div class="card card-info">
                        <form class="form-horizontal" id="basicForm">
                            @csrf
                            <input type="hidden" name="type" value="question">
                            <input type="hidden" name="question_id" id="question_id" value="">
                            <div class="card card-info">
                                <div class="card-body">
                                    <p class="float-left">
                                        Added Questions: <span id="no_of_rows" >1</span> &nbsp;&nbsp;
                                        Total Questions: <span id="total_qns" >4</span>
                                    </p>
                                    <button type="button" class="btn btn-info float-right" id="addrow">Add Question
                                        &nbsp; <span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                    <table class="table table-md" id="question_table">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Option A</th>
                                                <th>Option B</th>
                                                <th>Option C</th>
                                                <th>Option D</th>
                                                <th>Correct Option</th>
                                                <th>&nbsp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($qn_det as $qn)
                                            <tr class="data">
                                                <td><textarea class="form-control value" name="qn_name_1" id="qn_name"
                                                        placeholder="Question" rows="1">{{$qn['qn_name']}}</textarea></td>
                                                <td><textarea class="form-control value" name="opt_a_1" id="opt_a"
                                                        placeholder="Option A" rows="1">{{$qn['opt_a']}}</textarea></td>
                                                <td><textarea class="form-control value" name="opt_b_1" id="opt_b"
                                                        placeholder="Option B" rows="1">{{$qn['opt_b']}}</textarea></td>
                                                <td><textarea class="form-control value" name="opt_c_1" id="opt_c"
                                                        placeholder="Option C" rows="1">{{$qn['opt_c']}}</textarea></td>
                                                <td><textarea class="form-control value" name="opt_d_1" id="opt_d"
                                                        placeholder="Option D" rows="1">{{$qn['opt_d']}}</textarea></td>
                                                <td><select class="form-control value" name="opt_correct_1" id="opt_correct"
                                                        data-parsley-required="true">
                                                        <option value="">Select Option</option>
                                                        <option value="a" {{($qn['correct_ans'] == 'a')? 'selected': ''}}>Option A</option>
                                                        <option value="b" {{($qn['correct_ans'] == 'b')? 'selected': ''}}>Option B</option>
                                                        <option value="c" {{($qn['correct_ans'] == 'c')? 'selected': ''}}>Option C</option>
                                                        <option value="d" {{($qn['correct_ans'] == 'd')? 'selected': ''}}>Option D</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="questionButton" onclick="questionFormValidate(); return false;"
                                    class="btn btn-success float-right">
                                    Next &nbsp; <span><i class="fa fa-forward"></i></span>
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="tab-pane fade" id="activate" role="tabpanel" aria-labelledby="activate-tab">
                        <div class="d-flex justify-content-center">
                            <h3>Click the button below to create the Exam.</h3>
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            <button type="button" class="btn btn-lg btn-outline-success" id="createExamButton" onclick="createExam(); return false;">
                                Edit Exam
                            </button>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="modal fade show" id="createdModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-success">×</span></button>
      </div>
      <div class="modal-body">
        <h4 class="text-success">Exam edited successfully...</h4>
      </div>
      <div class="modal-footer justify-content-between">
        <a href="{{url('admin/exam')}}" class="btn btn-outline-success">Create new exam</a>
        <a href="{{url('admin/showexams')}}" class="btn btn-outline-success">View exams</a>
      </div>
    </div>
  </div>>
</div>

@stop

@section('content')

@stop


@section('js')
<script>

    $(document).ready(function () {
        $('body').Layout('fixLayoutHeight');
        $('body').addClass('layout-fixed layout-navbar-fixed ');
        // $('.main-sidebar').height($(document).outerHeight());
        // $('#examendtime').attr("disabled", true);
        // $('#examstarttime').on("input propertychange", function (e) {
        //     if ($('#examstarttime').val()) {
        //         // $('#examendtime').removeAttr('disabled');
        //     } else {
        //         $('#examendtime').attr('disabled', true);
        //     }
        // });

        // $('#examstarttime').datetimepicker({
        //     format: 'YYYY-MM-DD HH:mm:ss',
        //     minDate: new Date(),
        // });
        // $('#examendtime').datetimepicker({
        //     format: 'YYYY-MM-DD HH:mm:ss',
        //     useCurrent: false,
        // });
        // $("#examstarttime").on("change.datetimepicker", function (e) {
        //     $('#examendtime').datetimepicker('minDate', e.date);
        // });
        // $("#examendtime").on("change.datetimepicker", function (e) {
        //     $('#examstarttime').datetimepicker('maxDate', e.date);
        // });

        $('#addrow').click(function () {
            if ($('#question_table tr').length <= $("#total_qns").text()) {
                var newRowid = get_lastID();
                $('#question_table tbody').append(newRowid);
            } else {
                alert("Maximum questions reached!");
            };
        });

        $("#question_table").on('click', '.delrow', function () {
            $(this).closest('tr').remove();
            $("#no_of_rows").text($('#question_table tr').length - 1)
        });
    });

    function basicFormValidate() {
        var isValid = false;
        if (!$('#examname').val()) {
            isValid = false;
            $('#examname').addClass('is-invalid');
        } else {
            isValid = true;
            $('#examname').removeClass('is-invalid');
            $('#examname').addClass('is-valid');
        }
        if (!$('#examstarttime').val()) {
            isValid = false;
            $('#examstarttime').addClass('is-invalid');
        } else {
            isValid = true;
            $('#examstarttime').removeClass('is-invalid');
            $('#examstarttime').addClass('is-valid');
        }
        if (!$('#examendtime').val()) {
            isValid = false;
            $('#examendtime').addClass('is-invalid');
        } else {
            isValid = true;
            $('#examendtime').removeClass('is-invalid');
            $('#examendtime').addClass('is-valid');
        }
        if (!$('#totalquestion').val()) {
            isValid = false;
            $('#totalquestion').addClass('is-invalid');
        } else {
            isValid = true;
            $('#totalquestion').removeClass('is-invalid');
            $('#totalquestion').addClass('is-valid');
        }
        if (!$('#correctmark').val()) {
            isValid = false;
            $('#correctmark').addClass('is-invalid');
        } else {
            isValid = true;
            $('#correctmark').removeClass('is-invalid');
            $('#correctmark').addClass('is-valid');
        }
        if (!$('#wrongmark').val()) {
            isValid = false;
            $('#wrongmark').addClass('is-invalid');
        } else {
            isValid = true;
            $('#wrongmark').removeClass('is-invalid');
            $('#wrongmark').addClass('is-valid');
        }
        if (!$('#passmark').val()) {
            isValid = false;
            $('#passmark').addClass('is-invalid');
        } else {
            isValid = true;
            $('#passmark').removeClass('is-invalid');
            $('#passmark').addClass('is-valid');
        }
        if (!$('#category').val()) {
            isValid = false;
            $('#category').addClass('is-invalid');
        } else {
            isValid = true;
            $('#category').removeClass('is-invalid');
            $('#category').addClass('is-valid');
        }

        if (isValid === true) {
            basicFormSubmit();
        }
    }

    function basicFormSubmit() {
        $.ajax({
            type: "POST",
            url: "exam",
            data: $('#basicForm').serialize(),
            processData: false,
            beforeSend: function () {
                $('#basicButton').attr("disabled", true);
                $('#basicButton').text('Processing...');
            },
            success: function (response) {
                $('#basicButton').removeAttr("disabled");
                $('#basicButton').html('Next &nbsp; <span><i class="fa fa-forward"></i></span>');

                $("#basic-tab").removeClass("active");
                $("#question-tab").removeClass("disabled");
                $("#question-tab").addClass("active");

                $("#basic").removeClass("show active");
                $("#question").addClass("show active");

                $('#basic_id').val(response);
                $("#total_qns").text($('#totalquestion').val());
            }
        });
    }

    function questionFormValidate() {
        var arrays = [], qnFormValid = true;
        console.log($('#question_table tr').length - 1);
        console.log($("#total_qns").text());
        
        if (($('#question_table tr').length - 1 ) < $("#total_qns").text()) {
            qnFormValid = false;
            $(document).Toasts('create', {
                class: 'bg-danger',
                autohide: true,
                title: 'Alert',
                title: 'The no of questions you added doesnot match with the total no of questions.'
            })
        }
        $("#question_table tr.data").map(function (index, elem) {
            var ret = [];
            $('.value', this).each(function () {
                   var d = $(this).val();
                if(d === "") {
                    $(this).addClass('is-invalid');
                    qnFormValid = false;
                } else {
                    $(this).removeClass('is-invalid');
                }
                ret.push(d);
            });
            arrays.push(ret);
        });
        console.log(arrays);
        if(qnFormValid) {
            questionFormSubmit(arrays);
        }
    }

    function questionFormSubmit(arrays) {
        var exam_id = $('#basic_id').val();
        $.ajax({
            type: "POST",
            url: "exam",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data: {arrays: arrays, exam_id: exam_id, type: 'question'},
            beforeSend: function () {
                $('#questionButton').attr("disabled", true);
                $('#questionButton').text('Processing...');
            },
            success: function (response) {
                $('#questionButton').removeAttr("disabled");
                $('#questionButton').html('Next &nbsp; <span><i class="fa fa-forward"></i></span>');

                $("#question-tab").removeClass("active");
                $("#activate-tab").removeClass("disabled");
                $("#activate-tab").addClass("active");

                $("#question").removeClass("show active");
                $("#activate").addClass("show active");
            }
        });
    }

    function createExam() {
        var exam_id = $('#basic_id').val();
        $.ajax({
            type: "POST",
            url: "exam",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data: {exam_id: exam_id, type: 'create'},
            beforeSend: function () {
                $('#createExamButton').attr("disabled", true);
                $('#createExamButton').text('Creating...');
            },
            success: function (response) {
                $('#createExamButton').html('Exam Created.');
                $('#createdModal').modal('show')
            }
        });
    }

    var get_lastID = function () {
        var no_of_rows = $('#question_table tr').length;
        $("#no_of_rows").text(no_of_rows);
           
        var newRow = '<tr class="data"> \
                    <td> <textarea class="form-control value" name="qn_name_1" id="qn_name" placeholder="Question" rows="1"></textarea></td> \
                    <td> <textarea class="form-control value" name="opt_a_1" id="opt_a" placeholder="Option A" rows="1"></textarea></td> \
                    <td> <textarea class="form-control value" name="opt_b_1" id="opt_b" placeholder="Option B" rows="1"></textarea></td> \
                    <td> <textarea class="form-control value" name="opt_c_1" id="opt_c" placeholder="Option C" rows="1"></textarea></td> \
                    <td> <textarea class="form-control value" name="opt_d_1" id="opt_d" placeholder="Option D" rows="1"></textarea></td> \
                    <td> <select class="form-control value" name="opt_correct_1" id="opt_correct" data-parsley-required="true"> \
                            <option value="">Select Option</option> \
                            <option value="a">Option A</option> \
                            <option value="b">Option B</option> \
                            <option value="c">Option C</option> \
                            <option value="d">Option D</option> \
                         </select> \
                    </td> \
                    <td><button type="button" class="btn btn-danger delrow" id="delrow"> \
                            <i class="fa fa-minus-circle"></i> \
                        </button> \
                    </td> \
                </tr>';
        return newRow;
    }

</script>
@stop