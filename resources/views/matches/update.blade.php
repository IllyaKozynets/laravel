@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <h3>Изменить матч</h3>
                <form method="post" action="/admin/matches/update/{{$match->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="sel1">Команда 1 (дома):</label>
                        <select name="team_one_id" class="form-control" id="sel1">
                            @foreach($teams as $team)
                                @if($team->id==$match->team_one_id)
                                    <option value="{{$team->id}}" selected>{{$team->name}}</option>
                                @else
                                    <option value="{{$team->id}}" >{{$team->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel2">Команда 2 (на выезде):</label>
                        <select name="team_two_id" class="form-control" id="sel2">
                            <option value="{{$team->id}}" selected>{{$team->name}}</option>
                            @foreach($teams as $team)
                                @if($team->id==$match->team_two_id)
                                    <option value="{{$team->id}}" selected>{{$team->name}}</option>
                                @else
                                    <option value="{{$team->id}}" >{{$team->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="result-id">Счет:</label>
                        <input class="form-control" id="result-id" name="result" value="{{$match->result}}">
                    </div>

                    <div class="form-group">
                        <label for="datetimepicker">Дата:</label><br>
                        <input id="datetimepicker" type="text" name="date" value="{{$match->date}}">
                    </div>

                    <button type="submit" class="btn btn-default">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

