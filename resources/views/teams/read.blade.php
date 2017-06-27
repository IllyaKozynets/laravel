@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <a class="btn btn-primary" href="/admin/teams/create">Добавить команду</a>
                <br>
                <br>
                <table class="table table-bordered" style="width:400px;">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Команда</th>
                        <th>Количество очков</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{$team['id']}}</td>
                            <td>{{$team['name']}}</td>
                            <td>{{$team['points']}}</td>
                            <td>
                                <a href="/admin/teams/update/{{$team['id']}}" class="btn btn-primary">update</a>
                            </td>
                            <td><a href="/admin/teams/delete/{{$team['id']}}" class="btn btn-danger">delete</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
