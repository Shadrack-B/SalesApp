@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-heading"><h1>Your Team</h1></div>
                <div class="panel-body">         
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Team</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Your commission</th>
                                    <th>Supervisors commission</th>
                                    <th>Sales-rep commission</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                        @foreach ($user->children as $child)
                                        @php
                                        if ($child->sales->count()==0) {
                                            $salesCount = 1;
                                        } else {
                                            $salesCount = $child->sales->count();
                                        }
                                        @endphp
                                            <tr>
                                                <td rowspan="{{$salesCount}}">{{ $child->usertype->user_type }}</td>
                                                <td rowspan="{{$salesCount}}">{{ $child->email }}</td>
                                                <td rowspan="{{$salesCount}}">{{ $child->name }}</td>
                                                <td rowspan="{{$salesCount}}">
                                                    @foreach ($child->teams as $team)
                                                        {{ $team->name }} 
                                                    @endforeach
                                                </td>
                                                <td>@foreach ($child->sales as $sale){{ $sale->product }}<br>@endforeach</td>
                                                <td>@foreach ($child->sales as $sale)ksh{{ $sale->price }}<br>@endforeach</td>
                                                <td>
                                                    @foreach ($child->sales as $sale)
                                                        {{$sale->manager()->value ?? 0}}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                        @foreach ($child->sales as $sale)
                                                            {{$sale->supervisor()->value ?? 0}}<br>
                                                        @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($child->sales as $sale)
                                                        {{$sale->salesrep()->value ?? 0}}<br>
                                                    @endforeach
                                                </td>

                                            </tr>
                                            @foreach ($child->children as $grand)
                                            @php
                                            if ($grand->sales->count()==0) {
                                                $salesCount = 1;
                                            } else {
                                                $salesCount = $grand->sales->count();
                                            }
                                            @endphp
                                                <tr>
                                                    <td rowspan="{{$salesCount}}">{{ $grand->usertype->user_type }}</td>
                                                    <td rowspan="{{$salesCount}}">{{ $grand->email }}</td>
                                                    <td rowspan="{{$salesCount}}">{{ $grand->name }}</td>
                                                    <td rowspan="{{$salesCount}}">
                                                        @foreach ($grand->teams as $team)
                                                            {{$team->name}}
                                                        @endforeach
                                                    </td>
                                                    <td>@foreach ($grand->sales as $sale){{ $sale->product }}<br>@endforeach</td>
                                                    <td>@foreach ($grand->sales as $sale)ksh{{ $sale->price }}<br>@endforeach</td>
                                                    <td>
                                                        @foreach ($grand->sales as $sale)
                                                            {{$sale->manager()->value ?? 0}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                            @foreach ($grand->sales as $sale)
                                                                {{$sale->supervisor()->value ?? 0}}<br>
                                                            @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($grand->sales as $sale)
                                                            {{$sale->salesrep()->value ?? 0}}<br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                 </tbody>
                            </table> 
                </div> 
            </div>
        </div>
    </div>
    
@endsection
@section('javascript')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.min.js') }}"></script>
    <script type="text/javascript" type="text/javascript">
        $(document).ready(function(){
                $(".table").DataTable();
            });
    </script>
@endsection