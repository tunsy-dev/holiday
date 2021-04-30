@extends('layout')

@section('content')

<div class="container">

<div class="container-top">
  <div class="row">
    <div class="col-6">
    <div class="left">
    <h4>Admin Page</h4>
    
    <a href="{{ route('admin.create') }}">
        <button class="btn btn-primary">Create new user</button>
    </a>
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
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Daily Hours</th>
      <th scope="col">Manager</th>
      <th scope="col">Authority Level </th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $users)
  <tr>
      <td>{{$users['name']}}</td>
      <td>{{$users['email']}}</td>
      <td>{{$users['hours_worked_day']}}</td>
      <td>{{$users['manager_name']}}</td>
      <td>{{$users['authority_level']}}</td>
      
    </tr> 
  @endforeach

  
  </tbody>
</table>
</div>


</div>

@endsection('content')
