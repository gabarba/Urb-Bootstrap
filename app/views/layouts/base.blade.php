<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        @include('layouts.header')  
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js"></script> 

        <style>
          #angular-sample-app {background:#EEE;margin:40px 20px; padding:10px;}
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

      @include('layouts.navigation')

      
      
      <div class="container">
        @include('navigation.filter')
        
         @yield('content')
      </div>

      

      <footer>
        <p>&copy; URB Reviews Platform 2013</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{URL::asset('js/vendor/jquery-1.10.1.min.js') }}"><\/script>')</script>

        <script src="{{URL::asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{URL::asset('js/vendor/jquery.cookie.js') }}"></script>
        <script src="{{URL::asset('js/vendor/jquery-ui.custom.min.js') }}"></script>
        <script src="{{URL::asset('js/vendor/jquery.dynatree.js') }}"></script>
        <script src="{{URL::asset('js/plugins.js') }}"></script>
        <script src="{{URL::asset('js/main.js') }}"></script>
           <script type="text/javascript">
           $(function(){

                $('#tree').dynatree({
                initAjax: {url: "/urb-bootstrap/categoriesjson"},
                checkbox: true,
                selectMode: 2,
                //autoCollapse: true,
                minExpandLevel: 4});

          });
       </script>
        

      <script type="text/javascript">
        var sampleApp = angular.module('sampleApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
  });
      </script>
    </body>
</html>
