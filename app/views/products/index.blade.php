@extends('layouts.base')
 
@section('content')
        <h1> Welcome to URB Products</h1>
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>SKU</th>
                                
                        </tr>
                </thead>
                <tbody>
                        @foreach ($products as $product)
                                <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><a href="{{ URL::route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                                        <td>{{ $product->sku }}</td>
                                       
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop