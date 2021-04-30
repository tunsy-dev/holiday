@extends('layout')

@section('content')

<div class="container">

<div class="container-top">
  <div class="row">
    <div class="col-6">
    <div class="left">
    <h4>Manager page</h4>


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
      <th scope="col">Authority Level</th>
      <th scope="col">View Profile</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
  <tr>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['hours_worked_day']}}</td>
      <td>{{$user['manager_name']}}</td>
      <td>{{$user['authority_level']}}</td>
    <td><form action="manager/employee/show" method="GET">
        @csrf
        <input type="hidden" name="user_id" value="{{$user['id']}}"/>
        <button class="btn btn-outline-secondary" type="submit" value= "UPDATE" href="#">view</button>
        </form></td>

    </tr>
  @endforeach


  </tbody>
</table>
</div>


</div>

@endsection('content')
