@extends('layoutadmin')

@section('title')

@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')
</br></br></br>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-8">
                    <form role="searchorder" name="uni"  action="{{ action('OrdersController@adminOrders') }}" method="post" class="form-search" id="orders_search">
                        <div class="input-group input-group-sm">
                             <input type="text"  class="form-control" placeholder="Имя" name="email" required value="{{ $term }}" />
                             <span class="input-group-addon"><a href="#" onclick="$('#orders_search').submit();">
                                     <i class="glyphicon glyphicon-search"></i></a>
                             </span>
                        </div>
                    </form>



                </div>
                <div class="col-lg-2">
                    <a class="btn btn-success btn-sm pull-right" href="{{ action('OrdersController@adminRecord') }}" onclick="document.form.uni.submit(); "><i class="glyphicon glyphicon-plus"></i></a>

                </div>

                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Сортировка<b class="caret"></b></a>
                        <ul id="menu1" class="dropdown-menu">
                            <li><a href="{{action('OrdersController@adminOrders') }}?id=old">Старые данные</a></li>
                            <li><a href="{{ action('OrdersController@adminOrders') }}?id=new">Новые данные</a></li>
                        </ul></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="row">
    <table  id="example"  class="table table-striped table-bordered"  data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Эмейл</th>
                <th>Услуга</th>
                <th>Процесс</th>
				<th>Дата</th>
                <th></th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Эмейл</th>
                <th>Услуга</th>
                <th>Процесс</th>
				<th>Дата</th>
                <th></th>
            </tr>
        </tfoot>
 
        <tbody>
            @foreach($ords as $ord)
			<tr>
                <td>{{$ord->getcostumer()->first()->email}}</td>
                <td>{{$ord->getservice()->first()->name}}</td>
                <td>{{$ord->process}}</td>
				<td>{{$ord->created_at}}</td>

                <td>
                    <a href="#modal" class="btn btn-info btn-sm" data-toggle="modal"
                       data-target="#basicModal{{$ord->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{URL::route('orderdelete', array('id'=>$ord->id)) }}" onclick="return confirm('Подтвердите?')?true:false;" id="delete"  class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i></a>
                </td>
            </tr>

			@endforeach
        </tbody>
    </table>
        </div>

    {{$ords->links()}}

</div>

@foreach($ords as $ord)
<div class="modal" id="basicModal{{ $ord->id }}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
                <h4 class="modal-title" id="myModalLabel">{{$ord->getservice()->first()->name}}</h4>
            </div>
            <div class="modal-body">
                <h3>{{$ord->comment}}</h3>
            </div>
            <div class="modal-footer">
                <form action="{{ action('OrdersController@orderChange') }}" method="post">
                    <input type="hidden" name="id" value="{{$ord->id}}" required />
                <button type="submit" class="btn btn-info btn-sm">Изменить</button>
                <a class="btn" href="#" data-dismiss="modal">Отмена</a>
                </form>
            </div>
        </div>

    </div>
</div>
@endforeach

@stop
