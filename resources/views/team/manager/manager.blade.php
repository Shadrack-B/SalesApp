@extends('layouts.app')

@section('content')
    
    @foreach ($user->children as $child)
        @php
            $salesCount = $child->sales->count();
        @endphp
        <div>
            
            <table>
                <h3>Supervisor</h3>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Product</th>
                </tr>
                <tr>
                        <th rowspan="{{$salesCount}}">{{ $child->email }}</th>
                        <th rowspan="{{$salesCount}}">{{ $child->name }}</th>
                        <th>@foreach ($child->sales as $sale)
                                {{ $sale->product }}:{{ $sale->price }}
                                <br>
                        @endforeach
                        </th>
                        
                </tr>
            </table>
            <hr><hr>
            {{-- <h3>Sales represenative</h3>            
            @foreach ($child->children as $grand)
                @php
                    $salesCount = $grand->sales->count();
                @endphp
                <div>
                        <table>
                                <tr>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                </tr>
                                <tr>
                                        <th rowspan="{{$salesCount}}">{{ $grand->email }}</th>
                                        <th rowspan="{{$salesCount}}">{{ $grand->name }}</th>
                                        <th>@foreach ($grand->sales as $sale)
                                                {{ $sale->product }}:{{ $sale->price }}
                                                <br>
                                        @endforeach</th>
                                        {{-- <th>{{ $grand->sales }}</th>
                                        <th>{{ $grand->price ?? ''}}</th><br> --}}
                                {{-- </tr>
                            </table>
                </div>
            @endforeach
        </div> --}} --}}
    @endforeach
    
@endsection