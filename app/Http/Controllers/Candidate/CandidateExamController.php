<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;
use Crypt;
use URL;

class CandidateExamController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {

            date_default_timezone_set("Asia/Kolkata");
            $cur_date = date("Y-m-d H:i:s");
            $cat_id = Auth::user()->cat_id;

            return datatables()->of(DB::table('exam_master')
                    ->where('category', $cat_id)
                    ->where('is_active', 1)
                    ->where('exam_start_time', '<=', $cur_date)
                    ->where('exam_end_time', '>=', $cur_date)
                    ->get())
                ->addColumn('action', function ($data) {
                    $url = URL::to('candidate/takeexam?exam_id='.Crypt::encrypt($data->id)); 
                    $button = '<a id="' . Crypt::encrypt($data->id) . '" class="attend btn btn-primary col" href="'.$url.'">Attend</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('/candidate/showexams');
    }

    public function takeExam(Request $request)
    {
        $exam_id = Crypt::decrypt($request->exam_id);
        $questions = DB::table('questions')
                      ->where('exam_id', $exam_id)
                      ->get();

        $answers = DB::table('answers')
                     ->where('exam_id', $exam_id)
                     ->get();

        $qnrs = [];
        foreach ($questions as $question) {
            foreach ($answers as $answer) {
                if($question->qn_id == $answer->qn_id) {
                    array_push($qnrs, ['qn' => $question, 'ans' => $answer]);
                }
            }
        }

        // print_r(json_encode($qnr));
                      
        return view('/candidate/takeexam', compact('qnrs'));
    }
}
