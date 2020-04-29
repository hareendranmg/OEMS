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
                        aria-controls="activate" aria-selected="false">Activate Exam&nbsp;<span><i
                                class="fa fa-check-double"></i></span></a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                    <div class="card card-info">
                        <form class="form-horizontal" id="basicForm">
                            @csrf
                            <input type="hidden" name="type" value="basic">
                            <input type="hidden" name="basic_id" id="basic_id" value="">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="examname" class="col-sm-4 col-form-label">Exam name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="examname" name="examname"
                                            placeholder="Exam Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examstarttime" class="col-sm-4 col-form-label">Exam start time</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datetimepicker-input" id="examstarttime"
                                            name="examstarttime" data-toggle="datetimepicker"
                                            placeholder="Exam start time" data-target="#examstarttime" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="examendtime" class="col-sm-4 col-form-label">Exam end time</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datetimepicker-input" id="examendtime"
                                            name="examendtime" data-toggle="datetimepicker" placeholder="Exam end time"
                                            data-target="#examendtime" />
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="totalquestion" class="col-sm-4 col-form-label">Total Questions</label>
                                    <div class="col-sm-8">
                                        <input type="number" onkeyup="if(!this.checkValidity()){this.value='';};" class="form-control" id="totalquestion" name="totalquestion" placeholder="Total Questions" min="0">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label for="correctmark" class="col-sm-4 col-form-label">Mark for correct
                                        answer</label>
                                    <div class="col-sm-8">
                                        <input type="number" onkeyup="if(!this.checkValidity()){this.value='';};"
                                            class="form-control" id="correctmark" name="correctmark"
                                            placeholder="Mark for correct answer" min="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wrongmark" class="col-sm-4 col-form-label">Mark for wrong answer</label>
                                    <div class="col-sm-8">
                                        <input type="number" onkeyup="if(!this.checkValidity()){this.value='';};"
                                            class="form-control" id="wrongmark" name="wrongmark"
                                            placeholder="Mark for wrong answer" min="-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passmark" class="col-sm-4 col-form-label">Mark for pass exam</label>
                                    <div class="col-sm-8">
                                        <input type="number" onkeyup="if(!this.checkValidity()){this.value='';};"
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
                                            <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
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
                <div class="tab-pane fade show active" id="question" role="tabpanel" aria-labelledby="question-tab">
                    <div class="card card-info">
                        <form class="form-horizontal" id="basicForm">
                            @csrf
                            <input type="hidden" name="type" value="question">
                            <input type="hidden" name="question_id" id="question_id" value="">
                            <div class="card card-info">
                                <div class="card-body">
                                    <button type="button" class="btn btn-info float-right" id="addrow">Add Question
                                        &nbsp; <span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                    <table class="table table-md" id="question_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
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
                                            <tr>
                                                <td>1</td>
                                                <td><textarea class="form-control" name="qn_name_1" id="qn_name"
                                                        placeholder="Question" rows="1"></textarea></td>
                                                <td><textarea class="form-control" name="opt_a_1" id="opt_a"
                                                        placeholder="Option A" rows="1"></textarea></td>
                                                <td><textarea class="form-control" name="opt_b_1" id="opt_b"
                                                        placeholder="Option B" rows="1"></textarea></td>
                                                <td><textarea class="form-control" name="opt_c_1" id="opt_c"
                                                        placeholder="Option C" rows="1"></textarea></td>
                                                <td><textarea class="form-control" name="opt_d_1" id="opt_d"
                                                        placeholder="Option D" rows="1"></textarea></td>
                                                <td><select class="form-control" name="opt_correct_1" id="opt_correct"
                                                        data-parsley-required="true">
                                                        <option value="">Select Option</option>
                                                        <option value="a">Option A</option>
                                                        <option value="b">Option B</option>
                                                        <option value="c">Option C</option>
                                                        <option value="d">Option D</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="tab-pane fade" id="activate" role="tabpanel" aria-labelledby="activate-tab">
                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id
                    mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                    tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                    condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique.
                    Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est
                    libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum
                    metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
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
        $('#examendtime').attr("disabled", true);
        $('#examstarttime').on("input propertychange", function (e) {
            if ($('#examstarttime').val()) {
                $('#examendtime').removeAttr('disabled');
            } else {
                $('#examendtime').attr('disabled', true);
            }
        });

        $('#examstarttime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            minDate: new Date(),
        });
        $('#examendtime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false,
        });
        $("#examstarttime").on("change.datetimepicker", function (e) {
            $('#examendtime').datetimepicker('minDate', e.date);
        });
        $("#examendtime").on("change.datetimepicker", function (e) {
            $('#examstarttime').datetimepicker('maxDate', e.date);
        });

        $('#addrow').click(function () {
            if ($('#question_table tr').length <= 9) {
                var newRowid = get_lastID();
                $('#question_table tbody').append(newRowid);
            } else {
                alert("Reached Maximum Rows!");
            };
        });

        $("#question_table").on("click", "#delrow", function () {
            $(this).closest("tr").remove();
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
            }
        });
    }

    function questionFormValidate() {
        if (!$('#qn_name').val()) {
            var v1 = false;
            $('#qn_name').addClass('is-invalid');
        } else {
            v1 = true;
            $('#qn_name').removeClass('is-invalid');
            $('#qn_name').addClass('is-valid');
        }
        if (!$('#opt_a').val()) {
            var v2 = false;
            $('#opt_a').addClass('is-invalid');
        } else {
            v2 = true;
            $('#opt_a').removeClass('is-invalid');
            $('#opt_a').addClass('is-valid');
        }
        if (!$('#opt_b').val()) {
            var v3 = false;
            $('#opt_b').addClass('is-invalid');
        } else {
            v3 = true;
            $('#opt_b').removeClass('is-invalid');
            $('#opt_b').addClass('is-valid');
        }
        if (!$('#opt_c').val()) {
            var v4 = false;
            $('#opt_c').addClass('is-invalid');
        } else {
            v4 = true;
            $('#opt_c').removeClass('is-invalid');
            $('#opt_c').addClass('is-valid');
        }
        if (!$('#opt_d').val()) {
            var v5 = false;
            $('#opt_d').addClass('is-invalid');
        } else {
            v5 = true;
            $('#opt_d').removeClass('is-invalid');
            $('#opt_d').addClass('is-valid');
        }
        if (!$('#opt_correct').val()) {
            var v6 = false;
            $('#opt_correct').addClass('is-invalid');
        } else {
            v6 = true;
            $('#opt_correct').removeClass('is-invalid');
            $('#opt_correct').addClass('is-valid');
        }

        if (v1 && v2 && v3 && v4 && v5 && v6) {
            questionFormSubmit();
        }
    }

    function basicFormSubmit() {
        $.ajax({
            type: "POST",
            url: "exam",
            data: $('#questionForm').serialize(),
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
            }
        });
    }

    var get_lastID = function () {
        var id = $('#question_table tr:last-child td:first-child').text();
        var lastChar = parseInt(id);
            lastChar = lastChar + 1;
        var newRow = '<tr> \
                    <td>'+lastChar+'</td> \
                    <td> <textarea class="form-control" name="qn_name_1" id="qn_name" placeholder="Question" rows="1"></textarea></td> \
                    <td> <textarea class="form-control" name="opt_a_1" id="opt_a" placeholder="Option A" rows="1"></textarea></td> \
                    <td> <textarea class="form-control" name="opt_b_1" id="opt_b" placeholder="Option B" rows="1"></textarea></td> \
                    <td> <textarea class="form-control" name="opt_c_1" id="opt_c" placeholder="Option C" rows="1"></textarea></td> \
                    <td> <textarea class="form-control" name="opt_d_1" id="opt_d" placeholder="Option D" rows="1"></textarea></td> \
                    <td> <select class="form-control" name="opt_correct_1" id="opt_correct" data-parsley-required="true"> \
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