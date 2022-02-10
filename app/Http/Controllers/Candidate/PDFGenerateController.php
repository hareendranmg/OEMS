<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PDF;

class PDFGenerateController extends Controller
{
    public function index(Request $request)
    {
        $exam_id = Crypt::decrypt($request->exam_id);

        $cand_id = Auth::user()->id;
        $candidate_name = Auth::user()->name;

        $exam_det = DB::table('exam_master')
            ->join('category', 'category.cat_id', 'exam_master.category')
            ->where('id', $exam_id)
            ->first();

        $exam_name = $exam_det->exam_name;
        $total_qns = $exam_det->total_questions;
        $right_mark = $exam_det->right_mark;
        $wrong_mark = $exam_det->wrong_mark;
        $pass_mark = $exam_det->pass_mark;

        $correct_ans_det = DB::table('answers')
            ->where('exam_id', $exam_id)
            ->select('exam_id', 'qn_id', 'correct_ans')
            ->get();

        $correct_ans_det = json_decode(json_encode($correct_ans_det), true);
        $combined = [];

        // dump($correct_ans_det);

        $cand_res_det = new Collection;

        $cand_ans_det = DB::table('responses')
            ->where('exam_id', $exam_id)
            ->where('candidate_id', $cand_id)
            ->select('candidate_id', 'qn_id', 'ans_opt')
            ->get();
        $cand_ans_det = json_decode(json_encode($cand_ans_det), true);
        // dd($cand_ans_det[0]['ans_opt']);
        $correct_ans = 0;

        foreach ($correct_ans_det as $key => $crct_ans) {
            if (array_key_exists($key, $cand_ans_det) && $crct_ans['qn_id'] == $cand_ans_det[$key]['qn_id']) {
                if ($crct_ans['correct_ans'] == $cand_ans_det[$key]['ans_opt']) {
                    $correct_ans++;
                }
                // $combined[$cand_res_det['qn_id']] = ['crct_ans' => $crct_ans['correct_ans'], 'ans_opt' => $cand_ans['ans_opt']];
            }
        }
        $wrong_ans = $total_qns - $correct_ans;

        $mark = ($correct_ans * $right_mark) - ($wrong_ans * $wrong_mark);
        $result = ($mark >= $pass_mark) ? 'Passed' : 'Failed';

        $html = '<h1 align="center"> <u>'.$exam_det->exam_name.' Result Report</u> </h1>
                <table border="0" align="center">
                    <tr>
                        <th align="left">Exam Name</th>
                        <td>:</td>
                        <td>'.$exam_det->exam_name.'</td>
                    </tr>
                    <tr>
                        <th align="left">Candidates Name</th>
                        <td>:</td>
                        <td>'.$candidate_name.'</td>
                    </tr>
                    <tr>
                        <th align="left">Category</th>
                                <td>:</td>
                        <td>'.$exam_det->cat_name.'</td>
                    </tr>
                    <tr>
                        <th align="left">Exam start time</th>
                        <td>:</td>
                        <td>'.$exam_det->exam_start_time.'</td>
                    </tr>
                    <tr>
                        <th align="left">Exam end time</th>
                        <td>:</td>
                        <td>'.$exam_det->exam_end_time.'</td>
                    </tr>
                    <tr>
                        <th align="left">Total Questions</th>
                        <td>:</td>
                        <td>'.$exam_det->total_questions.'</td>
                    </tr>
                    <tr>
                        <th align="left">Mark for correct answer</th>
                        <td>:</td>
                        <td>'.$exam_det->right_mark.'</td>
                    </tr>
                    <tr>
                        <th align="left">Mark for wrong answer</th>
                        <td>:</td>
                        <td>'.$exam_det->wrong_mark.'</td>
                    </tr>
                    <tr>
                        <th align="left">Mark for pass exam</th>
                        <td>:</td>
                        <td>'.$exam_det->pass_mark.'</td>
                    </tr>
                    <br />
                    <br />
                    <tr>
                        <th align="left">Correct answers</th>
                        <td>:</td>
                        <td>'.$correct_ans.'</td>
                    </tr>
                    <tr>
                        <th align="left">Wrong answers</th>
                        <td>:</td>
                        <td>'.$wrong_ans.'</td>
                    </tr>
                    <tr>
                        <th align="left">Mark obtained</th>
                        <td>:</td>
                        <td>'.$mark.'</td>
                    </tr>
                    <tr>
                        <th align="left">Result</th>
                        <td>:</td>
                        <td>'.$result.'</td>
                    </tr>
                </table>
                <h2 align="center"><u>Question and Answers</u></h2>';

        $questions = DB::table('questions')
            ->where('exam_id', $exam_id)
            ->get();

        $answers = DB::table('answers')
            ->where('exam_id', $exam_id)
            ->get();

        $responses = DB::table('responses')
            ->where('exam_id', $exam_id)
            ->where('candidate_id', $cand_id)
            ->get()
            ->toArray();

        $qnrs = [];
        $cnt = 0;
        foreach ($questions as $question) {
            foreach ($answers as $qn => $answer) {
                if ($question->qn_id == $answer->qn_id) {
                    $cnt++;
                    array_push($qnrs, ['qn_no' => $cnt, 'qn' => $question, 'ans' => $answer, 'res' => $responses[$qn]]);
                }
            }
        }

        // $qnrs = array_reverse($qnrs);
        // dd($qnrs);

        foreach ($qnrs as $qnr) {
            $html .= '<table align="center" width="100%" border="1" style="border-collapse: collapse;">
                        <tr>
                            <th width="30%">Question No</th>
                            <td width="70%" style="padding-left: 10px;">'.$qnr['qn_no'].'</td>
                        </tr>
                        <tr>
                            <th width="30%">Question</th>
                            <td width="70%" style="padding-left: 10px;">'.$qnr['qn']->qn_name.'</td>
                        </tr>
                        <tr>
                            <th width="30%" rowspan="4">Options</th>
                            <td width="70%" style="padding-left: 10px;">'.$qnr['ans']->opt_a.'</td>
                        </tr>
                        <tr>
                            <td width="70%" style="padding-left: 10px;">'.$qnr['ans']->opt_b.'</td>
                        </tr>
                        <tr>
                            <td width="70%" style="padding-left: 10px;">'.$qnr['ans']->opt_c.'</td>
                        </tr>
                        <tr>
                            <td width="70%" style="padding-left: 10px;">'.$qnr['ans']->opt_d.'</td>
                        </tr>
                        <tr>
                            <th width="30%">Correct Answer</th>
                            <td width="70%" style="padding-left: 10px;"> Option '.$qnr['ans']->correct_ans.'</td>
                        </tr>
                        <tr>
                            <th width="30%">Your Answer</th>
                            <td width="70%" style="padding-left: 10px;"> Option '.$qnr['res']->ans_opt.'</td>
                        </tr>
                    </table> <br />';
        }
        $pdf = PDF::loadHTML($html);

        return $pdf->stream();
    }
}
