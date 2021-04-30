<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $admin = Auth::user();
        $users = User::where('authority_level', '<', 3)->get();
        // // $users = json_decode($users, true);
        // dd($users);
        $users = $users->map(function($user){
        // dd($user);
            return [
                'name' => $user->name,
                'email' => $user->email,
                'hours_worked_day' => $user->hours_worked_day,
                'manager_name' => $user->manager->name,
                'authority_level' => config('enums.authority_level')[$user->authority_level]
            ];
        });
       

        return view('admin', [
            'admin' => $admin,
            'users' => $users,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $managers = User::where('authority_level', '>', 1)->get();
        $authority_levels = config('enums.authority_level');
        // $level = config('enums.authority_level');
        // dd($authority_level);
        // dd($level->type);
 
        return view('create-user', [
            'managers' => $managers,
            'authority_levels' => $authority_levels
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = new \App\Models\User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->hours_worked_day = $request->hours_worked_day;
       $user->manager_id = $request->manager_id;
       $user->authority_level = $request->authority_level;
        // dd($user);
        $user->save();
        return redirect('/admin');
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
        //
    }
}
