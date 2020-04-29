<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type == 'basic') {
            $examname = $request->examname;
            $examstarttime = $request->examstarttime;
            $examendtime = $request->examendtime;
            // $totalquestion = $request->totalquestion;
            $correctmark = $request->correctmark;
            $wrongmark = $request->wrongmark;
            $passmark = $request->passmark;
            $category = $request->category;

            $ifExist = DB::table('exam_master')
                        ->where([
                                ['exam_name', $examname],
                                ['exam_start_time', $examstarttime],
                                ['exam_end_time', $examendtime],
                                // ['total_questions', $totalquestion],
                                ['right_mark', $correctmark],
                                ['wrong_mark', $wrongmark],
                                ['pass_mark', $passmark],
                                ['category', $category],
                            ])
                        ->select('id')
                        ->first();
                        
            if($ifExist) {            
                return $ifExist->id;
            } else {
                $basicDetailsID = DB::table('exam_master')
                                    ->insertGetId([
                                        'exam_name' => $examname,
                                        'exam_start_time' => $examstarttime,
                                        'exam_end_time' => $examendtime,
                                        // 'total_questions' => $totalquestion,
                                        'right_mark' => $correctmark,
                                        'wrong_mark' => $wrongmark,
                                        'pass_mark' => $passmark,
                                        'category' => $category,
                                        ]);
                return $basicDetailsID;
            }
        }
    }

    /**
     *
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
