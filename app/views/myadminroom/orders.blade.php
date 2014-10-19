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
                    <form role="uniform"  action="{{ action('OrdersController@postSearch') }}" method="post" class="form-search">
                        <div class="input-group input-group-sm">
                            <input type="text"  class="form-control" placeholder="Имя" name="email" required />
                             <span class="input-group-addon"><a href="{{URL::route('form') }}"><i class="glyphicon glyphicon-search"></i></a></span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2">
                    <a class="btn btn-success btn-sm pull-right" href=""><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>

        </div>
    </div>
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
                    <a href="#modal" class="btn btn-info btn-sm" data-toggle="modal"
                       data-target="#basicModal"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{URL::route('ad', array('id'=>$ord->id)) }}" id="delete" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove-sign"></i></a>
                </td>
            </tr>

			@endforeach
        </tbody>
    </table>
        </div>
    {{$ords->links()}}
</div>

<div class="modal" id="basicModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
                <h4 class="modal-title" id="myModalLabel">{{$ord->getservice()->first()->name}}</h4>
            </div>
            <div class="modal-body">
                <h3>{{$ord->comment}}</h3>
            </div>
            <div class="modal fade">
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function () {
        $('.delete').click(function () {
            confirmBox("Вы уверены что хотите удалить?", function () {
                $('#console').append('Удаляем<br />');
                $('.confirm').hide();
            });
        });
        $('.no').click(function () {
            $('.confirm').hide();
        });
    };

    function confirmBox(text, callback) {
        var c = $('.confirm');
        c.children('.confirm-text').text(text);
        c.show();
        $('document').off('click', '.Да');
        $('document').on('click', '.Нет', callback);
    }
</script>

@stop
