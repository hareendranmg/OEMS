<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Auth;
use Collection;
use Crypt;
use DB;
use Illuminate\Http\Request;

class PostExamController extends Controller
{
    public function attendedExams(Request $request)
    {
        if (request()->ajax()) {
            $cand_id = Auth::user()->id;

            $ans_det_arr = [];
            $cand_res_det = new Collection;

            $attmted_exams = DB::table('responses')
                ->where('candidate_id', $cand_id)
                ->distinct('candidate_id')
                ->select('exam_id')
                ->get();

            // dd($attmted_exams);
            foreach ($attmted_exams as $key => $attmted_exam) {
                $exam_det = DB::table('exam_master')
                    ->where('id', $attmted_exam->exam_id)
                    ->first();

                $exam_name = $exam_det->exam_name;
                $total_qns = $exam_det->total_questions;
                $right_mark = $exam_det->right_mark;
                $wrong_mark = $exam_det->wrong_mark;
                $pass_mark = $exam_det->pass_mark;

                $correct_ans_det = DB::table('answers')
                    ->where('exam_id', $attmted_exam->exam_id)
                    ->select('exam_id', 'qn_id', 'correct_ans')
                    ->get();

                $correct_ans_det = json_decode(json_encode($correct_ans_det), true);
                $combined = [];

                $cand_ans_det = DB::table('responses')
                    ->where('exam_id', $attmted_exam->exam_id)
                    ->where('candidate_id', $cand_id)
                    ->select('candidate_id', 'qn_id', 'ans_opt')
                    ->get();
                $cand_ans_det = json_decode(json_encode($cand_ans_det), true);
                $correct_ans = 0;

                foreach ($correct_ans_det as $key => $crct_ans) {
                    if (array_key_exists($key, $cand_ans_det) && $crct_ans['qn_id'] == $cand_ans_det[$key]['qn_id']) {
                        if ($crct_ans['correct_ans'] == $cand_ans_det[$key]['ans_opt']) {
                            $correct_ans++;
                        }
                        // $combined[$cand_res_det['qn_id']] = ['crct_ans' => $crct_ans['correct_ans'], 'ans_opt' => $cand_ans['ans_opt']];
                    }
                }

                // foreach ($cand_ans_det as $key => $cand_ans) {
                //     if (array_key_exists($key, $correct_ans_det) && $cand_ans['qn_id'] == $correct_ans_det[$key]['qn_id']) {
                //         if ($correct_ans_det[$key]['correct_ans'] == $cand_ans['ans_opt']) {
                //             $correct_ans++;
                //         }
                //         $combined[$cand_ans['qn_id']] = ['crct_ans' => $correct_ans_det[$key]['correct_ans'], 'ans_opt' => $cand_ans['ans_opt']];
                //     }
                // }

                $wrong_ans = $total_qns - $correct_ans;

                $mark = ($correct_ans * $right_mark) - ($wrong_ans * $wrong_mark);
                $result = ($mark >= $pass_mark) ? 'Passed' : 'Failed';

                $cand_res_det->push([
                    'id' => ++$key,
                    'exam_name' => $exam_name,
                    'pass_mark' => $pass_mark,
                    'correct_ans' => $correct_ans,
                    'right_mark' => $right_mark,
                    'wrong_ans' => $wrong_ans,
                    'wrong_mark' => $wrong_mark,
                    'mark' => $mark,
                    'result' => $result,
                    'action' => '<a class="btn btn-primary" target="_blank" href="pdf_exam_report?exam_id=' . Crypt::encrypt($attmted_exam->exam_id) . '">Exam Report</a>',
                ]);
            }


            return datatables()->of($cand_res_det)->make();
        }
        return view('candidate.attended_exams');
    }
}
