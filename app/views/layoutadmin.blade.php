<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta charset="utf-8">
		<title>@yield('title') MyName!</title>

        @section('styles')
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="/css/style.css">

        {{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap-theme')) }}
        {{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap-theme.min')) }}

        {{ HTML::style(URL::asset('styles/bootstrap-3.2.0/dist/css/bootstrap')) }}

        {{ HTML::style(URL::asset('styles/modal.css')) }}

        <!-- DataTables JS -->

        {{ HTML::script(URL::asset('script/jquery-2.1.1.js')) }}

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        {{ HTML::script(URL::asset('styles/bootstrap-3.2.0/dist/js/bootstrap.min.js')) }}

        {{ HTML::script(URL::asset('script/bootstrap-table.js')) }}

        {{ HTML::script(URL::asset('script/admin.js')) }}

        {{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/button.js')) }}
        {{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/modal.js')) }}
        {{ HTML::script(URL::asset('styles/bootstrap-3.2.0/js/dropdown.js')) }}
        {{ HTML::script(URL::asset('script/tik.js')) }}

        @show
 </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/public/">Mysite.ru</a>
                </div>
                <div class="navbar-collapse collapse" id="order">
                    <ul class="nav navbar-nav">


	<li><a href="{{action('OrdersController@getService')}}">New</a></li>
	 	<li><a href="{{action('OrdersController@adminOrders')}}">Orders</a></li>
		 	<li><a href="{{action('OrdersController@adminClients')}}">Clients</a></li>
                    </ul>
                   @if(Auth::check())
                    <form class="navbar-form navbar-right" role="exit" action="{{ action('UsersController@getLogout') }}" method="post">
                        <button class="btn btn-success">Выйти</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><strong>{{ Auth::user()->username }}</strong></a></li>
                    </ul>
                    @endif
            </div>
		</div>
</div>
@yield('content')
            
    </body>
</html>
