@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div>
                    <h3>Футбольная команда {{$team->name}}</h3>
                    <table class="table table-bordered" style="width:400px;">
                        <thead>
                        <tr>
                            <th>Команда</th>
                            <th>Количество очков</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->points}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @if(!empty($matches_will))
                    <div>
                        <h3>Ближайшие матчи</h3>
                        <table class="table table-bordered" style="width:400px;">
                            <thead>
                            <tr>
                                <th>Дома</th>
                                <th>В гостях</th>
                                <th>Дата</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matches_will as $match)
                                <tr>
                                    <td>{{$match['team_one_id']}}</td>
                                    <td>{{$match['team_two_id']}}</td>
                                    <td>{{$match['date']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if(!empty($matches_end))
                    <div>
                        <h3>Результаты матчей</h3>
                        <table class="table table-bordered" style="width:400px;">
                            <thead>
                            <tr>
                                <th>Дома</th>
                                <th>В гостях</th>
                                <th>Счет</th>
                                <th>Дата матча</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matches_end as $one)
                                <tr>
                                    <td>{{$one['team_one_id']}}</td>
                                    <td>{{$one['team_two_id']}}</td>
                                    <td>{{$one['result']}}</td>
                                    <td>{{$one['date']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
