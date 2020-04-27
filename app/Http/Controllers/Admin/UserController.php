<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;

class UserController extends Controller
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
        return view('/admin/adduser', compact('categories'));
    }
    public function showUsers()
    {
        if(request()->ajax())
        {
            return datatables()->of(DB::table('users')
                                    ->join('category', 'category.cat_id', 'users.cat_id')
                                    // ->select('users.name', 'category.cat_name')
                                    ->get())
                    ->addColumn('action', function($data){
                        // $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        // $button .= '&nbsp;&nbsp;';
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-md">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('/admin/showusers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $username = $request->username;
        $password = $request->password;
        $con_password = $request->con_password;
        $category = $request->category;

        if($con_password != $password) {
            return Redirect::back()->withErrors(['password_error' => 'Password must be same.']);
        } else {
            $password = Hash::make($password);
            $user = DB::table('users')
                      ->insert(['name' => $name, 'cat_id' => $category, 'username' => $username, 'password' => $password]);
            $categories = DB::table('category')
                        ->get();
            return view('/admin/adduser', compact('categories'))->withErrors(['created' => 'Candidate created successfully.']);
        }
    }

    /**
     * Display the specified resource.
     *
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
        $data = User::find($id);
        $delete = $data->delete();
        print_r($delete);
    }
}
