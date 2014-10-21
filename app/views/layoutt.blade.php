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
		<link rel="stylesheet" href="bootstrap.min.css">

  		 	{{ HTML::script(URL::asset('styles/admin.js')) }}


    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/public/">Сайт</a>
               </div>
            </div>
        </div>
</div>
@yield('content')

    </body>
</html>
