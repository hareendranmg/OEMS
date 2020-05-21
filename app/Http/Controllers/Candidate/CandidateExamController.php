<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

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
                    $button = '<button type="button" name="attend" id="' . $data->id . '" class="attend btn btn-primary col">Attend</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('/candidate/showexams');
    }
}
