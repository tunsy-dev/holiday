@extends('layout')

@section('content')

<div class="container">

<div class="container-top">
  <div class="row">
    <div class="col-6">
    <div class="left">
    <h4>{{$user['name']}}</h4>
    <div class="current-allowance">
    <p>Total amount of holiday allowance in {{ \Carbon\Carbon::now()->year}}: {!! $current_allowance !!} hours.</p>
    </div>
    <div class="amount-left">
    <p>Total amount of holiday left: {!! $hours_left !!} hours.</p>
    </div>
    <a href="{{ route('manager.index') }}">
        <button class="btn btn-primary">All employees</button>
    </a>

    <!-- <div class="btn" href="/requests/create">Holiday request</div>  -->
    </div>
    </div>
    <div class="col-6">
    <div class="right">

    <img class="photo" src="{{$user->profile_picture_url}}" alt='Profile Picture' onerror="this.onerror=null;this.src='data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIyNCIgdmVyc2lvbj0iMS4xIiB3aWR0aD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgLTEwMjguNCkiPjxwYXRoIGQ9Im04LjQwNjIgMTA0MS4xYy0yLjg4NTYgMS4zLTQuOTc4MSA0LTUuMzQzNyA3LjMgMCAxLjEgMC44MzI5IDIgMS45Mzc1IDJoMTRjMS4xMDUgMCAxLjkzOC0wLjkgMS45MzgtMi0wLjM2Ni0zLjMtMi40NTktNi01LjM0NC03LjMtMC42NDkgMS4zLTIuMDExIDIuMy0zLjU5NCAyLjNzLTIuOTQ1My0xLTMuNTkzOC0yLjN6IiBmaWxsPSIjMmMzZTUwIi8+PHBhdGggZD0ibTE3IDRhNSA1IDAgMSAxIC0xMCAwIDUgNSAwIDEgMSAxMCAweiIgZmlsbD0iIzM0NDk1ZSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCAxMDMxLjQpIi8+PHBhdGggZD0ibTEyIDExYy0xLjI3NyAwLTIuNDk0MyAwLjI2OS0zLjU5MzggMC43NS0yLjg4NTYgMS4yNjItNC45NzgxIDMuOTk3LTUuMzQzNyA3LjI1IDAgMS4xMDUgMC44MzI5IDIgMS45Mzc1IDJoMTRjMS4xMDUgMCAxLjkzOC0wLjg5NSAxLjkzOC0yLTAuMzY2LTMuMjUzLTIuNDU5LTUuOTg4LTUuMzQ0LTcuMjUtMS4xLTAuNDgxLTIuMzE3LTAuNzUtMy41OTQtMC43NXoiIGZpbGw9IiMzNDQ5NWUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMTAyOC40KSIvPjwvZz48L3N2Zz4=';"/>
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
      <td>
        <form action="update" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        <input type="hidden" id="request_id" name="request_id" value="{{$requests_table['id']}}">
        <select type="number" class="form-control" id="status" placeholder="{{$requests_table['status']}}" name="status">
        @foreach($status_change as $key => $value )

        <option value={{$key}}>{{$value}}</option>
        @endforeach
        </select>
        <button class="btn btn-outline-secondary" type="submit" value= "status" href="#">update</button>
        </form>
    </td>

    </tr>
  @endforeach


  </tbody>
</table>
</div>


</div>

@endsection('content')

