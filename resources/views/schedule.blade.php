@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h3>Расписание матчей</h3>
                <table class="table table-bordered" style="width:400px;">
                    <thead>
                    <tr>
                        <th>Дома</th>
                        <th>В гостях</th>
                        <th>Дата</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td>{{$match['team_one_id']}}</td>
                            <td>{{$match['team_two_id']}}</td>
                            <td>{{$match['date']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
