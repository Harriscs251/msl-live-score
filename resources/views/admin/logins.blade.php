@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">User Login Activity</h4>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm">Back to Dashboard</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Login Time</th>
                                    <th>IP Address</th>
                                    <th>User Agent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logins as $login)
                                <tr>
                                    <td>{{ $login->user->name }}</td>
                                    <td>{{ $login->user->email }}</td>
                                    <td>{{ $login->created_at->format('d M Y, h:i A') }}</td>
                                    <td>{{ $login->ip_address }}</td>
                                    <td>
                                        <small class="text-muted">{{ Str::limit($login->user_agent, 50) }}</small>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $logins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection