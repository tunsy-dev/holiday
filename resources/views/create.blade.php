@extends('layout')

@section('content')

<div class="container">
<div class="container-top-form">
<h4>Holiday Request Form</h4>
</div>

<form method="POST" action="/requests">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Start Date</label>
    <input type="date" name="start_date" class="form-control" id="" aria-describedby="">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">End Date</label>
    <input type="date" name="end_date" class="form-control" id="" aria-describedby="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Reason</label>
    <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


@endsection('content')
