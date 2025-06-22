@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Feedbacks</h2>

    <!-- Display success message if there is one -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->user->name }}</td>  <!-- Display user's name -->
                    <td>{{ $feedback->comment }}</td>
                    <td>
                        @for ($i = 0; $i < $feedback->rating; $i++)
                            <i class="fas fa-star" style="color: #ffcc00;"></i> <!-- Display stars -->
                        @endfor
                    </td>
                    <td>{{ $feedback->created_at }}</td>
                    <td>
                        <!-- Delete button for admin -->
                        <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
