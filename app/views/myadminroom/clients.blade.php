@extends('layoutadmin')

@section('title')
@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')

<div class="kit"></div>
  <div class="container">
       <div class="panel panel-default">
            <div class="panel-body">
                 <div class="row">
                     <div class="col-lg-8">
                         <form role="searchclient" action="{{ action('OrdersController@adminClients') }}" method="post" class="form-search" id="clients_search">
                             <div class="input-group input-group-sm">
                                <input type="text"  class="form-control" placeholder="Имя" name="email" required value="{{ $term }}" />
                                <span class="input-group-addon"><a href="#" onclick="$('#clients_search').submit();">
                                <i class="glyphicon glyphicon-search"></i></a>
                                </span>
                             </div>
                         </form>
                      </div>
                      <div class="col-lg-2">
                           <a class="btn btn-success btn-sm pull-right" href="{{ action('OrdersController@adminRecord') }}"><i class="glyphicon glyphicon-plus"></i></a>
                      </div>
                       <ul class="nav nav-pills">
                       <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Сортировка<b class="caret"></b></a>
                            <ul id="menu1" class="dropdown-menu">
                            <li><a href="{{action('OrdersController@adminClients') }}?id=old">Старые данные</a></li>
                            <li><a href="{{ action('OrdersController@adminClients') }}?id=new">Новые данные</a></li>
                            </ul>
                       </li>
                       </ul>
                 </div>

             </div>
       </div>

      @if(Session::has('message'))
      <div class="jumbotron" align="center">
          <p>
              {{Session::get('message')}}
          </p>
      </div>
      @endif

       <div class="row">
        <table  id="example"  class="table table-striped table-bordered" class="tablesorter" data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" width="100%" cellspacing="0">
              <thead>
                     <tr>
                          <th>Имя</th>
                          <th>Фамилия</th>
                          <th>Отчество</th>
                          <th>Эмейл</th>
                          <th>Мобильный</th>
                          <th>Дата</th>
                          <th></th>
                     </tr>
               </thead>

               <tfoot>
                      <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Отчество</th>
                            <th>Эмейл</th>
                            <th>Мобильный</th>
                            <th>Дата</th>
                            <th></th>
                      </tr>
                </tfoot>

               <tbody>
               @foreach($clients as $client)
                       <tr>
                           <td>{{{$client->getcostumer()->first()->username}}}</td>
                           <td>{{{$client->getcostumer()->first()->first_name}}}</td>
                           <td>{{{$client->getcostumer()->first()->last_name}}}</td>
                           <td>{{{$client->getcostumer()->first()->email}}}</td>
                           <td>{{{$client->getcostumer()->first()->mobile}}}</td>
                           <td>{{$client->getcostumer()->first()->created_at}}</td>

                           <td>
                              <a href="#modal" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#basicModal{{$client->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                              <a href="{{URL::route('clientdelete', array('id'=>$client->getcostumer()->first()->id)) }}"  id="delete"  class="btn btn-danger btn-sm popconfirm"><i class="glyphicon glyphicon-remove-sign"></i></a>
                           </td>
                      </tr>

               @endforeach
               </tbody>
        </table>
        </div>

{{$clients->links()}}

 </div>

@foreach($clients as $client)
<div class="modal" id="basicModal{{ $client->id }}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
            <h4 class="modal-title" id="myModalLabel">{{{$client->getservice()->first()->name}}}</h4>
            </div>
            <div class="modal-body">
            <h3>{{{$client->getcostumer()->first()->mobile}}}</h3>
            </div>
               <div class="modal-footer">
                   <form action="{{ action('OrdersController@clientChange') }}" method="post">
                       <input type="hidden" name="id" value="{{$client->getcostumer()->first()->id}}" required />
               <button type="submit" class="btn btn-info btn-sm">Изменить</button>
               <a class="btn" href="#" data-dismiss="modal">Отмена</a>
                       </form>
               </div>
           </div>
      </div>
</div>
@endforeach

@stop
