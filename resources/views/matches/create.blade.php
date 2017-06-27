@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <h3>Добавить матч</h3>
                <form method="post" action="/admin/matches/create">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="sel1">Команда 1 (дома):</label>
                        <select  name="team_one_id" class="form-control" id="sel1">
                            @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel2">Команда 2 (на выезде):</label>
                        <select  name="team_two_id" class="form-control" id="sel2">
                            @foreach($teams as $team)
                                <option  value="{{$team->id}}">{{$team->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="result-id">Счет:</label>
                        <input class="form-control" id="result-id" name="result">
                    </div>

                    <div class="form-group">
                        <label for="datetimepicker">Дата:</label><br>
                        <input id="datetimepicker" type="text" name="date">
                    </div>

                    <button type="submit" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

