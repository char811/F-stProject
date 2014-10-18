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
                <div class="col-lg-10">
                    <form class="form-search">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2">
                    <a class="btn btn-success btn-sm pull-right" href=""><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>

        </div>
    </div>

    <table  id="example"  class="table table-striped table-bordered"  data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Эмейл</th>
                <th>Мобильный</th>
                <th>Услуга</th>
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
                <th>Услуга</th>
				<th>Дата</th>
                <th></th>
            </tr>
        </tfoot>
 
        <tbody>
            @foreach($ords as $ord)
			<tr>
                <td>{{$ord->getcostumer()->first()->username}}</td>
                <td>{{$ord->getcostumer()->first()->first_name}}</td>
                <td>{{$ord->getcostumer()->first()->last_name}}</td>
                <td>{{$ord->getcostumer()->first()->email}}</td>
                <td>{{$ord->getcostumer()->first()->mobile}}</td>
                <td>{{$ord->getservice()->first()->name}}</td>
				<td>{{$ord->date_start}}</td>

                <td>
                    <a href="" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{URL::route('ad', array('id'=>$ord->id)) }}" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i></a>
                </td>
            </tr>

			@endforeach
        </tbody>
    </table>
    {{$ords->links()}}
</div>
<style>

</style>

@stop
