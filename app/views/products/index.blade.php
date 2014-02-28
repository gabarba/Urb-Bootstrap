@extends('layouts.base')
 
@section('content')
<div class="col-md-9">
        <h1> Welcome to URB Products</h1>
        <strong>{{$products->getTotal()}}</strong>
        <div class="container">
                 @foreach ($products as $product)
                                <div class="col-md-3" style="height:300px">
                                        <h5><a href="{{ URL::route('products.show', $product->id) }}">{{ $product->name }}</a></h5>
                                        <strong>{{ $product->sku }}</strong>
                                        <a href="{{ URL::route('products.show', $product->id) }}"><img src="http://agenaastro.com/media/catalog/product{{$product->getAttributeValueByCode('thumbnail')}}" class="img-responsive"/></a>
                                       
                                </div>
                        @endforeach
        </div>
        {{--
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
        --}}
        {{$products->appends($attributes)->links()}}
</div>
@stop