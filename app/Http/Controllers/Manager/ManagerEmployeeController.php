<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        $user_id = request('user_id');
        $user = User::where('id', $user_id)->first();

        $current_allowance = $user->current_allowance;
        $requests = $user->this_years_allowances->first()->requests->sum('number_of_hours');
        $requests_table = $user->this_years_allowances->first()->requests->map(function($req){

            return [
                'reason' => $req->reason,
                'start_date' => $req->start_date->format('dS M Y'),
                'end_date' => $req->end_date->format('dS M Y'),
                'number_of_hours' => $req->number_of_hours,
                'status' => config('enums.status')[$req->status],
                'id' => $req->id
            ];
        });


        $hours_left = $current_allowance - $requests;
        $status_change = config('enums.status');
        //Just doing this one for now
        return view('manager-employee', [

            'requests' => $requests,
            'requests_table' => $requests_table,
            'user' => $user,
            'current_allowance' => $current_allowance,
            'hours_left' => $hours_left,
            'status_change' => $status_change
            // 'total_allowance' => $total_allowance
        ] );


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
        $request_id = request('request_id');

        // $user = User::where('id', $user_id)->get();
        $status = request('status');
        $request = ModelsRequest::where('id', $request_id)->update(['status' => $status]);
        // return view('manager-employee');
        return redirect()->back();
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
