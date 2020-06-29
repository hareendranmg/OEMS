<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ExamController;
use DB;
use Illuminate\Http\Request;
use PDF;
use Crypt;

class PDFGenerateController extends Controller
{
    public function index(Request $request)
    {

        $exam_id = Crypt::decrypt($request->exam_id);
        $exam_det = DB::table('exam_master')
            ->join('category', 'category.cat_id', 'exam_master.category')
            ->where('id', $exam_id)
            ->first();

        $total_candidates = DB::table('category')
            ->join('users', 'users.cat_id', 'category.cat_id')
            ->where('category.cat_id', $exam_det->category)
            ->count();

        $attended_candidates = DB::table('category')
            ->join('users', 'users.cat_id', 'category.cat_id')
            ->join('responses', 'responses.candidate_id', 'users.id')
            ->where('category.cat_id', $exam_det->category)
            ->distinct('responses.candidate_id')
            ->count();

        $exam_cntrl = new ExamController(); 
        $cand_res_det = $exam_cntrl->getCandResult($request, $exam_id);

        $html = '<h1 align="center"> <u>'.$exam_det->exam_name.' Result Report</u> </h1>
                <table border="0" align="center">
                    <tr>
                        <th align="left">Exam Name</th>
                        <td>:</td>
                        <td>'.$exam_det->exam_name.'</td>
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
                    <tr>
                        <th align="left">Category</th>
                                <td>:</td>
                        <td>'.$exam_det->cat_name.'</td>
                    </tr>
                    <tr>
                        <th align="left">Total Candidates</th>
                        <td>:</td>
                        <td>'.$total_candidates.'</td>
                    </tr>
                    <tr>
                        <th align="left">No of Students Attended</th>
                        <td>:</td>
                        <td>'.$attended_candidates.'</td>
                    </tr>
                </table>
                <h2 align="center"><u>Marks of Candidates</u></h2>
                <table align="center" width="100%" border="1" style="border-collapse: collapse;">
                    <tr>
                        <th width="15%">Sl No</th>
                        <th width="35%">Candidate Name</th>
                        <th width="25%">Mark</th>
                        <th width="25%">Result</th>
                    </tr>';
                foreach ($cand_res_det as $det) {
                    $html.='<tr>
                        <td width="15%" align="center">'.$det["no"].'</td>
                        <td width="35%" align="center">'.$det["name"].'</td>
                        <td width="25%" align="center">'.$det["mark"].'</td>
                        <td width="25%" align="center">'.$det["result"].'</td>
                    </tr>';
                }
                $html.='</table>';
        $pdf = PDF::loadHTML($html);
        return $pdf->stream();
    }
}
