@extends('adminlte::page')

@section('title', 'Exams')

@section('content')

<div class="container">
    <h2 class="text-center">{{$exam_det->exam_name}} Result Dashboard</h2>
    <div class="row">
        <div class="col-md-2 mb-3">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="exam_det-tab" data-toggle="tab" href="#exam_det" role="tab"
                        aria-controls="exam_det" aria-selected="true">Exam Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="attended-tab" data-toggle="tab" href="#attended" role="tab"
                        aria-controls="attended" aria-selected="false">Attended Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="result-tab" data-toggle="tab" href="#result" role="tab"
                        aria-controls="result" aria-selected="false">Result</a>
                </li>
            </ul>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-10">
            <div class="tab-content" id="result_dashboard">
                <div class="tab-pane fade show active" id="exam_det" role="tabpanel" aria-labelledby="exam_det-tab">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="examname" class="col-sm-4 col-form-label">Exam name</label>
                            <p class="col-sm-8">{{$exam_det->exam_name}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="examstarttime" class="col-sm-4 col-form-label">Exam start time</label>
                            <p class="col-sm-8">{{$exam_det->exam_start_time}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="examendtime" class="col-sm-4 col-form-label">Exam end time</label>
                            <p class="col-sm-8">{{$exam_det->exam_end_time}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="totalquestion" class="col-sm-4 col-form-label">Total Questions</label>
                            <p class="col-sm-8">{{$exam_det->total_questions}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="correctmark" class="col-sm-4 col-form-label">Mark for correct
                                answer</label>
                            <p class="col-sm-8">{{$exam_det->right_mark}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="wrongmark" class="col-sm-4 col-form-label">Mark for wrong answer</label>
                            <p class="col-sm-8">{{$exam_det->wrong_mark}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="passmark" class="col-sm-4 col-form-label">Mark for pass exam</label>
                            <p class="col-sm-8">{{$exam_det->pass_mark}}</p>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="attended" role="tabpanel" aria-labelledby="attended-tab">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="examname" class="col-sm-4 col-form-label">Cateory</label>
                            <p class="col-sm-8">{{$exam_det->cat_name}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="examstarttime" class="col-sm-4 col-form-label">Total Candidates</label>
                            <p class="col-sm-8">{{$total_candidates}}</p>
                        </div>
                        <div class="form-group row">
                            <label for="examendtime" class="col-sm-4 col-form-label">No of Students Attended Exam</label>
                            <p class="col-sm-8">{{$attended_candidates}}</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="result" role="tabpanel" aria-labelledby="result-tab">
                    <table class="table" id="result_table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Candidate Name</th>
                                <th>Mark</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-md-8 -->
    </div>



</div>
<!-- /.container -->

@stop

@section('js')
<script>
$(function() {
    getTable();
});

function getTable() {
    var exam_id = {{$exam_det->id}};
    $('#result_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "candidate_result",
            data: { exam_id: exam_id }
        },
        columns: [{
                data: 'res_id',
            },
            {
                data: 'res_id',
            },
            {
                data: 'res_id',
            },
            {
                data: 'res_id',
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