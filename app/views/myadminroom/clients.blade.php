@extends('layoutadmin')

@section('title')
Вход
@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')
</br></br></br>
<div class="container">
    @if (Session::has('alert'))
        <div class="alert alert-danger">
            <p>{{ Session::get('alert') }}
        </div>
    @endif

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-10">
    <form class="form-search">
    {{ Form::model(null, array('route' => array('myadminroom/clients'))) }}
    {{ Form::text('username', null, array( 'placeholder' => 'Search order...', 'class'=>'input-medium search-query')) }}
    {{ Form::submit('',array('class'=>'glyphicon glyphicon-search')) }}
    {{ Form::close() }}
    </form>
</div>
</div> </div>

        </div>
    </div>

@if($cofs['mobile']!=1)
<div class="container">
    <div class="row">
        <table  id="example"  class="table table-striped table-bordered"  data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Эмейл</th>
                <th>Мобильный</th>
                <th>Услуга</th>
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
                <th>Услуга</th>
                <th></th>
            </tr>
            </tfoot>

            <tbody>
            <tr>

                <td>{{$cofs['username']}}</td>
                <td>{{$cofs['first_name']}}</td>
                <td>{{$cofs['last_name']}}</td>
                <td>{{$cofs['email']}}</td>
                <td>{{$cofs['mobile']}}</td>
            </tr>

            </tbody>
        </table>
    </div>
    </div>

<div class="modal" id="basicModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
                <h4 class="modal-title" id="myModalLabel">My</h4>
            </div>
            <div class="modal-body">
                <h3>that</h3>
            </div>
            <div class="modal fade">
            </div>
        </div>
    </div>
</div>

@endif
@stop
