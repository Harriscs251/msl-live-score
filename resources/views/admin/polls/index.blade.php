@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Match Poll Results</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fixture ID</th>
                <th>Home Votes</th>
                <th>Away Votes</th>
                <th>Draw Votes</th>
                <th>Total Votes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polls as $poll)
                <tr>
                    <td>{{ $poll->fixture_id }}</td>
                    <td>{{ $poll->home_votes }}</td>
                    <td>{{ $poll->away_votes }}</td>
                    <td>{{ $poll->draw_votes }}</td>
                    <td>{{ $poll->total_votes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
