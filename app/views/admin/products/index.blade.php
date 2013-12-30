@extends('admin.layouts.base')
 
@section('content')
        <h1> Welcome to URB Reviews Dashboard</h1>
         <a href="{{ URL::route('admin.products.create') }}" class="btn btn-success btn-mini pull-left">Create</a>
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th><i class="icon-cog"></i></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($products as $product)
                                <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><a href="{{ URL::route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                                <a href="{{ URL::route('admin.products.edit', $product->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
 
                                                {{ Form::open(array('route' => array('admin.products.destroy', $product->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                      <button type="submit" href="{{ URL::route('admin.products.destroy', $product->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop