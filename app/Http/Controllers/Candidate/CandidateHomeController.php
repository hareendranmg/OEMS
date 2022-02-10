<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Auth;
use DB;

class CandidateHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('Asia/Kolkata');
        $cur_date = date('Y-m-d H:i:s');
        $cat_id = Auth::user()->cat_id;
        $active_exams = DB::table('exam_master')
            ->where('category', $cat_id)
            ->where('is_active', 1)
            ->where('exam_start_time', '<=', $cur_date)
            ->where('exam_end_time', '>=', $cur_date)
            ->count();

        $upcmng_exam = DB::table('exam_master')
            ->where('category', $cat_id)
            ->where('is_active', 1)
            ->where('exam_start_time', '>', $cur_date)
        // ->latest()
            ->select('exam_name', 'exam_start_time')
            ->first();

        $attended_exams = DB::table('responses')
                        ->where('candidate_id', Auth::user()->id)
                        ->distinct('exam_id')
                        ->count();

        return view('/candidate/home', compact('active_exams', 'upcmng_exam', 'attended_exams'));
    }
}
