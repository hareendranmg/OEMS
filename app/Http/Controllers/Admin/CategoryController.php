<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('/admin/addcategory');
    }

    public function showCategory()
    {
        if(request()->ajax())
        {
            return datatables()->of(DB::table('category')->get())
                    ->addColumn('count', function($data){
                        $count = DB::table('users')->where('cat_id', $data->cat_id)->count();
                        return $count;
                    })
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="showcatcand" id="'.$data->cat_id.'" class="showcatcand btn btn-primary btn-md">View Candidates</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="add" id="'.$data->cat_id.'" class="add btn btn-success btn-md">Add Candidates</button>';
                        return $button;
                    })
                    ->rawColumns(['count','action'])
                    ->make(true);
        }
        $candidates = User::get();
        return view('/admin/showcategory', compact('candidates'));
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
        $name = $request->name;

        $user = DB::table('category')
                ->insert(['cat_name' => $name]);
        return view('/admin/addcategory')->withErrors(['created' => 'Category created successfully.']);
    }

    public function adduserstocategory(Request $request)
    {
        $cat_id = $request->cat_id;
        $candidate_id = $request->candidate_id;

        $user = DB::table('users')
                  ->where('id', $candidate_id)
                  ->update(['cat_id' => $cat_id]);
        return view('/admin/showcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return datatables()->of(DB::table('users')
                                    ->join('category', 'category.cat_id', 'users.cat_id')
                                    ->where('users.cat_id', $id)
                                    ->select('users.name', 'category.cat_name')
                                    ->get())
                            ->make(true);
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
