@extends('layoutadmin')


@section('content')
<div class="kit"></div>

<div class="container">
<div class="row">
    <table  class="table table-striped table-bordered" class="tablesorter"  data-height="400" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" width="100%" cellspacing="0">

        <thead>
        <tr>
            <th> Клиенты</th>
            <th> Заявки</th>
            @if(Auth::user()->admin==Auth::user()->username)
            <th> Менеджеры</th>
            <th> Города</th>
            @endif
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{($countclients-1)}}</td>
            <td>{{$countorders}}</td>
            @if(Auth::user()->admin==Auth::user()->username)
            <td>{{$countmanagers}}</td>
            <td>{{$towns}}</td>
            @endif
        </tr>
        </tbody>
</div>
     </table>
</div>

<div class="container">
  <div class="row">
        @foreach($servs as $serv)
        <div class="col-md-4">
            <div id="{{$serv->id}}" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto" ></div>
            {{$m=$serv->name}}
            <form>
            <input type="hidden"  name="{{$serv->id}}" />
                </form>
          </div>
        @endforeach
       </div>
</div>
<div id="chartdiv"></div>

<!--onload="ajarx({{$serv->name}})"
 <div class="container-fluid">
     <div class="row text-center" style="overflow:hidden;">
         <div class="col-sm-3" style="float: none !important;display: inline-block;">
             <label class="text-left">Angle:</label>
             <input class="chart-input" data-property="angle" type="range" min="0" max="60" value="40" step="1" />
         </div>

         <div class="col-sm-3" style="float: none !important;display: inline-block;">
             <label class="text-left">Depth:</label>
             <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="100" step="1" />
         </div>
     </div>
 </div>

   <div id="chart" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto"></div>
-->

<!--<div class="container">
    <div class="sampleContent">
        <div class="chartContainer chartContainer3">
            <h4>Funnel Chart</h4>
            <div id="chartNormal"></div>
        </div>
    </div>
</div>-->

@stop