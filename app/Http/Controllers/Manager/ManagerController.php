<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = Auth::user();
        $users = $manager->employees;

        // // $users = json_decode($users, true);
        // dd($users);
        $users = $users->map(function($user){
        // dd($user);
            return [
                'name' => $user->name,
                'email' => $user->email,
                'hours_worked_day' => $user->hours_worked_day,
                'manager_name' => $user->manager->name,
                'authority_level' => config('enums.authority_level')[$user->authority_level],
                'id' => $user->id
            ];
        });
        // filter managers employes





        // filter managers employes
        // $managers_users = $users->filter(function ($user){
        //     return $user->manager_id == Auth::user()->id->get();
        // });
        // dd($managers_users);


        return view('manager', [
            'manager' => $manager,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



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
        $user = request('user_id');
        dd($user);
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
