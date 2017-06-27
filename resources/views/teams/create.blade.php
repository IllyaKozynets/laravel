@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <h3>Добавить команду</h3>
                <form method="post" action="/admin/teams/create">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name-id">Название команды:</label>
                        <input class="form-control" id="name-id" name="name">
                    </div>
                    <div class="form-group">
                        <label for="points-id">Количество очков:</label>
                        <input class="form-control" id="points-id" name="points" >
                    </div>
                    <button type="submit" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
