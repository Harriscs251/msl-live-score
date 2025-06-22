<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function __construct()
    {
        // Check for admin privileges in the controller
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || !Auth::user()->is_admin) {
                return redirect('/admin/login')->with('error', 'You do not have admin access.');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $totalUsers = User::where('is_admin', false)->count();

        // Count today's logins from the UserLogin model
        $loginsToday = \App\Models\UserLogin::whereDate('created_at', now()->toDateString())->count();

        $totalNews = News::count();

        return view('admin.dashboard', compact('totalUsers', 'loginsToday', 'totalNews'));
    }

    public function users()
    {
        $users = User::where('is_admin', false)->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function logins()
    {
        $logins = UserLogin::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.logins', compact('logins'));
    }

    public function newsList()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function createNews()
    {
        return view('admin.news.create');
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('news', 'public');
            $news->image1 = $image1Path;
        }

        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('news', 'public');
            $news->image2 = $image2Path;
        }

        if ($request->hasFile('image3')) {
            $image3Path = $request->file('image3')->store('news', 'public');
            $news->image3 = $image3Path;
        }

        $news->save();

        return redirect()->route('admin.news')->with('success', 'News article created successfully!');
    }

    public function editNews(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function updateNews(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news->title = $request->title;
        $news->content = $request->content;

        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('news', 'public');
            $news->image1 = $image1Path;
        }

        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('news', 'public');
            $news->image2 = $image2Path;
        }

        if ($request->hasFile('image3')) {
            $image3Path = $request->file('image3')->store('news', 'public');
            $news->image3 = $image3Path;
        }

        $news->save();

        return redirect()->route('admin.news')->with('success', 'News article updated successfully!');
    }

    public function deleteNews(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news')->with('success', 'News article deleted successfully!');
    }

    public function showFeedbacks()
    {
        // Get all feedbacks with user details
        $feedbacks = Feedback::with('user')->get();  // Load feedbacks with related users
        return view('admin.feedbacks', compact('feedbacks'));
    }
}
