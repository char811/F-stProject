<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Enter </title>

        @section('styles')
		{{ HTML::script(URL::asset('styles/jquery-2.1.1.js')) }}
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

 		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/dist/js/bootstrap.min.js')) }}
		{{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap.min.css')) }}
 		{{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap-theme')) }}
		{{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap-theme.min')) }}
		{{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap')) }}
 {{ HTML::style(URL::asset('styles/base.css')) }}
  {{ HTML::style(URL::asset('styles/carousel.css')) }}
    {{ HTML::style(URL::asset('styles/modal.css')) }}
	    {{ HTML::style(URL::asset('styles/loadingcircle.css')) }}
 		{{ HTML::script(URL::asset('styles/tik.js')) }}
 		{{ HTML::script(URL::asset('styles/loading.js')) }}

		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/button.js')) }}
		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/carousel.js')) }}
       	{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/modal.js')) }}
 		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/transition.js')) }}
		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/tooltip.js')) }}
       	{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/tab.js')) }}
		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/scrollspy.js')) }}
       	{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/popover.js')) }}
		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/dropdown.js')) }}
		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/collapse.js')) }}
       	{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/alert.js')) }}
 		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/affix.js')) }}
		{{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/tests/unit/button.js')) }}


	   @show
    </head>
    <body>

        @yield('main')        
		
      <!-- @section('scripts')
        @show                     -->
    <body>
</html>
