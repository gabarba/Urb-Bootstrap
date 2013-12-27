@extends('admin.layouts.base')
 
@section('content')
 
        <h2>Edit Product</h2>
 
        {{ Form::model($product, array('method' => 'put', 'route' => array('admin.products.update', $product->id))) }}
                <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name',null,array('class'=>'form-control')) }}
                </div>
                
                <div class="form-group">
                        {{ Form::label('brand', 'Brand') }}
                        {{ Form::text('brand',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('manufacturer_part_no', 'Manufacturer Part No.') }}
                        {{ Form::text('manufacturer_part_no',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('sku', 'SKU') }}
                        {{ Form::text('sku',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('asin', 'ASIN') }}
                        {{ Form::text('asin',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('upc_isbn', 'UPC/ISBN') }}
                        {{ Form::text('upc_isbn',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.products.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop