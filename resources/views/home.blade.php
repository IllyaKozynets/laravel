@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h3>Турнирная таблица</h3>
                <table class="table table-bordered" style="width:400px;">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Команда</th>
                        <th>Количество очков</th>
                        <th>Подписаться</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$team['name']}}</td>
                            <td>{{$team['points']}}</td>
                            @if(Auth::isSubscription()==$team['id']):
                            <td>Подписан</td>
                            @else
                              <td><a href="/subscribe/{{$team['id']}}" class="btn btn-default">Подписаться</a></td>
                            @endif
                        </tr>
                        <?php $i++;?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
