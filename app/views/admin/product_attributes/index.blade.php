@extends('admin.layouts.base')
 
@section('content')
        <h1> Product Attributes</h1>
         <a href="{{ URL::route('admin.product-attributes.create') }}" class="btn btn-success btn-mini pull-left">Create</a>
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Visible in Frontend</th>
                                <th>Use in Search</th>
                                <th>Use in Filter</th>
                                <th><i class="icon-cog"></i></th>
                        </tr>
                </thead>
                <tbody>
                        @foreach ($attributes as $attribute)
                                <tr>
                                        <td>{{ $attribute->id }}</td>
                                        <td><a href="{{ URL::route('admin.product-attributes.edit', $attribute->id) }}">{{ $attribute->name }}</a></td>
                                        <td>{{ $attribute->code }}</td>
                                        <td>{{ $attribute->type }}</td>
                                        <td>{{ Form::checkbox('visible_frontend',$attribute->visible_frontend,$attribute->visible_frontend, array('disabled'=>'disabled')) }}</td>
                                        <td>{{ Form::checkbox('use_in_search',$attribute->use_in_search,$attribute->use_in_search, array('disabled'=>'disabled')) }}</td>
                                        <td>{{ Form::checkbox('use_in_filter',$attribute->use_in_filter,$attribute->use_in_filter, array('disabled'=>'disabled')) }}</td>
                                        <td>
                                                <a href="{{ URL::route('admin.product-attributes.edit', $attribute->id) }}" class="btn btn-success btn-mini pull-left">Edit</a>
 
                                                {{ Form::open(array('route' => array('admin.product-attributes.destroy', $attribute->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?')) }}
                                                      <button type="submit" href="{{ URL::route('admin.product-attributes.destroy', $attribute->id) }}" class="btn btn-danger btn-mini">Delete</butfon>
                                                {{ Form::close() }}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
 
@stop