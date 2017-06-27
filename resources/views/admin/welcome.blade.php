@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h3>Вы зашли как администратор,<br> выберите раздел</h3>
                <a href="/admin/teams" class="btn btn-primary">Редактор команд</a><br><br>
                <a href="/admin/matches" class="btn btn-primary">Редактор матчей</a>
            </div>
        </div>
    </div>
@endsection
