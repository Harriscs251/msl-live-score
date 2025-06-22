<!-- resources/views/admin/feedbacks/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Feedbacks</h2>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->user->name }}</td> <!-- Display user's name -->
                <td>{{ $feedback->comment }}</td> <!-- Display user's comment -->

                <!-- Display rating as text (like '5 stars') -->
                <td>{{ $feedback->rating }} {{ $feedback->rating == 1 ? 'star' : 'stars' }}</td> <!-- Display rating as stars -->

                <td>{{ $feedback->created_at }}</td> <!-- Display submission time -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
