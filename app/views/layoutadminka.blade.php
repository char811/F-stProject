<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta charset="utf-8">
		<title>@yield('title') MyName!</title>
		{{ HTML::script(URL::asset('styles/jquery-2.1.1.js')) }}
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<script src="bootstrap-table-master/src/extensions/bootstrap-table-export.js"></script>

        <link rel="stylesheet" href="/css/style.css">


  		 	{{ HTML::script(URL::asset('styles/admin.js')) }}


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.3/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.3/js/jquery.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.3/js/jquery.dataTables.js"></script>


 </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/public/">Сайт</a>
                </div>
                <div class="navbar-collapse collapse" id="order">
                    <ul class="nav navbar-nav">

                    @if(Auth::check())
                    <li><a href="{{action('OrdersController@getService')}}">Новые услуги</a></li>
                    <li><a href="{{action('OrdersController@adminOrders')}}">Заказы</a></li>
                    <li><a href="{{action('OrdersController@adminClients')}}">Клиенты</a></li>
                    </ul>

                    <form class="navbar-form navbar-right" role="exit" action="{{ action('UsersController@getLogout') }}" method="post">
                        <button class="btn btn-success">Выйти</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><strong>{{ Auth::user()->username }}</strong></a></li>
                    </ul>
                    @endif
                    </ul>
            </div>
		</div>
</div>

  <div id="contact">
      hello
  </div>

@yield('content')
            
    </body>
</html>
