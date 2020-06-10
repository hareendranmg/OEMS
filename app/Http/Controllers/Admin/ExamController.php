<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon;
use Crypt;
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
        if(request()->ajax())
        {
            return datatables()->of(DB::table('exam_master')
                                ->join('category', 'category.cat_id', 'exam_master.category')
                                ->get())
                    ->addColumn('action', function($data){
                        $url = URL::to('admin/edit_exam?exam_id='.Crypt::encrypt($data->id));
                        $button = '<a id="'.Crypt::encrypt($data->id).'" href='.$url.' class="view btn btn-primary btn-md pl-4 pr-4">Edit Exam</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('/admin/showexams');
    }

    public function store(Request $request)
    {
        if($request->type == 'basic') {
            $ifExist = $request->basic_id;
            $examname = $request->examname;
            $examstarttime = $request->examstarttime;
            $examendtime = $request->examendtime;
            $totalquestion = $request->totalquestion;
            $correctmark = $request->correctmark;
            $wrongmark = $request->wrongmark;
            $passmark = $request->passmark;
            $category = $request->category;

            if($ifExist != '') {
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
        if($request->type == 'question') {
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
        if($request->type == 'create') {
            $exam_id = $request->exam_id;
            $createExam = DB::table('exam_master')
                            ->where('id', $exam_id)
                            ->update(['is_active' => 1]);
            return($createExam);
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


        return view('admin.edit_exam', compact('exam_det','qn_det', 'categories'));

    }
}
