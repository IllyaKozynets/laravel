@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
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
                    @foreach($result as $one)
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
        </div>
    </div>
@endsection
