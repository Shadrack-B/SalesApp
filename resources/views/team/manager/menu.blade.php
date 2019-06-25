@extends('layouts.app')

@section('content')
<div class="sidenav">
  <h3>Your Teams</h3>
      @foreach ($teams as $team)
        <select name="" id="">
          <option><h2>{{$team->name}}</h2></option>
          @foreach ($team->users->where('user_type_id', 2) as $user)
          <option><a href="{{url('team/'.$user->id)}}">{{$user->name}}'s team</a></option>
          @endforeach
        </select> <br><br>   
      @endforeach   
</div>
@endsection