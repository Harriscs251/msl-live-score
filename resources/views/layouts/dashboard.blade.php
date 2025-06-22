<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSL Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #ffcc00;
            min-height: 100vh;
            padding: 0;
        }

        .sidebar .logo-container {
            padding: 15px;
            background-color: #e6b800;
        }

        .sidebar .logo-container .logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar .logo-container img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    margin-right: 10px;
    background-color: white;
    padding: 5px;
}


        .sidebar .logo-container h5 {
            color: white;
            margin: 0;
            font-size: 14px;
            line-height: 1.2;
        }

        .sidebar .nav-link {
            color: #333;
            padding: 12px 20px;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #333;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar .divider {
            height: 1px;
            background-color: rgba(0, 0, 0, 0.1);
            margin: 10px 0;
        }

        .content-area {
            padding: 20px;
        }

        .top-nav {
            background-color: #fff;
            border-bottom: 1px solid #e5e5e5;
            padding: 15px 20px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .card-header {
            border-bottom: 1px solid #e5e5e5;
            background-color: white;
            padding: 15px;
        }

        .live-match-container {
            background-color: #17a2b8;
            color: white;
            border-radius: 10px;
            padding: 20px;
        }

        .team-logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: white;
            padding: 5px;
            margin-bottom: 10px;
        }

        .form-badge {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-block;
        }

        .win {
            background-color: #28a745;
        }

        .draw {
            background-color: #6c757d;
        }

        .loss {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="logo-container text-center">
                    <div class="logo-wrapper">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        <h5>LIVE<br>SCORE<br>DASHBOARD</h5>
                    </div>
                </div>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('teams') ? 'active' : '' }}" href="{{ route('teams') }}">
                            <i class="fas fa-users"></i> Teams
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('statistics') ? 'active' : '' }}" href="{{ route('statistics') }}">
                            <i class="fas fa-chart-bar"></i> Statistics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">
                            <i class="fas fa-newspaper"></i> NEWS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('favorites.index') ? 'active' : '' }}" href="{{ route('favorites.index') }}">
                            <i class="fas fa-star"></i> FAVOURITE
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('forum.*') ? 'active' : '' }}" href="{{ route('forum.index') }}">
                            <i class="fas fa-comments"></i> Forum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('minigames') ? 'active' : '' }}" href="{{ route('minigames') }}">
                            <i class="fas fa-gamepad"></i> Mini Games
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('highlights') ? 'active' : '' }}" href="{{ route('live-match.highlight') }}">
                            <i class="fas fa-play-circle"></i> Highlights
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('predictions.index') ? 'active' : '' }}" href="{{ route('predictions.index') }}">
                            <i class="fas fa-lightbulb"></i> Predictions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('funquiz.index') ? 'active' : '' }}" href="{{ route('funquiz.index') }}">
                            <i class="fas fa-question-circle"></i> Fun Quiz
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('leaderboard') ? 'active' : '' }}" href="{{ route('leaderboard.index') }}">
                            <i class="fas fa-trophy"></i> Leaderboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('fantasy.team.create') ? 'active' : '' }}" href="{{ route('fantasy.team.create') }}">
                            <i class="fas fa-futbol"></i> Fantasy Team
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('chatbox.view') }}" class="nav-link">💬 QnA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('market.price') ? 'active' : '' }}" href="{{ route('market.price') }}">
                            <i class="fas fa-tags"></i> Market Price (Malaysia)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-10">
                <!-- Top Navigation -->
                <div class="top-nav d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Welcome back, {{ Auth::user()->name }}
                        @if(session('badge'))
                            <span style="font-size: 1.5rem; vertical-align: middle;">{{ session('badge') }}</span>
                        @endif
                    </h4>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search here...">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                       <div class="user-avatar">
                <a href="{{ route('profile.edit') }}">
                    <!-- Check if the user has a profile image -->
                    @if(auth()->user()->image)
                        <!-- If image exists, display the image -->
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    @else
                        <!-- If no image exists, display initials -->
                        {{ substr(auth()->user()->name, 0, 1) }}
                    @endif
                </a>
            </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="content-area">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
