<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use DB;
use Illuminate\Http\Request;
use URL;

class PostExamController extends Controller
{
    public function attendedExams(Request $request)
    {
        if (request()->ajax()) {
            $attended_exams = DB::table('responses')
                ->where('candidate_id', Auth::user()->id)
                ->select('exam_id')
                ->distinct()
                ->get();

            $attended_exams= json_decode(json_encode($attended_exams), true);

            $exam_det = DB::table('exam_master')
                ->whereIn('id', $attended_exams)
                ->select('id', 'exam_name', 'exam_start_time')
                ->get();

            return datatables()->of($exam_det)
                ->addColumn('exam_date', function($data) {
                        $exam_date = date_format(date_create($data->exam_start_time), "Y-m-d");
                        return $exam_date;
                    })
                ->addColumn('action', function ($data) {
                    $url = URL::to('candidate/view_result?exam_id=' . Crypt::encrypt($data->id));
                    $button = '<a id="' . Crypt::encrypt($data->id) . '" class="attend btn btn-primary col" href="' . $url . '">View Result</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('candidate.attended_exams');
    }
}