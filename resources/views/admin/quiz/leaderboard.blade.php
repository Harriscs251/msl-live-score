@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Top 10 Fun Quiz Leaders</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topUsers as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
