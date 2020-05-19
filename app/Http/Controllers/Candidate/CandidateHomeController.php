<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
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
        $cat_id = Auth::user()->cat_id;
        $active_exams = DB::table('exam_master')
                        ->where('category', $cat_id)
                        ->where('is_active', 1)
                        ->count();

        $upcmng_exam = DB::table('exam_master')
                        ->where('category', $cat_id)
                        ->where('is_active', 1)
                        ->latest()
                        ->select('exam_name', 'exam_start_time')
                        ->first();

        return view('/candidate/home', compact('active_exams', 'upcmng_exam'));
    }
}
