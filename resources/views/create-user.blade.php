@extends('layout')

@section('content')

<div class="container">
<div class="container-top-form">
<h4>Create New  User</h4>
</div>

<form method="POST" action="/admin">
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
    </div>
    <div class="form-group col-md-6">

  </div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="hours_worked_day">Hours worked a day</label>
      <input type="number" step=".5" class="form-control" id="hours_worked_day" placeholder="Hours worked a day" name="hours_worked_day">
    </div>
    <div class="form-group col-md-4">
    <label for="manager">Manager</label>
    <select class="form-control" id="manger_id" type="number"  placeholder="Manager" name="manager_id">
    @foreach($managers as $manager)
      <option value={{$manager['id']}}>{{$manager['name']}}</option>
    @endforeach

    </select>
    
  </div>
    <div class="form-group col-md-4">
      <label for="authority_level">Authority level</label>
      <select type="number" class="form-control" id="authority_level" placeholder="Authority Level" name="authority_level">
      @foreach($authority_levels as $key => $value )

      <option value={{$key}}>{{$value}}</option>
      @endforeach
      </select>
    </div>
  </div>

  
  <button ctype="submit" class="btn btn-primary">Submit</button>
  
</form>

</div>


@endsection('content')
