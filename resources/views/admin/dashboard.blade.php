@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Admin Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Total Users Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Users</h5>
                                        <h2 class="card-text">{{ $totalUsers }}</h2>
                                        <a href="{{ route('admin.users') }}" class="btn btn-light">View Users</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Logins Today Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Logins Today</h5>
                                        <h2 class="card-text">{{ $loginsToday }}</h2>
                                        <a href="{{ route('admin.logins') }}" class="btn btn-light">View Logins</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Total News Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-warning text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Total News</h5>
                                        <h2 class="card-text">{{ $totalNews }}</h2>
                                        <a href="{{ route('admin.news') }}" class="btn btn-dark">Manage News</a>
                                    </div>
                                </div>
                            </div>



                            <!-- Players Point Management Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Players Points</h5>
                                        <a href="{{ route('admin.players.points') }}" class="btn btn-light">Manage Players
                                            Points</a>
                                    </div>
                                </div>
                            </div>



                            <!-- Forum Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Forum</h5>
                                        <a href="{{ route('admin.forum.index') }}" class="btn btn-light">Moderate Forum</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Manage Quizzes Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-dark text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Manage Quizzes</h5>
                                        <a href="{{ route('admin.quizzes.create') }}" class="btn btn-light">Go to Quiz
                                            Manager</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Manage Feedback Card -->
                            <div class="col-md-4 mb-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Manage Feedback</h5>
                                        <a href="{{ route('admin.feedbacks.index') }}" class="btn btn-light">View
                                            Feedback</a>
                                    </div>
                                </div>
                            </div>
<!-- Manage Market Price Card -->
<div class="col-md-4 mb-3">
    <div class="card bg-danger text-white">
        <div class="card-body">
            <h5 class="card-title">Manage Market Price</h5>
            <a href="{{ route('malaysian-players.index') }}" class="btn btn-light">Go to Market Manager</a>
        </div>
    </div>
</div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
