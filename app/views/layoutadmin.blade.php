<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta charset="utf-8">
		<title>@yield('title') MyName!</title>


        <!-- DataTables CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="/css/style.css">


        <!-- DataTables JS -->

        {{ HTML::script(URL::asset('script/jquery-2.1.1.js')) }}
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        {{ HTML::script(URL::asset('script/tablesorter-master/js/jquery.tablesorter.min.js')) }}
        {{ HTML::script(URL::asset('script/bootstrap-table.js')) }}

        {{ HTML::script(URL::asset('script/admin.js')) }}



 </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/public/">Mysite.ru</a>
                </div>
                <div class="navbar-collapse collapse" id="order">
                    <ul class="nav navbar-nav">
                        <li><a href="{{action('ServicesController@getOrder')}}">Отправить заказ</a></li>

	<li><a href="{{action('OrdersController@getService')}}">New</a></li>
	 	<li><a href="{{action('OrdersController@adminOrders')}}">Orders</a></li>
		 	<li><a href="{{action('OrdersController@adminClients')}}">Clients</a></li>
                    </ul>
            </div>
		</div>
</div>
@yield('content')
            
    </body>
</html>
