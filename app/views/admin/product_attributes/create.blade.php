@extends('admin.layouts.base')
 
@section('content')
 
        <h2>Create New Product Attribute</h2>
 
        {{ Form::open(array('route' => 'admin.product-attributes.store')) }}
 
                <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name',null,array('class'=>'form-control')) }}
                </div>
                
                <div class="form-group">
                        {{ Form::label('code', 'Code') }}
                        {{ Form::text('code',null,array('class'=>'form-control')) }}
                </div>
                <div class="form-group"> 
                        {{ Form::select('type', array('int' => 'Integer', 'float' => 'Decimal', 'text' => 'Text', 'textarea' => 'Text Area', 'boolean' => 'Yes/No'), 'text') }}
                </div>
                <div class="form-group">
                        {{ Form::label('visible_frontend', 'Visible on Frontend') }}
                        {{ Form::checkbox('visible_frontend',1,true) }}
                </div>
                 <div class="form-group">
                        {{ Form::label('use_in_search', 'Use in Search') }}
                        {{ Form::checkbox('use_in_search',1,true) }}
                </div>
                 <div class="form-group">
                        {{ Form::label('use_in_filter', 'Use in Filter') }}
                        {{ Form::checkbox('use_in_filter',1,true) }}
                </div>
                <div class="form-actions">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-save btn-large')) }}
                        <a href="{{ URL::route('admin.product-attributes.index') }}" class="btn btn-large">Cancel</a>
                </div>
 
        {{ Form::close() }}
 
@stop