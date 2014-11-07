<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta charset="utf-8">
		<title>@yield('title') MyName!</title>

        @section('styles')
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/script/bootstrapvalidator/dist/css/bootstrapValidator.css"/>
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/script/jquerygrowl/stylesheets/jquery.growl.css">





        <!-- DataTables JS -->

        {{ HTML::script(URL::asset('script/jquery-2.1.1.js')) }}

        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="/public/script/bootstrapvalidator/dist/js/bootstrapValidator.js"></script>
        <script type="text/javascript" src="/public/script/bootstrapvalidator/src/js/language/ru_RU.js"></script>
        <script type="text/javascript" src="/public/script/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>

        {{ HTML::script(URL::asset('script/bootstrap-table.js')) }}


        {{ HTML::script(URL::asset('script/tablesorter-master/js/jquery.tablesorter.js')) }}
        {{ HTML::script(URL::asset('script/tooltip.js')) }}
        {{ HTML::script(URL::asset('script/bootstrap-confirmation.js')) }}
        {{ HTML::script(URL::asset('script/jquery.popconfirm.js')) }}
        {{ HTML::script(URL::asset('script/admin.js')) }}
        {{ HTML::script(URL::asset('script/tik.js')) }}



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
                    <li><a href="{{action('ServicesController@create')}}">Новые услуги</a></li>
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

                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Меню <b class="caret"></b></a>
                            <ul id="menu1" class="dropdown-menu">
                                @foreach($cities as $city)
                                <li><a href="{{URL::route('su',array('city'=>$city->engname))}}">{{$city->engname}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    </ul>
            </div>





		</div>
</div>

@yield('content')
            
    </body>
</html>
