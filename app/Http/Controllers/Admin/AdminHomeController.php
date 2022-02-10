<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
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
        $userCount = User::where('is_admin', 0)->count();
        $active_exams = DB::table('exam_master')
                        ->where('is_active', 1)
                        ->count();

        return view('/admin/home', compact('userCount', 'active_exams'));
    }
}
