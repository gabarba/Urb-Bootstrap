@extends('layouts.base')
 
@section('content')
    <div class="col-md-9">
    @if($product)
        <h1>{{$product->name}}</h1>

        <div class="content">
            {{$product->description}}
        </div>
        <div class="specs">
        	<table class="table table-hover table-bordered">
                <thead>
                        <tr>
                                <th>Spec</th>
                                <th>Value</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($product->attributes as $spec)
                                <tr>
                                        <td>{{ $spec->name }}</td>
                                        <td>{{$spec->value}}</td>
                                       
                                </tr>
                        @endforeach
                </tbody>
        </table>
        </div>
    </div>
    @endif
@stop