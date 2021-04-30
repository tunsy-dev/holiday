<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {     
        // else show just the users request
        // $total_allowance = ;
        $user = Auth::user();
        // $allowance = $user->allowance;
        // dd($allowance);
        $current_allowance = User::where('email', $user->email )->first()->current_allowance;
        $user = User::where('email', $user->email)->first();
        $requests = $user->this_years_allowances->first()->requests->sum('number_of_hours');
        $requests_table = $user->this_years_allowances->first()->requests->map(function($req){
           
            return [
                'reason' => $req->reason,
                'start_date' => $req->start_date->format('dS M Y'),
                'end_date' => $req->end_date->format('dS M Y'),
                'number_of_hours' => $req->number_of_hours,
                'status' => config('enums.status')[$req->status]
            ];
        });
        

        $hours_left = $current_allowance - $requests;
        
        //Just doing this one for now
        return view('requests', [
            'requests' => $requests,
            'requests_table' => $requests_table,
            'user' => $user,
            'current_allowance' => $current_allowance,
            'hours_left' => $hours_left
            // 'total_allowance' => $total_allowance
        ] );
    
}
    // \Carbon\Carbon::parse($requests_table['start_date'])->format('dS M Y')
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
    
            ] );
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $req = new \App\Models\Request();
        $req->start_date = $request->start_date;
        $req->end_date = $request->end_date;
        $req->reason = $request->reason;
        $req->number_of_hours = $req->end_date->diffInHours($req->start_date);
        $req->status = 0;
        // Check this still works if this years allowances is not an array
        $req->allowance_id = $user->this_years_allowances[0]->id; 
        $req->save();
       
       return redirect('/requests');

    $user->this_years_allowances->first()->allowance_id;
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
