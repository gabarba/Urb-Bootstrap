<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        @include('admin.layouts.header')      
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

      @include('admin.layouts.navigation')

      
      <div class="container">
         @yield('content')
      </div>

      <footer>
        <p>&copy; URB Reviews Platform 2013</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{URL::asset('js/vendor/jquery-1.10.1.min.js') }}"><\/script>')</script>

        <script src="{{URL::asset('js/vendor/bootstrap.min.js') }}"></script>

        <script src="{{URL::asset('js/plugins.js') }}"></script>
        <script src="{{URL::asset('js/main.js') }}"></script>
    </body>
</html>
