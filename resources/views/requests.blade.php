@extends('layout')

@section('content')

<div class="container">

<div class="container-top">
  <div class="row">
    <div class="col-6">
    <div class="left">
    <h4>Holiday Requests</h4>
    <div class="current-allowance">
    <p>Total amount of holiday allowance in {{ \Carbon\Carbon::now()->year}}: {!! $current_allowance !!} hours.</p>
    </div>
    <div class="amount-left">
    <p>Total amount of holiday left: {!! $hours_left !!} hours.</p>
    </div> 
    <a href="{{ route('requests.create') }}">
  <button class="btn btn-primary">Holiday request</button>
    </a>
   
    <!-- <div class="btn" href="/requests/create">Holiday request</div>  -->
    </div>
    </div>
    <div class="col-6">
    <div class="right">
    <img class="photo" src="{{Auth::user()->profile_picture_url}}" alt='Profile Picture' />
    </div>
    </div>


  </div>
    
</div>
<div class="container-bottom">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Reason</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Number of Hours</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($requests_table as $requests_table)
  <tr>
      <td>{{$requests_table['reason']}}</td>
      <td>{{$requests_table['start_date']}}</td>
      <td>{{$requests_table['end_date']}}</td>
      <td>{{$requests_table['number_of_hours']}}</td>
      <td>{{$requests_table['status']}}</td>
      
    </tr> 
  @endforeach

  
  </tbody>
</table>
</div>


</div>

@endsection('content')
