@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (auth()->user()->user_type_id==2)
                Your manager: {{auth()->user()->parent->name}}, {{auth()->user()->parent->email}} 
            @elseif(auth()->user()->user_type_id==3)
                Your manager: {{auth()->user()->parent->name}}, {{auth()->user()->parent->email}}
                Your supervisor: {{auth()->user()->parent->parent->name}}, {{auth()->user()->parent->parent->email}}

            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    <div class="panel-">
                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Commission</th>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <td>{{$sale->created_at}}</td>
                                <td>{{$sale->product}}</td>
                                <td>{{$sale->price}}</td>
                                <td>{{$value->where('sales_id', $sale->id)}}</td>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
