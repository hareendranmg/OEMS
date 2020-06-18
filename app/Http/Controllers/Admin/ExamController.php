<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Crypt;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use URL;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('category')
            ->get();
        return view('/admin/createexam', compact('categories'));
    }

    public function showexams()
    {
        if (request()->ajax()) {
            return datatables()->of(DB::table('exam_master')
                    ->join('category', 'category.cat_id', 'exam_master.category')
                    ->get())
                ->addColumn('action', function ($data) {
                    $url = URL::to('admin/edit_exam?exam_id=' . Crypt::encrypt($data->id));
                    $button = '<a id="' . Crypt::encrypt($data->id) . '" href=' . $url . ' class="view btn btn-primary btn-md pl-4 pr-4">Edit Exam</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('/admin/showexams');
    }

    public function store(Request $request)
    {
        if ($request->type == 'basic') {
            $ifExist = $request->basic_id;
            $examname = $request->examname;
            $examstarttime = $request->examstarttime;
            $examendtime = $request->examendtime;
            $totalquestion = $request->totalquestion;
            $correctmark = $request->correctmark;
            $wrongmark = $request->wrongmark;
            $passmark = $request->passmark;
            $category = $request->category;

            if ($ifExist != '') {
                $basicDetailsID = DB::table('exam_master')
                    ->where('id', $ifExist)
                    ->update([
                        'exam_name' => $examname,
                        'exam_start_time' => $examstarttime,
                        'exam_end_time' => $examendtime,
                        'total_questions' => $totalquestion,
                        'right_mark' => $correctmark,
                        'wrong_mark' => $wrongmark,
                        'pass_mark' => $passmark,
                        'category' => $category,
                    ]);
                return $ifExist;
            } else {
                $basicDetailsID = DB::table('exam_master')
                    ->insertGetId([
                        'exam_name' => $examname,
                        'exam_start_time' => $examstarttime,
                        'exam_end_time' => $examendtime,
                        'total_questions' => $totalquestion,
                        'right_mark' => $correctmark,
                        'wrong_mark' => $wrongmark,
                        'pass_mark' => $passmark,
                        'category' => $category,
                    ]);
                return $basicDetailsID;
            }
        }
        if ($request->type == 'question') {
            $exam_id = $request->exam_id;

            $qn_delete = DB::table('questions')
                ->where('exam_id', $exam_id)
                ->delete();
            $answer_delete = DB::table('answers')
                ->where('exam_id', $exam_id)
                ->delete();

            $data = $request->arrays;
            foreach ($data as $key) {
                $qn_name = $key[0];

                $qn_id = DB::table('questions')
                    ->insertGetId([
                        'exam_id' => $exam_id,
                        'qn_name' => $qn_name,
                    ]);

                $answer_id = DB::table('answers')
                    ->insertGetId([
                        'exam_id' => $exam_id,
                        'qn_id' => $qn_id,
                        'opt_a' => $key[1],
                        'opt_b' => $key[2],
                        'opt_c' => $key[3],
                        'opt_d' => $key[4],
                        'correct_ans' => $key[5],
                    ]);
            }
        }
        if ($request->type == 'create') {
            $exam_id = $request->exam_id;
            $createExam = DB::table('exam_master')
                ->where('id', $exam_id)
                ->update(['is_active' => 1]);
            return ($createExam);
        }
    }

    public function editExam(Request $request)
    {
        $exam_id = Crypt::decrypt($request->exam_id);
        $exam_det = DB::table('exam_master')
            ->where('id', $exam_id)
            ->first();

        $qn_det = DB::table('questions')
            ->join('answers', 'answers.qn_id', 'questions.qn_id')
            ->where('questions.exam_id', $exam_id)
            ->get();

        $exam_det = json_decode(json_encode($exam_det), true);
        $qn_det = json_decode(json_encode($qn_det), true);

        $categories = DB::table('category')
            ->get();

        return view('admin.edit_exam', compact('exam_det', 'qn_det', 'categories'));

    }

    public function finishedExams(Request $request)
    {
        if (request()->ajax()) {
            $exam_ids = DB::table('responses')
                ->distinct('exam_id')
                ->get();
            $exam_ids = json_decode(json_encode($exam_ids), true);

            return datatables()->of(DB::table('exam_master')
                    ->join('category', 'category.cat_id', 'exam_master.category')
                    ->whereIn('exam_master.id', $exam_ids)
                    ->get())
                ->addColumn('action', function ($data) {
                    $url = URL::to('admin/finished_exam?exam_id=' . Crypt::encrypt($data->id));
                    $button = '<a id="' . Crypt::encrypt($data->id) . '" href=' . $url . ' class="view btn btn-primary btn-md pl-4 pr-4">View Result</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.finished_exams');
    }

    public function finishedExam(Request $request)
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

        return view('admin.finished_exam', compact('exam_det', 'total_candidates', 'attended_candidates'));
    }

    public function candidateResult(Request $request)
    {
        if (request()->ajax()) {
            $cand_res_det = $this->getCandResult($request);
            return datatables()->of($cand_res_det)->make();
            // ->addColumn('action', function ($data) {
            //     // $url = URL::to('admin/finished_exam?exam_id=' . Crypt::encrypt($data->id));
            //     // $button = '<a id="' . Crypt::encrypt($data->id) . '" href=' . $url . ' class="view btn btn-primary btn-md pl-4 pr-4">View Result</a>';
            //     $button = '<a id="' . $data->id . '" class="view_btn btn btn-primary btn-md pl-4 pr-4">View Result</a>';
            //     return $button;
            // })
            // ->rawColumns(['action'])
            // ->make(true);
        }
    }

    public function getCandResult(Request $request, $exam_id=null)
    {
        if($exam_id == null)
            $exam_id = $request->exam_id;
        $ans_det_arr = [];
        $cand_res_det = new Collection;

        $exam_det = DB::table('exam_master')
            ->where('id', $exam_id)
            ->first();

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

        $candidates_det = DB::table('responses')
            ->join('users', 'users.id', 'responses.candidate_id')
            ->where('responses.exam_id', $exam_id)
            ->distinct('candidate_id')
            ->select('candidate_id', 'name')
            ->get();

        foreach ($candidates_det as $num => $candidate_det) {
            $cand_ans_det = DB::table('responses')
                ->where('exam_id', $exam_id)
                ->where('candidate_id', $candidate_det->candidate_id)
                ->select('candidate_id', 'qn_id', 'ans_opt')
                ->get();
            $cand_ans_det = json_decode(json_encode($cand_ans_det), true);
            $correct_ans = 0;

            foreach ($cand_ans_det as $key => $cand_ans) {
                if (array_key_exists($key, $correct_ans_det) && $cand_ans['qn_id'] == $correct_ans_det[$key]['qn_id']) {
                    if ($correct_ans_det[$key]['correct_ans'] == $cand_ans['ans_opt']) {
                        $correct_ans++;
                    }

                    $combined[$cand_ans['qn_id']] = ['crct_ans' => $correct_ans_det[$key]['correct_ans'], 'ans_opt' => $cand_ans['ans_opt']];
                }
            }

            $wrong_ans = $total_qns - $correct_ans;

            $mark = ($correct_ans * $right_mark) - ($wrong_ans * $wrong_mark);
            $result = ($mark >= $pass_mark) ? 'Passed' : 'Failed';

            $cand_res_det->push([
                'no' => ++$num,
                'name' => $candidate_det->name,
                'correct_ans' => $correct_ans,
                'right_mark' => $right_mark,
                'wrong_ans' => $wrong_ans,
                'wrong_mark' => $wrong_mark,
                'mark' => $mark,
                'result' => $result,
            ]);
        }

        return $cand_res_det;
    }
}
