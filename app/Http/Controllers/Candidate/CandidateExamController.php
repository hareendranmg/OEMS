<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use DB;
use Illuminate\Http\Request;
use URL;

class CandidateExamController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            date_default_timezone_set('Asia/Kolkata');
            $cur_date = date('Y-m-d H:i:s');
            $cat_id = Auth::user()->cat_id;

            return datatables()->of(DB::table('exam_master')
                    ->where('category', $cat_id)
                    ->where('is_active', 1)
                    ->where('exam_start_time', '<=', $cur_date)
                    ->where('exam_end_time', '>=', $cur_date)
                    ->get())
                ->addColumn('action', function ($data) {
                    $url = URL::to('candidate/takeexam?exam_id='.Crypt::encrypt($data->id));
                    $button = '<a id="'.Crypt::encrypt($data->id).'" class="attend btn btn-primary col" href="'.$url.'">Attend</a>';

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
        $candidate_id = Auth::user()->id;

        $isAttended = DB::table('responses')
            ->where('exam_id', $exam_id)
            ->where('candidate_id', $candidate_id)
            ->value('candidate_id');

        if ($isAttended == null) {
            $questions = DB::table('questions')
                ->where('exam_id', $exam_id)
                ->get();

            $answers = DB::table('answers')
                ->where('exam_id', $exam_id)
                ->get();

            $qnrs = [];
            foreach ($questions as $question) {
                foreach ($answers as $answer) {
                    if ($question->qn_id == $answer->qn_id) {
                        array_push($qnrs, ['qn' => $question, 'ans' => $answer]);
                    }
                }
            }

            return view('/candidate/takeexam', compact('qnrs'));
        } else {
            return redirect()->back()->with('exm_msg', 'You already attempted the exam.');
        }
    }

    public function submitExam(Request $request)
    {
        $data = $request->validate([
            'responses.*.answer_id' => 'required',
        ], ['required' => 'Please select the answer.']);

        $candidate_id = Auth::user()->id;

        foreach ($request->responses as $key => $value) {
            $qn_id = $value['question_id'];
            $exm_id = $value['exam_id'];
            $ans = $value['answer_id'];

            $ans_id = DB::table('answers')
                ->where('exam_id', $exm_id)
                ->where('qn_id', $qn_id)
                ->select('opt_a', 'opt_b', 'opt_c', 'opt_d')
                ->first();

            $ans_opt = ($ans_id->opt_a == $ans) ? 'a' : (($ans_id->opt_b == $ans) ? 'b' : (($ans_id->opt_c == $ans) ? 'c' : 'd'));

            $insert_res = DB::table('responses')
                ->insert(['candidate_id' => $candidate_id,
                    'exam_id' => $exm_id,
                    'qn_id' => $qn_id,
                    'ans_opt' => $ans_opt,
                ]);
        }
        $status = 'success';

        return view('candidate/attended_exams', compact('status'));
    }
}
