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
            @foreach($usrs as $usr)
			<tr>
                <td>{{(($usr['username']));}}</td>
                <td>{{(($usr['first_name']));}}</td>
                <td>{{(($usr['last_name']));}}</td>
                <td>{{(($usr['email']));}}</td>
                <td>{{(($usr['mobile']));}}</td>




                @foreach($ords as $ord)

                <td>{{(($ord['service']));}}</td>
				<td>{{(($ord['date_start']));}}</td>
                <td><form action="ad" method="GET">
                        <input type="submit" id="id" value="Удалить " class="btn" />
                </form></td>

                @endforeach
            </tr>

			@endforeach
        </tbody>
    </table>

<script type="text/javascript">
    $(document).ready(function(){
        $("#example").dataTable();
    }});
</script>
@stop
