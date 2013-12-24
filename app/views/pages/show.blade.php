@extends('layouts.base')
 
@section('content')
    
    @if($page)
        <h1>{{$page->title}}</h1>

        <div class="content">
            {{$page->content}}
        </div>

    @endif
@stop