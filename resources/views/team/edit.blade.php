@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Add Supervisor to your team') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('add/team_member') }}">
                        @csrf
                        {{-- Select user --}}
                        <div class="form-group row">
                                <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>

                                <div class="col-md-6">
                                        <select name="user_id">
                                            <option value="">Select</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                        
                        @if (auth()->user()->user_type_id==1)
                            <div class="form-group row">
                                <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Select Team') }}</label>

                                <div class="col-md-6">
                                        <select name="team_id">
                                            <option value="">Select</option>
                                            @foreach ($teams as $team)
                                                <option value="{{$team->id}}">{{$team->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="user_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Change Usertype') }}</label>

                            <div class="col-md-6">
                                    <select name="user_type_id">
                                            <option value="">Select</option>
                                            @if (auth()->user()->user_type_id==1)
                                                <option value="2">Supervisor</option>
                                                
                                            @else
                                                <option value="3">Sales Representative</option>
                                            @endif
                                    </select>
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Member') }}
                                </button>
                            </div>
                        </div>
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection