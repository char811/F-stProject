@extends('layoutadmin')

@section('title')

@stop

@section('headExtra')
    {{ HTML::style('css/signin.css') }}
@stop

@section('content')
</br></br></br>


<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <form class="form-search">
    <input type="text" class="input-medium search-query">
    <button type="submit" class="btn">Поиск</button>
    </form>
    <thead>
            <tr>
				<th></th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Эмейл</th>
                <th>Мобильный</th>
                <th>Услуга</th>
				<th>Дата</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
			    <th></th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Эмейл</th>
                <th>Мобильный</th>
                <th>Услуга</th>
				<th>Дата</th>
            </tr>
        </tfoot>
 
        <tbody>
			@foreach($ords as $ord)
			<tr>
			    <td><input type="checkbox" name="my-checkbox" checked></td>
                <td>{{(print_r($ord['username']));}}</td>
                <td>{{(print_r($ord['surname']));}}</td>
                <td>{{(print_r($ord['clikuha']));}}</td>
                <td>{{(print_r($ord['email']));}}</td>
                <td>{{(print_r($ord['mobile']));}}</td>
                <td>{{(print_r($ord['service']));}}</td>
				<td>{{(print_r($ord['date']));}}</td>
			</tr>
			@endforeach
        </tbody>
    </table>
 
    <form action="ad" method="GET">
    <input type="submit" value="Удалить " class="btn" />
    </form>
 
@stop
