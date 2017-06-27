@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <a class="btn btn-primary" href="{{url('admin/matches/create')}}">Добавить матч</a>
                <br>
                <br>
                <table class="table table-bordered" style="width:400px;">
                    <thead>
                    <tr>
                        <th>Дома</th>
                        <th>На выезде</th>
                        <th>Счет</th>
                        <th>Дата</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td>{{$match['team_one']}}</td>
                            <td>{{$match['team_two']}}</td>
                            <td>{{$match['result']}}</td>
                            <td>{{$match['date']}}</td>
                            <td>
                                <a href="/admin/matches/update/{{$match['id']}}" class="btn btn-primary">update</a>
                            </td>
                            <td><a href="/admin/matches/delete/{{$match['id']}}" class="btn btn-danger">delete</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
