@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel-heading">Dashboard</div>   
            @if (auth()->user()->user_type_id==2)
                Your manager: {{auth()->user()->parent->name}}, {{auth()->user()->parent->email}} 
            @elseif(auth()->user()->user_type_id==3)
                Your Manager: {{auth()->user()->parent->parent->name}}, {{auth()->user()->parent->parent->email}}<br>
                Your Supervisor: {{auth()->user()->parent->name}}, {{auth()->user()->parent->email}}<br>

            @endif
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Commission</th>
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                            <tr>
                            <td>{{$sale->created_at}}</td>
                            <td>{{$sale->product}}</td>
                            <td>ksh{{$sale->price}}</td>
                            <td>
                                @foreach ($sale->commissions as $commission)
                                    ksh{{$commission->value}}
                                @endforeach
                            </td>
                            </tr>
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
