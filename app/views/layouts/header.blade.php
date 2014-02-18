<?php 
    if(!isset($page))
     {
        $page = new stdClass();
        $page->title = 'Default Title';
        $page->slug = 'Default Slug';
        $page->meta_title = 'Defualt Meta Title';
        $page->meta_description = 'Defualt Meta Description';
        $page->meta_keywords = 'Defualt Meta Keywords';
     }
?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $page->title}}</title>
        <meta name="description" content="{{ $page->meta_description}}">
        <meta name="keywords" content="{{ $page->meta_keywords}}">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{URL::asset('css/ui.dynatree.css') }}">
        <style>
            body {
                padding-top: 75px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{URL::asset('css/main.css') }}">
        <script src="{{URL::asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
