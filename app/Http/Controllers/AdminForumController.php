<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\DiscussionReply;
use Illuminate\Http\Request;

class AdminForumController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || !auth()->user()->is_admin) {
                return redirect('/admin/login')->with('error', 'You do not have admin access.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $discussions = Discussion::with('user')
            ->withCount('replies')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.forum.index', compact('discussions'));
    }

    public function blockDiscussion(Request $request, Discussion $discussion)
    {
        $request->validate([
            'blocked_reason' => 'required|string|max:255',
        ]);

        $discussion->update([
            'is_blocked' => true,
            'blocked_reason' => $request->blocked_reason,
        ]);

        return redirect()->route('admin.forum.index')
            ->with('success', 'Discussion blocked successfully.');
    }

    public function unblockDiscussion(Discussion $discussion)
    {
        $discussion->update([
            'is_blocked' => false,
            'blocked_reason' => null,
        ]);

        return redirect()->route('admin.forum.index')
            ->with('success', 'Discussion unblocked successfully.');
    }

    public function blockReply(Request $request, DiscussionReply $reply)
    {
        $request->validate([
            'blocked_reason' => 'required|string|max:255',
        ]);

        $reply->update([
            'is_blocked' => true,
            'blocked_reason' => $request->blocked_reason,
        ]);

        return back()->with('success', 'Reply blocked successfully.');
    }

    public function unblockReply(DiscussionReply $reply)
    {
        $reply->update([
            'is_blocked' => false,
            'blocked_reason' => null,
        ]);

        return back()->with('success', 'Reply unblocked successfully.');
    }
}