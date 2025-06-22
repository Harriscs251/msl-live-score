<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PollController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\AdminQuizController;
use App\Http\Controllers\FantasyTeamController;
use App\Http\Controllers\FantasyLeaderboardController;
use App\Http\Controllers\AdminFantasyLeaderboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminPlayerPointController;
use App\Http\Controllers\MalaysianPlayerController;
use App\Http\Controllers\AdminMalaysianPlayerControllerr;
use App\Http\Controllers\ProfileController; // Add this line


// =============================
// 🌟 PUBLIC LANDING PAGE
// =============================
Route::get('/', function () {
    return view('welcome');
});

// =============================
// 🧑 USER AUTHENTICATION
// =============================
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// =============================
// 📊 USER DASHBOARD
// =============================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/lineup/{fixtureId}', [DashboardController::class, 'showLineup'])->name('lineup');

// =============================
// 📰 NEWS
// =============================
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

// =============================
// 🏆 TEAMS
// =============================
Route::get('/teams', [TeamsController::class, 'index'])->name('teams');
Route::get('/teams/{id}', [TeamsController::class, 'show'])->name('teams.show');

// =============================
// 📈 STATISTICS
// =============================
Route::get('/statistics', [App\Http\Controllers\StatisticController::class, 'index'])->name('statistics');
Route::get('/match-history', [App\Http\Controllers\StatisticController::class, 'matchHistory'])->name('matches.history');

// =============================
// ❤ FAVORITE TEAMS
// =============================
Route::get('/favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites/toggle', [App\Http\Controllers\FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');

// =============================
// 🔐 ADMIN AUTH
// =============================
Route::get('/admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// =============================
// 💬 FORUM
// =============================
Route::prefix('forum')->name('forum.')->group(function () {
    Route::get('/', [App\Http\Controllers\ForumController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\ForumController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\ForumController::class, 'store'])->name('store');
    Route::get('/{discussion}', [App\Http\Controllers\ForumController::class, 'show'])->name('show');
    Route::post('/{discussion}/reply', [App\Http\Controllers\ForumController::class, 'reply'])->name('reply');
});

// =============================
// 🛠 ADMIN FORUM MODERATION
// =============================
Route::prefix('admin/forum')->name('admin.forum.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminForumController::class, 'index'])->name('index');
    Route::post('/{discussion}/block', [App\Http\Controllers\AdminForumController::class, 'blockDiscussion'])->name('block.discussion');
    Route::post('/{discussion}/unblock', [App\Http\Controllers\AdminForumController::class, 'unblockDiscussion'])->name('unblock.discussion');
    Route::post('/reply/{reply}/block', [App\Http\Controllers\AdminForumController::class, 'blockReply'])->name('block.reply');
    Route::post('/reply/{reply}/unblock', [App\Http\Controllers\AdminForumController::class, 'unblockReply'])->name('unblock.reply');
});

// =============================
// 🧑‍💼 ADMIN DASHBOARD
// =============================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/logins', [AdminController::class, 'logins'])->name('logins');

    // News Management
    Route::get('/news', [AdminController::class, 'newsList'])->name('news');
    Route::get('/news/create', [AdminController::class, 'createNews'])->name('news.create');
    Route::post('/news', [AdminController::class, 'storeNews'])->name('news.store');
    Route::get('/news/{news}/edit', [AdminController::class, 'editNews'])->name('news.edit');
    Route::put('/news/{news}', [AdminController::class, 'updateNews'])->name('news.update');
    Route::delete('/news/{news}', [AdminController::class, 'deleteNews'])->name('news.delete');
});

// =============================
// 🎮 MINI GAMES
// =============================
Route::get('/mini-games', function () {
    return view('mini-games');
})->name('minigames');

// =============================
// USER VOTING ROUTES
// =============================
Route::get('/poll/{fixtureId}', [PollController::class, 'show'])->name('poll.show');
    Route::post('/poll/vote', [PollController::class, 'vote'])->name('poll.vote');
Route::get('/admin/polls/results', [PollController::class, 'adminResults'])->name('admin.polls.results');
Route::get('/poll/results/{fixture_id}', [PollController::class, 'pollResults'])->name('poll.results');



// =============================
// PARTIAL LIVE MATCH
// =============================
Route::get('/partial/live-match', function () {
    $service = new \App\Services\FootballApiService();
    $matches = $service->getLiveMatches();
    $liveMatch = $matches[0] ?? null;
    return view('partials.live-match', compact('liveMatch'));
})->name('live.match.partial');

// =============================
// MATCH LINEUP
// =============================
Route::get('/match/{fixture_id}/lineup', [MatchController::class, 'showLineup'])->name('match.lineup');

// =============================
// MATCH PREDICTIONS
// =============================
Route::get('/match-predictions', [App\Http\Controllers\PredictionController::class, 'index'])->name('predictions.index');
Route::get('/match-predictions/{fixtureId}', [App\Http\Controllers\PredictionController::class, 'show'])->name('predictions.show');

// =============================
// HIGHLIGHTS
// =============================
Route::get('/live-match/highlight', [HighlightController::class, 'index'])->name('live-match.highlight');




// =============================
// QUIZ (USER SIDE)
// =============================
Route::middleware(['auth'])->group(function () {
    Route::get('/funquiz', [QuizController::class, 'index'])->name('funquiz.index');
});
Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quiz.show');
Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.index');

// =============================
// QUIZ LEADERBOARD
// =============================
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
Route::get('/admin/quizzes/leaderboard', [QuizController::class, 'leaderboard'])->name('admin.quizzes.leaderboard');

// =============================
// QUIZ (ADMIN SIDE)
// =============================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/quizzes', [AdminQuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/create', [AdminQuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes', [AdminQuizController::class, 'store'])->name('quizzes.store');
    Route::get('/quizzes/{quiz}/edit', [AdminQuizController::class, 'edit'])->name('quizzes.edit');
    Route::put('/quizzes/{quiz}', [AdminQuizController::class, 'update'])->name('quizzes.update');
    Route::delete('/quizzes/{quiz}', [AdminQuizController::class, 'destroy'])->name('quizzes.destroy');
    Route::resource('admin/quizzes', AdminQuizController::class)->except(['show']);
});

// =============================
// 🎮 FANTASY FOOTBALL
// =============================
Route::middleware(['auth'])->group(function () {
    // Team setup
    Route::get('/fantasy/create', [FantasyTeamController::class, 'create'])->name('fantasy.team.create');
    Route::post('/fantasy/store', [FantasyTeamController::class, 'store'])->name('fantasy.team.store');
    Route::get('/fantasy/team/{id}', [FantasyTeamController::class, 'show'])->name('fantasy.team.show');
    Route::delete('/fantasy/team/{id}', [FantasyTeamController::class, 'destroy'])->name('fantasy.team.destroy');

    // Public fantasy leaderboard
    Route::get('/fantasy-leaderboard', [FantasyLeaderboardController::class, 'publicIndex'])->name('fantasy.leaderboard');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/fantasy-leaderboard', [AdminFantasyLeaderboardController::class, 'index'])->name('fantasy.leaderboard');
    Route::get('/fantasy-leaderboard/{id}/edit', [AdminFantasyLeaderboardController::class, 'edit'])->name('fantasy.leaderboard.edit');
    Route::put('/fantasy-leaderboard/{id}', [AdminFantasyLeaderboardController::class, 'update'])->name('fantasy.leaderboard.update');
    Route::get('/fantasy-leaderboards/players', [AdminFantasyLeaderboardController::class, 'viewPlayers'])->name('admin.fantasy.leaderboard.viewPlayers');
    Route::post('/fantasy-leaderboards/assign-points', [AdminFantasyLeaderboardController::class, 'assignPoints'])->name('admin.fantasy.leaderboard.assignPoints');
    Route::get('/fantasy-leaderboard/user/{id}', [App\Http\Controllers\AdminFantasyLeaderboardController::class, 'viewTeam'])->name('fantasy.leaderboard.team');
    Route::get('/feedbacks', [AdminFeedbackController::class, 'index'])->name('feedbacks.index');
      Route::get('/players-points', [AdminPlayerPointController::class, 'index'])->name('players.points');
    Route::get('/players-points/{id}/edit', [AdminPlayerPointController::class, 'edit'])->name('players.points.edit');
    Route::put('/players-points/{id}', [AdminPlayerPointController::class, 'update'])->name('players.points.update');
});


Route::get('/chatbox', function () {
    return view('chatbox');
})->name('chatbox.view');

Route::post('/chatbox/send', [ChatController::class, 'chat'])->name('chatbox.send');


Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');





Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/lineup/{fixtureId}', [LineupController::class, 'showLineup'])->name('lineup');


Route::get('/market-values/all', [MarketValueController::class, 'showAllPlayers']);

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('malaysian-players', \App\Http\Controllers\Admin\MalaysianPlayerController::class);
});

// Public User View
Route::get('/market-price', [MalaysianPlayerController::class, 'index'])->name('market.price');

// Route for editing user profile (GET request)
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Route for updating user profile (POST request)
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// =============================
// 🪵 LOG VIEW (DEV ONLY)
// =============================
Route::get('/log', function () {
    return response()->file(storage_path('logs/laravel.log'));
});
